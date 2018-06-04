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
use PDF;
use Illuminate\Support\Facades\Input;

class employeeController extends Controller
{
    public function listDesignationNames(Request $request){
        try{
            $rows =DB::table('employee_designation')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function saveEmployeeInfo(Request $request){

        try{
            $rows =  DB::table('employees')
                ->select('mobile')
                ->where([
                    ['mobile', '=', $request->mobile],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $path = "";
                if ($request->hasFile('photo')) {
                    $targetFolder = 'files/uploads/images/profile/';
                    $file = $request->file('photo');
                    $name = time() . '.' . $file->getClientOriginalName();
                    $image['filePath'] = $name;
                    $file->move($targetFolder, $name);
                    $path = '/' . $targetFolder . $name;
                }
                $employeeID='EMP'.substr(date("Y"),-2).substr(date("M"),-3).date("his");
                $result = DB::table('employees')->insert([
                    'employeeId' =>  $employeeID,
                    'name' =>  $request->name,
                    'dateOfBirth' =>  $request->birthdate,
                    'designation' =>  $request->designation,
                    'employeeType' =>  $request->empolyeeType,
                    'dateOfJoining' =>  $request->dateOfJoining,
                    'maritalStatus' =>  $request->maritalStatus,
                    'gender' =>  $request->gender,
                    'mobile' =>  $request->mobile,
                    'email' =>  $request->email,
                    'religon' =>  $request->religon,
                    'bloodGroup' =>  $request->bloodgroup,
                    'nationality' =>  $request->nationality,
                    'photoId' =>  $request->photoIdNo,
                    'photoIdType' =>  $request->photoIdType,
                    'photo' =>  $path,
                ]);
                $row = DB::table('employees')->orderBy('employeeId', 'desc')->limit(1)->get();
                $arr = $row->toArray();
                $employeeId = $arr[0]->employeeId;
                session([
                    'newEmployeeId' => $employeeId,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Student profile is successfully created.',
                        'newEmployeeId' => $employeeId
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to create new profile. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function saveEmpAddress(Request $request){
        try {
            if (session()->has('newEmployeeId')) {
                $rules = array (
                    //'userId' => 'required|unique:users|alpha_num|min:4',
                    //'birthdate' => 'required',
                    //'email' => 'required|email',
//                    'password' => 'required|min:6|confirmed'
                );
                $validator = Validator::make ( Input::all (), $rules );
                if ($validator->fails ()) {
//                    return response()->json(array('errorMsg' => 'Validation failed. Please try again.'));
//                    return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
                    $errors = $validator->errors();
                    $errors =  json_decode($errors);

                    return response()->json([
                        'success' => false,
                        'errorMsg' => $errors
                    ], 422);
                } else {
                    $rows =  DB::table('addresses')
                        ->select('userId')
                        ->where([
                            ['userId', '=', Session::get('newEmployeeId')],
                        ])
                        ->distinct()->get()->count();
                    if ($rows>0) {
                        return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                    }
                    else{
                        $result1 = DB::table('addresses')->insert([
                            'addressType' => 'Present',
                            'userId' => Session::get('newEmployeeId'),
                            'country' => $request->countrypre,
                            'state' => $request->statepre,
                            'city' => $request->citypre,
                            //'division' => $request->divisionpre,
                            'district' => $request->districtpre,
                            'upazilla' => $request->upazillapre,
                            //'thana' => $request->name,
                            'postOffice' => $request->postofficepre,
                            'postcode' => $request->postcodepre,
                            'address' => $request->addresspre
                        ]);
                        if( $request->chkSameAddress=='chkSameAddress'){
                            $result2 = DB::table('addresses')->insert([
                                'addressType' => 'Permanent',
                                'userId' => Session::get('newEmployeeId'),
                                'country' => $request->countrypre,
                                'state' => $request->statepre,
                                'city' => $request->citypre,
                                //'division' => $request->divisionpre,
                                'district' => $request->districtpre,
                                'upazilla' => $request->upazillapre,
                                //'thana' => $request->name,
                                'postOffice' => $request->postofficepre,
                                'postcode' => $request->postcodepre,
                                'address' => $request->addresspre
                            ]);
                        }
                        else{
                            $result2 = DB::table('addresses')->insert([
                                'addressType' => 'Permanent',
                                'userId' => Session::get('newEmployeeId'),
                                'country' => $request->countryper,
                                'state' => $request->stateper,
                                'city' => $request->cityper,
                                //'division' => $request->divisionper,
                                'district' => $request->districtper,
                                'upazilla' => $request->upazillaper,
                                //'thana' => $request->name,
                                'postOffice' => $request->postofficeper,
                                'postcode' => $request->postcodeper,
                                'address' => $request->addresspre
                            ]);
                        }

                    }
                    if ($result1 && $result2) {
                        return response()->json(array(
                            'successMsg' => 'Address saved successfully.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to Save data. Please try again.'));
                    }
                }
            }
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
//            dd($ex->getMessage());
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }
    public function saveEmpFnfInfo(Request $request){
        try {
            if (session()->has('newEmployeeId')) {
                $rules = array (
                    'fnfType' => 'required',
                    'Name' => 'required'
                );
                $validator = Validator::make ( Input::all (), $rules );
                if ($validator->fails ()) {
                    $errors = $validator->errors();
                    $errors =  json_decode($errors);
                    return response()->json([
                        'success' => false,
                        'errorMsg' => $errors
                    ], 422);
                } else {
                    $rows =  DB::table('fnf_details')
                        ->select('userId')
                        ->where([
                            ['userId', '=', Session::get('newEmployeeId')],
                            ['fnfType', '=',  $request->fnfType,],
                        ])
                        ->distinct()->get()->count();
                    if ($rows>0) {
                        return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                    }
                    else{
                        $result1 = DB::table('fnf_details')->insert([
                            'fnfType' => $request->fnfType,
                            'userId' => Session::get('newEmployeeId'),
                            'name' => $request->Name,
                            'mobile' => $request->Mobile,
                            'email' => $request->Email,
                            'occupation' => $request->Occupation,
                            'yearlyIncome' => $request->YearlyIncome,
                            'photoIdType' => $request->PhotoIdType,
                            'photoIdNo' => $request->PhotoIdNo,
                            'nationality' => $request->nationality,
                            'relationship' => $request->relationship,
                            'address' => $request->address,
                        ]);
                        if ($result1) {
                            return response()->json(array(
                                'successMsg' => 'Information saved successfully.',
                            ));
                        } else {
                            return response()->json(array('errorMsg' => 'Failed to Save data. Please try again.'));
                        }
                    }
                }
            }
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
//            dd($ex->getMessage());
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }
    public function saveEmpAcaSum(Request $request){
        try {
            if (session()->has('newEmployeeId')) {

                $rows = DB::table('employee_academic_summary')
                    ->select('employeeId')
                    ->where([
                        ['yearOfPass', '=', $request->yearOfPass],
                    ])
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                } else {
                    $result1 = DB::table('employee_academic_summary')->insert([
                        'employeeId' => Session::get('newEmployeeId'),
                        'levelEdu' => $request->levelEdu,
                        'instituteName' => $request->instituteName,
                        'majorSub' => $request->majorSub,
                        'board' => $request->board,
                        'yearOfPass' => $request->yearOfPass,
                        'resultGpa' => $request->resultGpa,
                        'outOf' => $request->outOf,
                        'achivement' => $request->achivement,
                    ]);
                    if ($result1) {
                        return response()->json(array(
                            'successMsg' => 'Information saved successfully.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to Save data. Please try again.'));
                    }
                }
            }
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
//            dd($ex->getMessage());
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }
    public function saveEmpTrainSum(Request $request){
        try {
            if (session()->has('newEmployeeId')) {

                $rows = DB::table('employe_train_sum')
                    ->select('trainingTitle')
                    ->where([
                        ['trainingTitle', '=', $request->trainingTitle],
                    ])
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                } else {
                    $result1 = DB::table('employe_train_sum')->insert([
                        'employeeId' => Session::get('newEmployeeId'),
                        'trainingTitle' => $request->trainingTitle,
                        'country' => $request->country,
                        'topicsCover' => $request->topicsCover,
                        'trainigYear' => $request->trainigYear,
                        'institute' => $request->institute,
                        'duration' => $request->duration,
                        'location' => $request->location,
                    ]);
                    if ($result1) {
                        return response()->json(array(
                            'successMsg' => 'Information saved successfully.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to Save data. Please try again.'));
                    }
                }
            }
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
//            dd($ex->getMessage());
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }
    public function showEmployeeList(Request $request){
        try{
            $rows =DB::table('employees')
                ->where(function ($query) use($request) {
                    if($request->empolyeeType  != '' )
                        $query->where('employeeType', '=', $request->empolyeeType);
                    if($request->employeeId  != '' )
                        $query->where('employeeId', '=', $request->employeeId);
                    if($request->name  != '' )
                        $query->where('name', '=', $request->name);
                })
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function searchCourseAndTeacher(Request $request){
        try{
            if (session()->has('classId')) {

                $subject =  DB::table('subjects')->where([['classId', '=', Session::get('classId')]])->get();

                $teacher =  DB::table('employees')->select('employeeId','name')->where([['employeeType', '=', 'Teacher']])->get();
                 if($subject && $teacher) {
                     return response()->json(array(
                         'subject'=>$subject,
                         'teacher'=>$teacher,
                     ));
                 }
            }
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function assignSubTeacher(Request $request){
        try {
            if (session()->has('classId')) {
                $rows = DB::table('subject_teacher_relation')
                    ->select('teacherId')
                    ->where([
                        ['teacherId', '=', $request->teacher],
                        ['subId', '=', $request->subject],
                        ['classId', '=', Session::get('classId')],
                    ])
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                } else {
                    $result1 = DB::table('subject_teacher_relation')->insert([
                        'teacherId' => $request->teacher,
                        'subId' => $request->subject,
                        'classId' => Session::get('classId'),
                    ]);
                    if ($result1) {
                        return response()->json(array(
                            'successMsg' => 'Subject assign  saved successfully.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to Save Subject assign. Please try again.'));
                    }
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }
    public function searchCourseTeacher(Request $request){
        try{
            if (session()->has('classId')) {

                $row =  DB::table('subject_teacher_relation as a')
                    ->select('a.id','a.teacherId','a.subId','b.name as subName','c.name as empName')
                    ->join('subjects as b','a.subId','b.code')
                    ->join('employees as c','a.teacherId','c.employeeId')
                    ->where(function ($query) use($request) {
                        if(Session::get('classId')  != '' )
                            $query->where('a.classId', '=', Session::get('classId'));
                        if($request->teacher  != '' )
                            $query->where('a.teacherId', '=', $request->teacher);
                    })
                    ->get();
                if($row ) {
                    return response()->json(array(
                        'data'=>$row,
                    ));
                }
            }
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editSubjectTeacher(Request $request){
        try{
            if (session()->has('classId')) {
                $result = DB::table('subject_teacher_relation')
                    ->where('id', $request->dbid)
                    ->where('classId', Session::get('classId'))
                    ->update([
                        'teacherId' => $request->teacher,
                        'subId' => $request->subject,
                    ]);

                $row =  DB::table('subject_teacher_relation as a')
                    ->select('a.id','a.teacherId','a.subId','b.name as subName','c.name as empName')
                    ->join('subjects as b','a.subId','b.code')
                    ->join('employees as c','a.teacherId','c.employeeId')
                    ->where(function ($query) use($request) {
                        if(Session::get('classId')  != '' )
                            $query->where('a.classId', '=', Session::get('classId'));
                    })
                    ->get();
                if ($result && $row) {
                    return response()->json(array(
                        'successMsg' => 'Subject and Teacher is successfully updated.',
                        'data'=>$row
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Subject and Teacher is not updated.Please try again'));
                }
            }
            else{
                return response()->json(array('errorMsg' => 'Session Timed out.Please try again'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteSubTeacher(Request $request){
        try{
            if (session()->has('classId')) {
                $result = DB::table('subject_teacher_relation')
                    ->where('id', $request->dbiddel)
                    ->where('classId', Session::get('classId'))
                    ->delete();

                $row =  DB::table('subject_teacher_relation as a')
                    ->select('a.id','a.teacherId','a.subId','b.name as subName','c.name as empName')
                    ->join('subjects as b','a.subId','b.code')
                    ->join('employees as c','a.teacherId','c.employeeId')
                    ->where(function ($query) use($request) {
                        if(Session::get('classId')  != '' )
                            $query->where('a.classId', '=', Session::get('classId'));
                    })
                    ->get();
                if ($result && $row) {
                    return response()->json(array(
                        'successMsg' => 'Subject and Teacher is successfully deleted.',
                        'data'=>$row
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Subject and Teacher is not deleted.Please try again'));
                }
            }
            else{
                return response()->json(array('errorMsg' => 'Session Timed out.Please try again'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function teacherAttendance(Request $request){
        try{
            $today = date("Y-m-d");
            if($request->selectedDate <= $today)
            {
                $row =  DB::table('employees')->select('employeeId','name','employeeType')
                    ->where([['employeeType', '=', $request->employeeType]])
                    ->get();
                if($row) {
                    return response()->json(array(
                        'data'=>$row
                    ));
                }
            }
            else{
                return response()->json(array('errorMsg' => 'Your Date request not perfect.Please try again'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function saveTeacherAttendance(Request $request){
        try {

            $attendance = json_decode($request->getContent(), true);
            $rows = DB::table('employee_attendance_summary')
                ->select('date')
                ->where([
                    ['date', '=', $attendance['date']],
                    ['employeeType', '=', $attendance['employeeType']],
                ])
                ->distinct()->get()->count();
            if ($rows > 0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::transaction(function () use ($request,$attendance) {

                    $result1 = DB::table('employee_attendance_summary')->insert([
                        'date' => $attendance['date'],
                        'employeeType' => $attendance['employeeType'],
                    ]);

                    $result2 = DB::table('employee_attendance_summary')->orderBy('attendanceId', 'desc')->take(1)->get();

                    $arr = $result2->toArray();
                    $attendanceId = $arr[0]->attendanceId;
                    $attendance_arr = $attendance['attendance'];
                    $data = array();
                    foreach ($attendance_arr as $row){
                        $data[] = array(
                            "attendanceId" => $attendanceId,
                            "employeeId" => $row['employeeId'],
                            "attendance" => $row['attendance']
                        );
                    }
                    $rows = DB::table('employee_attendance_details')->insert($data);

                    return $rows;
                }, 5);

                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Attendance Saved Successfully.'
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Attendance is not Saved .Please try again'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }
    public function searchEmpAttendance(Request $request){
        try{
            if($request->search == 'search') {
                $row = DB::table('employee_attendance_summary as a')
                    ->join('employee_attendance_details as b', 'a.attendanceId', 'b.attendanceId')
                    ->join('employees as c', 'b.employeeId', 'c.employeeId')
                    ->where([
                        ['a.date', '>=', $request->datepicker_start],
                        ['a.date', '<=', $request->datepicker_end],
                        ['b.employeeId', '=', $request->employeeId],
                    ])
                    ->get();
                if ($row) {
                    return view('teacher/attandancereportTeacher', ['data' => $row]);
                }
            }
            if($request->pdf == 'pdf') {
                $row = DB::table('employee_attendance_summary as a')
                    ->join('employee_attendance_details as b', 'a.attendanceId', 'b.attendanceId')
                    ->join('employees as c', 'b.employeeId', 'c.employeeId')
                    ->where([
                        ['a.date', '>=', $request->datepicker_start],
                        ['a.date', '<=', $request->datepicker_end],
                        ['b.employeeId', '=', $request->employeeId],
                    ])
                    ->get();
                view()->share('data', $row);
                $pdf = PDF::setPaper('a4')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('teacher/teaattreport');
                return $pdf->download('Attendance.pdf');
                }
            }

        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

}