<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 22-Jan-18
 * Time: 11:20 AM
 */

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Sessions;
use Hash;
use Auth;
use Redirect;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class resultController extends Controller
{
    public function showStudentListForMarkEntry(Request $request){
        try{
            if($request->search =='search') {
                if (session()->has('classId')) {
                    $classId = Session::get('classId');

                    $classInfo = DB::table('student_subject_list AS a')
                        ->join('students AS b', 'a.studentId', 'b.studentId')
                        ->join('class_allclasses AS c', 'a.classId', 'c.classId')
                        ->join('exam_allexams AS d', 'a.subCode', 'd.courseId')
                        ->join('class_allhistory AS e', 'a.studentId', 'e.studentId')
                        ->where('a.classId', $classId)
                        ->where('d.sessionName', $request->acaSession)
                        ->where('d.class', $request->class)
                        ->where('d.examName', $request->examName)
                        ->where('a.subCode', $request->courseCode)
                        ->where(function ($query) use ($request) {
                            if ($request->group != '')
                                $query->where('a.groupName', '=', $request->group);
                        })
                        ->get();
                    if(count($classInfo)>0){
                        return view('result/editstudentMark', ['classInfo' => $classInfo]);
                    }else{
                        return view('result/editstudentMark', ['errorInfo' => 'No Data found. Please try again.']);
                    }

                }
                else {
                    return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
                }
            }
            if($request->marksheet =='marksheet') {
                if (session()->has('classId')) {
                    $rows = DB::table('result_marks_details')
                        ->where([
                            ['examName', '=', $request->examName],
                            ['sessionName', '=' ,$request->acaSession],
                            ['medium', '=' , $request->medium],
                            ['version', '=' , $request->version],
                            ['shift' , '=' , $request->shift],
                            ['class' , '=' , $request->class],
                            ['section' , '=' , $request->section],
                            ['courseCode' , '=' , $request->courseCode],
                        ])
                        ->where(function ($query) use($request) {
                            if($request->group  != '' )
                                $query->where('groupName', '=', $request->group);
                        })
                        ->distinct()->get()->count();
                    if($rows>0){
                        $rows = DB::table('result_marks_details')
                            ->where([
                                ['examName', '=', $request->examName],
                                ['sessionName', '=' ,$request->acaSession],
                                ['medium', '=' , $request->medium],
                                ['version', '=' , $request->version],
                                ['shift' , '=' , $request->shift],
                                ['class' , '=' , $request->class],
                                ['section' , '=' , $request->section],
                                ['courseCode' , '=' , $request->courseCode],
                            ])
                            ->where(function ($query) use($request) {
                                if($request->group  != '' )
                                    $query->where('groupName', '=', $request->group);
                            })
                          ->get();
                        $result_mark = json_decode($rows, true);

                        $exam_gpa = DB::table('exam_gpa')
                            ->where([
                                ['class' , '=' , $request->class],
                                ['courseCode' , '=' , $request->courseCode],
                            ])
                            ->get();
                        $exam_gpa = json_decode($exam_gpa, true);
                        if(count($exam_gpa)>0) {
                           for ($i = 0; $i < count($result_mark); $i++) {

                               $students_marks = $result_mark[$i]['written'] + $result_mark[$i]['objective'] + $result_mark[$i]['practical'] +
                                   $result_mark[$i]['ct'] + $result_mark[$i]['attendance'] + $result_mark[$i]['sar'] + $result_mark[$i]['ca'] + $result_mark[$i]['assesment'];

                               for ($j = 0; $j < count($exam_gpa); $j++) {
                                   if ($students_marks >= $exam_gpa[$j]['lowerMark'] && $students_marks <= $exam_gpa[$j]['upperMark']) {
                                       $gpa = $exam_gpa[$j]['gpa'];
                                       $grade = $exam_gpa[$j]['grade'];
                                       $resultId = $result_mark[$i]['resultId'];
                                       $rows = DB::table('result_marksheet')
                                           ->select('resultId')
                                           ->where([
                                               ['resultId', '=', $resultId],
                                           ])
                                           ->distinct()->get()->count();
                                       if ($rows > 0) {
                                           return view('result/manageStudentMark', ['returnInfo' => 'Same info already exists.Try another.']);
                                       } else {
                                           $result = DB::table('result_marksheet')->insert([
                                               'resultId' => $resultId,
                                               'grade' => $grade,
                                               'gpa' => $gpa,
                                               'marks' => $students_marks,
                                           ]);
                                           break;
                                       }
                                   }
                               }
                           }
                           if ($result) {
                               $rows =DB::table('result_marks_details as a')
                                   ->select('a.resultId','a.rollNo','a.examName','a.written','a.objective','a.practical','a.ct','a.attendance','a.sar','a.ca','a.assesment','b.gpa','b.grade','b.marks',
                                       'e.name as subName','d.name as stdName','c.classId')
                                   ->join('result_marksheet as b','a.resultId','b.resultId')
                                   ->join('class_allhistory as c','c.rollNo','a.rollNo')
                                   ->join('students as d','d.studentId','c.studentId')
                                   ->join('subjects as e','e.code','a.courseCode')
                                   ->where([
                                       ['a.sessionName', '=' ,$request->acaSession],
                                       ['a.medium', '=' , $request->medium],
                                       ['a.version', '=' , $request->version],
                                       ['a.shift' , '=' , $request->shift],
                                       ['a.class' , '=' , $request->class],
                                       ['a.section' , '=' , $request->section],
                                   ])
                                   ->where(function ($query) use($request) {
                                       if($request->group  != '' )
                                           $query->where('a.groupName', '=', $request->group);
                                   })
                                   ->orderBy('a.rollNo')
                                   ->get();
                               $resultInfo= json_decode($rows, true);
                               $prevRoll = 0;
                               $totalMArks=0;
                               //print_r($resultInfo);
                               for($i=0;$i<count($resultInfo); $i++){
                                   $rollNo=$resultInfo[$i]['rollNo'];
                                   if($prevRoll == 0)
                                       $prevRoll = $rollNo;
                                   if($rollNo == $prevRoll)
                                       $totalMArks += $resultInfo[$i]['marks'];
                                   else {
                                       $countOfSub =DB::table('result_marks_details')
                                           ->select('rollNo')
                                           ->where([
                                               ['sessionName', '=' ,$request->acaSession],
                                               ['medium', '=' , $request->medium],
                                               ['version', '=' , $request->version],
                                               ['shift' , '=' , $request->shift],
                                               ['class' , '=' , $request->class],
                                               ['section' , '=' , $request->section],
                                           ])
                                           ->where(function ($query) use($request) {
                                               if($request->group  != '' )
                                                   $query->where('groupName', '=', $request->group);
                                           })
                                           ->where('rollNo', $resultInfo[$i]['rollNo'])
                                           ->groupBy('courseCode')
                                           ->get()->count();
                                       $getGpa=$totalMArks/$countOfSub;
                                       for ($j = 0; $j < count($exam_gpa); $j++) {
                                           if ($getGpa >= $exam_gpa[$j]['lowerMark'] && $getGpa <= $exam_gpa[$j]['upperMark']) {
                                               $gpa = $exam_gpa[$j]['gpa'];
                                               $grade = $exam_gpa[$j]['grade'];
                                               DB::table('result_exam_final')->insert([
                                                   'classId' => $resultInfo[$i]['classId'],
                                                   'resultId' => $resultInfo[$i]['resultId'],
                                                   'rollNo' =>$prevRoll,
                                                   'examName' => $resultInfo[$i]['examName'],
                                                   'group' => $request->group,
                                                   'totalMarks' => $totalMArks,
                                                   'gpa' => $gpa,
                                                   'grade' => $grade,

                                               ]);
                                           }
                                       }
                                       $prevRoll = $rollNo;
                                       $totalMArks = 0;
                                       $totalMArks += $resultInfo[$i]['marks'];
                                   }
                               }
                               DB::table('result_exam_final')->insert([
                                   'classId' => $resultInfo[count($resultInfo)-1]['classId'],
                                   'resultId' => $resultInfo[count($resultInfo)-1]['resultId'],
                                   'rollNo' => $prevRoll,
                                   'examName' => $resultInfo[count($resultInfo)-1]['examName'],
                                   'group' => $request->group,
                                   'totalMarks' => $totalMArks,
                                   'gpa' => $gpa,
                                   'grade' => $grade,

                               ]);
                               return view('result/manageStudentMark', ['returnInfo' => 'Mark sheet is generated successfully for Course Code:' . $result_mark[$i - 1]['courseCode']]);
                           }
                       }
                       else{
                           return view('result/manageStudentMark', ['returnInfo' => 'Grade and GPA not set for this subject.Please set first.']);
                       }

                    }
                    else{
                        return view('result/manageStudentMark', ['returnInfo' => 'No data found.Please Try again']);
                    }
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }
    public function showSubjectList(Request $request){
        try{
            if (session()->has('classId')) {
                $classId = Session::get('classId');

                $rows =DB::table('subjects')
                    ->where('classId',$classId)
                    ->get();
                return response()->json(array('data'=>$rows));
            }
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showExamListResult(Request $request){
        try{

            $rows =DB::table('exam_allexams')
                ->where('sessionName',$request->sessionName)
                ->where('class',$request->className)
                ->groupBy('examName')
                ->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertResultStd(Request $request){

        try{
            if (session()->has('classId')) {
                $rows = DB::table('result_marks_details')
                    ->select('rollNo')
                    ->where([
                        ['examName', '=', $request->examName],
                        ['rollNo', '=', $request->rollNoFinal],
                        ['sessionName', '=' ,$request->sessionName],
                        ['medium', '=' , $request->medium],
                        ['version', '=' , $request->version],
                        ['shift' , '=' , $request->shift],
                        ['class' , '=' , $request->class],
                        ['section' , '=' , $request->section],
                    ])
                    ->where(function ($query) use($request) {
                        if($request->group  != '' )
                            $query->where('groupName', '=', $request->group);
                    })
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                } else {
                    $result = DB::table('result_marks_details')->insert([
                        'rollNo' => $request->rollNoFinal,
                        'sessionName' => $request->sessionName,
                        'medium' => $request->medium,
                        'version' => $request->version,
                        'shift' => $request->shift,
                        'class' => $request->class,
                        'section' => $request->section,
                        'groupName' => $request->groupName,
                        'courseCode' => $request->subCode,
                        'examName' => $request->examName,
                        'fullMarks' => $request->fullMarks,
                        'written' => $request->written,
                        'objective' => $request->objective,
                        'practical' => $request->practical,
                        'ct' => $request->ct,
                        'attendance' => $request->attendance,
                        'sar' => $request->sar,
                        'ca' => $request->ca,
                        'assesment' => $request->assesment,
                    ]);
                    if ($result) {
                        return response()->json(array(
                            'successMsg' => "Student Roll:".$request->rollNoFinal.' Marks is successfully added.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to add Student ID:'.$request->rollNoFinal.'s Marks. Please try again.'));
                    }
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function xlsDownload()
    {
        $file= "public/files/files/Result_Demo.xlsx";
        return Response::download($file, 'filename.xlsx');
    }
    public function resultFileUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $targetFolder = 'public/files/files/';
            $file = $request->file('file');
            $name = time() . '.' . $file->getClientOriginalName();
            $image['filePath'] = $name;
            $file->move($targetFolder, $name);
            $path = $targetFolder . $name;
        }
        $inputFileName = $path;

        $type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
        $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($inputFileName);

        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $worksheets[$worksheet->getTitle()] = $worksheet->toArray();
        }
        unset($worksheets['Sheet1'][0]);
        $final_array=$worksheets['Sheet1'];
        print_r($final_array);
        foreach ($final_array as $finalVal) {
            $rows = DB::table('result_marks_details')
                ->select('rollNo')
                ->where([
                    ['examName', '=',  $finalVal[9]],
                    ['rollNo', '=', $finalVal[0]],
                    ['sessionName', '=' ,$finalVal[1]],
                    ['medium', '=' , $finalVal[2]],
                    ['version', '=' , $finalVal[3]],
                    ['shift' , '=' , $finalVal[4]],
                    ['class' , '=' , $finalVal[5]],
                    ['section' , '=' , $finalVal[6]],
                    ['courseCode' , '=' , $finalVal[8]],
                ])
                ->where(function ($query) use($request,$finalVal) {
                    if($request->group  != '' )
                        $query->where('groupName', '=', $finalVal[7]);
                })
                ->distinct()->get()->count();
            if ($rows > 0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            } else {
                $result = DB::table('result_marks_details')->insert([
                    'rollNo' => $finalVal[0],
                    'sessionName' => $finalVal[1],
                    'medium' => $finalVal[2],
                    'version' => $finalVal[3],
                    'shift' => $finalVal[4],
                    'class' => $finalVal[5],
                    'section' => $finalVal[6],
                    'groupName' => $finalVal[7],
                    'courseCode' => $finalVal[8],
                    'examName' => $finalVal[9],
                    'fullMarks' => $finalVal[10],
                    'written' => $finalVal[11],
                    'objective' => $finalVal[12],
                    'practical' => $finalVal[13],
                    'ct' => $finalVal[14],
                    'attendance' => $finalVal[15],
                    'sar' => $finalVal[16],
                    'ca' => $finalVal[17],
                    'assesment' => $finalVal[18],
                ]);
            }
        }
        if ($result) {
            return response()->json(array(
                'successMsg' => ' Marks is successfully added.Do not try more time.' ,
            ));
        } else {
            return response()->json(array('errorMsg' => 'Failed to add  Marks. Please try again.'));
        }
    }
    public function showStudentListForMarkEdit(Request $request){
        try{

            $classInfo =DB::table('result_marks_details as a')
                ->where([
                    ['a.examName', '=', $request->examName],
                    ['a.sessionName', '=' ,$request->acaSession],
                    ['a.medium', '=' , $request->medium],
                    ['a.version', '=' , $request->version],
                    ['a.shift' , '=' , $request->shift],
                    ['a.class' , '=' , $request->class],
                    ['a.section' , '=' , $request->section],
                    ['a.courseCode' , '=' , $request->courseCode],
                ])
                ->where(function ($query) use($request) {
                    if($request->group  != '' )
                        $query->where('a.groupName', '=', $request->group);
                })
                ->groupby('a.rollNo')
                ->get();
            return view('result/showStudentMark', ['classInfo' => $classInfo]);

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function updateResultStd(Request $request){
        try{
            if( $request->action=='edit') {
                $result = DB::table('result_marks_details')
                    ->where('resultId', $request->dbid)
                    ->update([
                        'rollNo' => $request->rollNoFinal,
                        'sessionName' => $request->sessionName,
                        'medium' => $request->medium,
                        'version' => $request->version,
                        'shift' => $request->shift,
                        'class' => $request->class,
                        'section' => $request->section,
                        'groupName' => $request->groupName,
                        'courseCode' => $request->courseCode,
                        'examName' => $request->examName,
                        'fullMarks' => $request->fullMarks,
                        'written' => $request->written,
                        'objective' => $request->objective,
                        'practical' => $request->practical,
                        'ct' => $request->ct,
                        'attendance' => $request->attendance,
                        'sar' => $request->sar,
                        'ca' => $request->ca,
                        'assesment' => $request->assesment,
                    ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Result Info is successfully updated.'
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Result Info is not updated.Please try again' ));
                }
            }
            if( $request->action=='delete') {

                $result =  DB::table('result_marks_details')
                    ->where('resultId',$request->dbiddel)
                    ->delete();
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Result is successfully Deleted.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to Deleted Result.Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function searchStdReasult(Request $request){
        try{
            if (session()->has('classId')) {

                $classId = Session::get('classId');
                $rows = DB::table('result_exam_final as a')
                    ->where([
                        ['a.classId', '=', $classId],
                    ])
                    ->where(function ($query) use ($request) {
                        if ($request->group != '')
                            $query->where('a.group', '=', $request->group);
                    })
                    ->orderBy('a.totalMarks','desc')
                    ->get();
                //print_r($rows);
                $rows1 = DB::table('result_marks_details as a')
                    ->join('result_marksheet as b','a.resultId','b.resultId')
                    ->join('subjects as c','c.code','a.courseCode')
                    ->where([
                        ['a.sessionName', '=' ,$request->acaSession],
                        ['a.medium', '=' , $request->medium],
                        ['a.version', '=' , $request->version],
                        ['a.shift' , '=' , $request->shift],
                        ['a.class' , '=' , $request->class],
                        ['a.section' , '=' , $request->section],
                    ])
                    ->where(function ($query) use ($request) {
                        if ($request->group != '')
                            $query->where('a.groupName', '=', $request->group);
                    })
                    ->where([
                        ['c.classId', '=', $classId],
                    ])
                    ->orderBy('a.rollNo')
                    ->get();
                $rows1 = json_decode($rows1, true);
                //return view('result/processExamResult', ['data' => $rows,'datam' => $rows1]);
               return view('result/processExamResult', ['data' => $rows]);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showResultDetails(Request $request){
        try{
            if (session()->has('classId')) {
                $classId = Session::get('classId');
                $rows = DB::table('result_marks_details')
                    ->where([
                        ['resultId', '=', $request->resultId],
                    ])
                    ->get();
               // print_r($request->resultId);
                $rows1 = json_decode($rows, true);
                $result = DB::table('result_marks_details as a')
                ->join('result_marksheet as b','a.resultId','b.resultId')
                ->join('subjects as c','c.code','a.courseCode')
                ->where([
                    ['a.sessionName', '=' ,$rows1[0]['sessionName']],
                    ['a.medium', '=' , $rows1[0]['medium']],
                    ['a.version', '=' , $rows1[0]['version']],
                    ['a.shift' , '=' ,  $rows1[0]['shift']],
                    ['a.class' , '=' , $rows1[0]['class']],
                    ['a.section' , '=' , $rows1[0]['section']],
                ])
                ->where(function ($query) use ($request,$rows1) {
                    if ($request->group != '')
                        $query->where('a.groupName', '=',$rows1[0]['groupName']);
                })
                ->where([
                    ['c.classId', '=', $classId],
                    ['a.rollNo', '=',  $rows1[0]['rollNo']],
                ])
                ->get();
                if ($result) {
                    return response()->json(array('data' => $result));
                }
            }
            else{
                return response()->json(array('errorMsg' => 'Session timed out.Try agin!'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
}