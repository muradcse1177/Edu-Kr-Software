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

class examController extends Controller
{
    public function showExamList(Request $request){
        try{
            $rows =DB::table('exam_names')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function insertExamSetup(Request $request){
        try{
            $rows =  DB::table('exam_names')->select('examName')->where([
                ['examName', '=', $request->examName],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('exam_names')->insert([
                    'examName' =>  $request->examName,
                    'status' =>  $request->status,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Examination is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Fees books. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editExamSetup(Request $request){
        try{

            $result =DB::table('exam_names')
                ->where('id', $request->dbid)
                ->update([
                    'examName' =>  $request->examName,
                    'status' =>  $request->status,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Exam Info is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Exam Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function deleteExamNameSet(Request $request){
        try{
            $id= $request->dbiddel;

            $result =  DB::table('exam_names')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Exam Info file is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Exam Info. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function insertGradesetup(Request $request){
        try{
            $rows =  DB::table('exam_gpa')->select('id')->where([
                ['class', '=', $request->class],
                ['courseCode', '=', $request->courseCode],
                ['lowerMark', '=', $request->lowerMark],
                ['upperMark', '=', $request->upperMark],
                ['gpa', '=', $request->gpa],
                ['grade', '=', $request->grade],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('exam_gpa')->insert([
                    'class'=> $request->class,
                    'courseCode'=> $request->courseCode,
                    'lowerMark'=> $request->lowerMark,
                    'upperMark'=> $request->upperMark,
                    'gpa'=> $request->gpa,
                    'grade'=> $request->grade,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Grade is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Grade. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showGradeList(Request $request){
        try{
            $rows =DB::table('exam_gpa as a')
                ->select('a.id','a.class','a.courseCode','a.lowerMark','a.upperMark','a.gpa','a.grade','b.name')
                ->join('subjects as b','a.coursecode','b.code')
                ->limit(20)
                ->orderBy('id','desc')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editGradeSetup(Request $request){
        try{

            $result =DB::table('exam_gpa')
                ->where('id', $request->dbid)
                ->update([
                    'class'=> $request->class,
                    'courseCode'=> $request->courseCode,
                    'lowerMark'=> $request->lowerMark,
                    'upperMark'=> $request->upperMark,
                    'gpa'=> $request->gpa,
                    'grade'=> $request->grade,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Grade Info is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Grade Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteGradeSet(Request $request){
        try{
            $id= $request->dbiddel;

            $result =  DB::table('exam_gpa')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Grade Info file is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Grade Info. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getClassNameExam(Request $request){
        try{
            $rows =DB::table('class_classes')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function gradeListSelect(Request $request){
        try{
            $className =json_decode($request->getContent(), true);

            $rows =DB::table('exam_gpa')
                ->where('class',$className)->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function subjectListSelect(Request $request){
        try{
            $className =json_decode($request->getContent(), true);

            $rows =DB::table('class_allclasses AS a')
                ->select('b.name','b.code')
                ->join('subjects AS b','b.classId','=','a.classId')
                ->where('classNum',$className)->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showGradeListGroup(Request $request){
        try{
            $rows =DB::table('exam_allexams')
                ->where('sessionName',$request->acaSession)
                ->where('examName',$request->examName)
                ->groupBy('class')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showSubjectListResult(Request $request){
        try{
            $rows =DB::table('exam_marks_distribution AS a')
                ->select('a.id','a.class','a.courseCode','a.fullMarks','a.written','a.objective','a.practical','a.ct','a.attendance','a.sar','a.ca','a.assesment','b.name')
                ->join('subjects AS b','b.code','=','a.courseCode')
                ->where('a.class',$request->className)
                ->groupBy('courseCode')
                ->get();
           return view('examination/editmarksDist', ['datas' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function updateExamInfo(Request $request){
        try{
            if($request->action =="edit") {
                $fullMarks = $request->fullMarks;
                $sum = $request->written + $request->objective + $request->practical + $request->ct + $request->attendance + $request->sar + $request->ca + $request->assesment;
                //print_r($request->id);
                if ($fullMarks == $sum) {
                    $result = DB::transaction(function () use ($request) {
                        $rows = DB::table('exam_marks_distribution')
                            ->where('id', $request->id)
                            ->update([
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

                        return $rows;
                    }, 5);
                    if ($result) {
                        return response()->json(array(
                            'successMsg' => 'Exam Info is successfully updated'
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Exam Info is not updated.Please try again'));
                    }
                } else {
                    return response()->json(array('errorMsg' => 'Marks Distribution not correct'));
                }
            }
            if($request->action =="delete"){

                $result =  DB::table('exam_marks_distribution')
                    ->where('id',$request->id)
                    ->delete();
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Exam Info is successfully Deleted.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to Deleted Exam Info. Please try again.'));
                }

            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function showExamDateTime(Request $request){
        try{
            $rows =DB::table('exam_allexams AS a')
                ->join('exam_sub_schedule As b','b.examId','a.examId')
                ->join('subjects As c','a.class','c.class')
                ->where('a.sessionName', $request->sessionName)
                ->where('a.examName', $request->examName)
                ->where('a.class', $request->className)
                ->groupBy('c.code')
                ->get();
            return view('examination/editExamTime', ['datas' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function updateExamDateTime(Request $request){
        try{
            if($request->action =="edit"){
                $result = DB::table('exam_sub_schedule')
                    ->where('id', $request->id)
                    ->update([
                        'date' => $request->date,
                        'startTime' => $request->startTime,
                        'endTime' => $request->endTime,
                        'roomNo' => $request->roomNo,
                        'TeacherName' => $request->TeacherName,
                    ]);

                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Exam Info is successfully updated'
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Exam Info is not updated.Please try again'));
                }
            }
            if($request->action =="delete"){

                $result =  DB::table('exam_sub_schedule')
                    ->where('id',$request->id)
                    ->delete();
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Exam Info file is successfully Deleted.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to Deleted Exam Info. Please try again.'));
                }

            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function examList(Request $request){
        try{
            $rows =DB::table('exam_names')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getExamNameList(Request $request){
        try{
            $session=json_decode($request->getContent(), true);
            $rows =DB::table('exam_allexams')
                ->where('sessionName',$session['sessionName'])
                ->groupBy('examName')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getExamId(Request $request){
        try{
            $examInfo=json_decode($request->getContent(), true);
            $rows =DB::table('exam_allexams')
                ->where('sessionName',$examInfo['sessionName'])
                ->where('examName',$examInfo['examName'])
                ->where('courseId',$examInfo['courseCode'])
                ->where('class',$examInfo['className'])
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getclassNameList(Request $request){
        try{
            $session=json_decode($request->getContent(), true);
            $rows =DB::table('exam_allexams')
                ->where('sessionName',$session['sessionName'])
                ->where('examName',$session['examName'])
                ->groupBy('class')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getCourseList(Request $request){
        try{
            $class=json_decode($request->getContent(), true);
            $rows =DB::table('subjects AS a')
                ->select('a.name','a.code')
                ->join('class_allclasses AS b','a.classId','b.classId' )
                ->where('b.classNum',$class['class'])
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function teacherList(Request $request){
        try{
            $class=json_decode($request->getContent(), true);
            $rows =DB::table('employees')
                ->where('employeeType','Teacher')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function insertExaminationSetup(Request $request){
        try{
            $rows =  DB::table('exam_allexams')->select('sessionName')->where([
                ['sessionName', '=', $request->sessionName],
                ['examName', '=', $request->examName],
                ['class', '=', $request->className],
                ['courseId', '=', $request->courseCode]
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('exam_allexams')->insert([
                    'sessionName'=> $request->sessionName,
                    'examName'=> $request->examName,
                    'class'=> $request->className,
                    'courseId'=> $request->courseCode,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Examination is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Fees books. Please try again.'));
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertExaminationMarksSetup(Request $request){
        try{
            $rows =  DB::table('exam_marks_distribution')->select('class')->where([
                ['class', '=', $request->className],
                ['courseCode', '=', $request->courseCode],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $fullMarks=$request->fullMarks;
                $sum = $request->written+$request->objective+$request->practical+$request->ct+$request->attendance+$request->sar+$request->ca+$request->assesment;
                if($fullMarks == $sum ){
                    $result = DB::table('exam_marks_distribution')->insert([
                        'class'=> $request->className,
                        'courseCode'=> $request->courseCode,
                        'fullMarks'=> $request->fullMarks,
                        'written'=> $request->written,
                        'objective'=> $request->objective,
                        'practical'=> $request->practical,
                        'ct'=> $request->ct,
                        'attendance'=> $request->attendance,
                        'sar'=> $request->sar,
                        'ca'=> $request->ca,
                        'assesment'=> $request->assesment,
                    ]);
                    if ($result) {
                        return response()->json(array(
                            'successMsg' => 'New Examination is successfully added.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to add new Fees books. Please try again.'));
                    }
                }
                else {
                    return response()->json(array('errorMsg' => 'Marks Distribution not correct!!'));
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertExaminationTimeSetup(Request $request){
        try{
            $rows =  DB::table('exam_sub_schedule')->select('examId')->where([
                ['examId', '=', $request->examId],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('exam_sub_schedule')->insert([
                    'examId'=> $request->examId,
                    'date'=> $request->date,
                    'startTime'=> $request->startTime,
                    'endTime'=> $request->endTime,
                    'roomNo'=> $request->roomNo,
                    'TeacherName'=> $request->teacherId
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Examination is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Fees books. Please try again.'));
                }

            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showExamUpdateData(Request $request){
        try{
            $class=json_decode($request->getContent(), true);
            $rows =DB::table('exam_allexams')
                ->where('examName',$class['examName'])
                ->where('class',$class['className'])
                ->where('courseId',$class['courseCode'])
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
}