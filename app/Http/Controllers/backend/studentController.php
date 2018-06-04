<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Sessions;
use App\Student;
use Hash;
use Auth;
use Redirect;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class studentController extends Controller
{
    public function studentAttendance(Request $request) {

        $rows =  DB::table('students')
            ->join('class_allhistory', 'students.studentId', '=', 'class_allhistory.studentId')
            ->select('students.studentId','students.name', 'class_allhistory.rollNo')
            ->where([
                ['classId', '=', session()->get('classId')],
            ])
            ->orderBy('rollNo', 'asc')
            ->get();
        return response()->json(array('data'=>$rows));

    }
    public function searchStudentIdForSub(Request $request){
        try{
            $rows =DB::table('class_allhistory AS a')
                ->select('b.name','b.code','a.classId','a.groupName','a.studentId')
                ->join('subjects As b','a.classId','b.classId')
                ->where([
                    ['a.studentId', '=',  $request->studentId],
                ])
                ->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertCompulsorySub(Request $request){
        try{

                $studentInfoSub = json_decode($request->getContent(), true);

                $finalRow=DB::transaction(function () use ($request,$studentInfoSub) {

                    $rows =  DB::table('student_subject_list')->select('classId')->where([
                        ['studentId', '=', $studentInfoSub['studentId']],
                        ['classId', '=', $studentInfoSub['classId']],
                        ['subType', '=', $studentInfoSub['subType']],
                    ])->distinct()->get()->count();
                    if ($rows>0) {
                        return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                    }
                    else{
                        $data = array();
                        $studentId = $studentInfoSub['studentId'];
                        $classId = $studentInfoSub['classId'];
                        $subType = $studentInfoSub['subType'];
                        $groupName = $studentInfoSub['groupName'];
                        $sublist = $studentInfoSub['sublist'];
                        foreach ($sublist as $row){
                            $data[] = array(
                                "studentId" => $studentId,
                                "classId" => $classId,
                                "groupName" => $groupName,
                                "subCode" => $row['value'],
                                "subType" => $subType,
                            );
                        }
                        //print_r($data);

                        $result=DB::table('student_subject_list')->insert($data);
                        if ($result) {
                            //print_r($data);
                            return response()->json(array(
                                'successMsg' => 'New Fees  is successfully added.',
                            ));
                        } else {
                            return response()->json(array('errorMsg' => 'Failed to create new Fees. Please try again.'));
                        }
                    }

                }, 5);

                return $finalRow;

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertOptionalSub(Request $request){
        try{

                $studentInfoSub = json_decode($request->getContent(), true);

                $finalRow=DB::transaction(function () use ($request,$studentInfoSub) {

                    $rows =  DB::table('student_subject_list')->select('classId')->where([
                        ['studentId', '=', $studentInfoSub['studentId']],
                        ['classId', '=', $studentInfoSub['classId']],
                        ['subType', '=', $studentInfoSub['subType']],
                    ])->distinct()->get()->count();
                    if ($rows>0) {
                        return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                    }
                    else{
                        $data = array();
                        $studentId = $studentInfoSub['studentId'];
                        $classId = $studentInfoSub['classId'];
                        $subType = $studentInfoSub['subType'];
                        $groupName = $studentInfoSub['groupName'];
                        $sublist = $studentInfoSub['sublist'];
                        foreach ($sublist as $row){
                            $data[] = array(
                                "studentId" => $studentId,
                                "classId" => $classId,
                                "groupName" => $groupName,
                                "subCode" => $row['value'],
                                "subType" => $subType,
                            );
                        }
                        //print_r($data);

                        $result=DB::table('student_subject_list')->insert($data);
                        if ($result) {
                            //print_r($data);
                            return response()->json(array(
                                'successMsg' => 'New Subject  is successfully added.',
                            ));
                        } else {
                            return response()->json(array('errorMsg' => 'Failed to add new Subject. Please try again.'));
                        }
                    }

                }, 5);

                return $finalRow;

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showAllSubjectList(Request $request) {

        $rows =  DB::table('student_subject_list as a')
            ->select('a.id','b.code','a.subType','b.name')
            ->join('subjects as b', 'a.subCode', '=', 'b.code')
            ->where([
                ['a.studentId', '=', $request->studentId],
            ])
            ->get();
        return response()->json(array('data'=>$rows));

    }

    public function updateSubjectType(Request $request){
        try{
            print_r($request->id);
            $result =DB::table('student_subject_list')
                ->where('id', $request->id)
                ->update([
                    'subType' =>  $request->subType,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Subject Type is successfully updated.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Subject Type is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
}