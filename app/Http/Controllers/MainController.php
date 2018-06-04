<?php

namespace App\Http\Controllers;

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

class MainController extends Controller {

    public function login(Request $request) {
        $rules = array (
            'userId' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make ( Input::all (), $rules );
        if ($validator->fails ()) {
            return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
        } else {
            if (Auth::attempt ( array (
                'userId' => $request->get ( 'userId' ),
                'password' => $request->get ( 'password' )
            ) )) {
                session ( [
                    'name' => $request->get ( 'userId' )
                ] );
                return Redirect::back ();
            } else {
                Session::flash ( 'message', "Invalid Credentials , Please try again." );
                return Redirect::back ();
            }
        }
    }
    public function register(Request $request) {
        $rules = array (
            'login' => 'required|unique:users|alpha_num|min:4',
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed'
        );
        $validator = Validator::make ( Input::all (), $rules );
        if ($validator->fails ()) {
            return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
        } else {
            $user = new User ();
            $user->userId = $request->get ( 'login' );
            $user->name = $request->get ( 'name' );
            $user->email = $request->get ( 'email' );
            $user->password = Hash::make ( $request->get ( 'password' ) );
            $user->remember_token = $request->get ( '_token' );
            $user->save ();
            return Redirect::back()->with('success', 'Registration Successful!');
        }
    }
    public function logout() {
        Session::flush ();
        Auth::logout ();
        return Redirect::back ();
    }


    public function getSubjectNames(){
        if (session()->has('classId')) {
            $rows = DB::table('subjects')->where('classId', Session::get('classId'))->get(); //Sessions::all();
            return response()->json(array('data' => $rows));
        }
        else {
            return response()->json(array('errorMsg' => 'Session Timed Out. No Class Information found. Please try again.'));
        }
    }
    public function getCountryList(){
        $rows =  DB::table('country')->get(); //Sessions::all();
        return response()->json(array('data'=>$rows));
    }
    public function getBoardNames(){
        $rows =  DB::table('info_boards')->get(); //Sessions::all();
        return response()->json(array('data'=>$rows));
    }
    public function getDistrictList(){
        $rows =  DB::table('districts')->select('id','name','bn_name')->orderBy('name', 'asc')->get(); //Sessions::all();
        return response()->json(array('data'=>$rows));
    }

    public function getUpazillaList(Request $request){
        $rows =  DB::table('upazilas')->select('id','name','bn_name')->where('district_id',$request->selectedDistrict)->orderBy('name', 'asc')->get(); //Sessions::all();
        return response()->json(array('data'=>$rows));
    }

    public function getPostofficeList(Request $request){
        $rows =  DB::table('unions')->select('id','name','bn_name')->where('upazila_id',$request->selectedUpazilla)->orderBy('name', 'asc')->get(); //Sessions::all();
        return response()->json(array('data'=>$rows));
    }
    public function getStudentTypeList(){
        $rows =  DB::table('student_types')->get(); //Sessions::all();
        return response()->json(array('data'=>$rows));
    }
    public function getBloodGroupList(){
        $rows =  DB::table('info_bloodgroups')->get();
        return response()->json(array('data'=>$rows));
    }
    public function getGenderList(){
        $rows =  DB::table('info_genders')->get();
        return response()->json(array('data'=>$rows));
    }
    public function getReligionList(){
        $rows =  DB::table('info_religions')->get();
        return response()->json(array('data'=>$rows));
    }
    public function getSessionList(){
        $rows =  Sessions::all();
        return response()->json(array('data'=>$rows));
    }
    public function getMediumList(Request $request){
        //$rows =  Mediums::all();
        $rows =  DB::table('class_allclasses')->select('mediumName')->where('sessionName', $request->selectedSession)
              ->distinct()->get();
//        $rows = DB::table('class_allhistory as a')
//            ->join('class_allclasses as b', 'b.classId', '=', 'a.classId')
//            ->where('b.sessionName', $request->selectedSession)
//            ->select('b.mediumName')
//            ->groupBy('b.mediumName')
//            ->get();
        return response()->json(array('data'=>$rows));
        //return $request->selectedSession;
    }
    public function getVersionList(Request $request){
        //$rows =  Versions::all();
        $rows =  DB::table('class_allclasses')->select('versionName')->where([
            ['sessionName', '=', $request->selectedSession],
            ['mediumName', '=', $request->selectedMedium]
        ])->distinct()->get();
//        $rows = DB::table('class_allhistory as a')
//            ->join('class_allclasses as b', 'b.classId', '=', 'a.classId')
//            ->where([
//                ['b.sessionName', $request->selectedSession],
//                ['b.mediumName', $request->selectedMedium]
//            ])
//            ->select('b.versionName')
//            ->groupBy('b.versionName')
//            ->get();
        return response()->json(array('data'=>$rows));
    }
    public function getShiftList(Request $request){
        //$rows =  Versions::all();
        $rows =  DB::table('class_allclasses')->select('shiftName')->where([
            ['sessionName', '=', $request->selectedSession],
            ['mediumName', '=', $request->selectedMedium],
            ['versionName', '=', $request->selectedVersion]
        ])->distinct()->get();
//        $rows = DB::table('class_allhistory as a')
//            ->join('class_allclasses as b', 'b.classId', '=', 'a.classId')
//            ->where([
//                    ['b.sessionName', $request->selectedSession],
//                    ['b.mediumName', $request->selectedMedium],
//                    ['b.versionName', $request->selectedVersion]
//            ])
//            ->select('b.shiftName')
//            ->groupBy('b.shiftName')
//            ->get();
        return response()->json(array('data'=>$rows));
    }
    public function getClassList(Request $request){
        //$rows =  Versions::all();
        $rows =  DB::table('class_allclasses')->select('classNum')->where([
            ['sessionName', '=', $request->selectedSession],
            ['mediumName', '=', $request->selectedMedium],
            ['versionName', '=', $request->selectedVersion],
            ['shiftName', '=', $request->selectedShift]
        ])->distinct()->get();
//        $rows = DB::table('class_allhistory as a')
//            ->join('class_allclasses as b', 'b.classId', '=', 'a.classId')
//            ->where([
//                ['b.sessionName', $request->selectedSession],
//                ['b.mediumName', $request->selectedMedium],
//                ['b.versionName', $request->selectedVersion],
//                ['b.shiftName', $request->selectedShift]
//            ])
//            ->select('b.classNum')
//            ->groupBy('b.classNum')
//            ->get();
        return response()->json(array('data'=>$rows));
    }
    public function getSectionList(Request $request){
        //$rows =  Versions::all();
        $rows =  DB::table('class_allclasses')->select('sectionName','classId')->where([
            ['sessionName', '=', $request->selectedSession],
            ['mediumName', '=', $request->selectedMedium],
            ['versionName', '=', $request->selectedVersion],
            ['shiftName', '=', $request->selectedShift],
            ['classNum', '=', $request->selectedClass]
        ])->distinct()->get();
        return response()->json(array('data'=>$rows));
    }
    public function getClassId(Request $request){
        //$rows =  Versions::all();
        $rows =  DB::table('class_allclasses')->select('classId')->where([
            ['sessionName', '=', $request->selectedSession],
            ['mediumName', '=', $request->selectedMedium],
            ['versionName', '=', $request->selectedVersion],
            ['shiftName', '=', $request->selectedShift],
            ['classNum', '=', $request->selectedClass],
            ['sectionName', '=', $request->selectedSection]
        ])->distinct()->get();
        $arr=$rows->toArray();
        $classId = $arr[0]->classId;
        session ( [
            'classId' => $classId,
        ] );
        return response()->json(array('data'=>$rows));
    }
    public function getGroupList(Request $request){
        //$rows =  Versions::all();
        $rows =  DB::table('class_groups')->select('groupName')->get();
        return response()->json(array('data'=>$rows));
    }
    public function getPhotoIdType(){
        $rows =  DB::table('info_photoid_type')->get();
        return response()->json(array('data'=>$rows));
    }
    public function getFnfType(){
        $rows =  DB::table('fnf_types')->get();
        return response()->json(array('data'=>$rows));
    }
    public function showStudentInfo(Request $request){
        //$x = 1;
        $rows = DB::table('students')
            ->join('class_allhistory', 'students.studentId', '=', 'class_allhistory.studentId')
            ->join('class_allclasses', 'class_allhistory.classId', '=', 'class_allclasses.classId')
            ->select('students.studentId','students.studentPhotoLink','students.name', 'class_allhistory.rollNo', 'class_allhistory.groupName', 'class_allclasses.shiftName', 'class_allclasses.classNum',
                        'class_allclasses.sectionName','class_allhistory.sessionName','class_allclasses.mediumName','class_allclasses.versionName' )
            ->where(function ($query) use($request) {
               if($request->studentId  != '' )
                   $query->where('students.studentId', '=', $request->studentId);
               if($request->acaSession  != '' )
                   $query->where('class_allhistory.sessionName', '=', $request->acaSession);
               if($request->medium  != '' )
                   $query->where('class_allclasses.mediumName', '=', $request->medium);
               if($request->version  != '' )
                   $query->where('class_allclasses.versionName', '=', $request->version);
               if($request->shift  != '' )
                   $query->where('class_allclasses.shiftName', '=', $request->shift);
               if($request->class  != '' )
                   $query->where('class_allclasses.classNum', '=', $request->class);
               if($request->section  != '' )
                   $query->where('class_allclasses.sectionName', '=', $request->section);
//               if($request->group  != '' )
//                   $query->where('class_allclasses.groupName', '=', $request->group);
               if($request->studentType  != '' )
                   $query->where('students.studentType', '=', $request->studentType);
               if($request->name  != '' )
                   $query->where('students.name', 'like', '%'.$request->name.'%');
            })
            ->get();
        return response()->json(array('data'=>$rows));
    }

    public function showStdAttendance(Request $request){
        $selectData = 'd.rollNo as Roll ';

        $start= $request->start_date;
        $end= $request->end_date;
        $datediff = strtotime($end) - strtotime($start);
        $datediff = floor($datediff/(60*60*24));
        for($i = 0; $i < $datediff + 1; $i++){
            $date = date("Y-m-d", strtotime($start . ' + ' . $i . 'day'));
            $date_show = date("d", strtotime($start . ' + ' . $i . 'day'));
            $selectData .= ', MAX(IF(std_attendence_summary.date = \''.$date.'\', substring(std_attendence_details.attendance,1,1),\'-\')) as \''.$date_show.'\'' ;
        }

        $rows = DB::table('std_attendence_details')
            ->join('students', 'students.studentId', '=', 'std_attendence_details.studentId')
            ->join('std_attendence_summary', 'std_attendence_summary.attendanceId', '=',  'std_attendence_details.attendanceId')
            ->join('class_allhistory', 'class_allhistory.classId', '=', 'std_attendence_summary.classId')
            ->join('class_allhistory as d', 'd.studentId', '=', 'students.studentId')
            ->select(DB::raw($selectData))

              ->where(function ($query) use($request) {
                 if($request->studentId  != '' )
                     $query->where('students.studentId', '=', $request->studentId);
                 if($request->acaSession  != '' )
                     $query->where('class_allhistory.classId', '=', Session::get('classId'));
              })

        ->groupBy('std_attendence_details.studentId', 'students.name', 'd.rollNo')
            ->get();
        return response()->json(array('data'=>$rows));
    }

    public function storeClassInfo(Request $request){
        try {
            if (session()->has('classId')) {
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
                    //return response()->json(array('successMsg' => 'Validated for creating new profile. Please try again.'));
                    $path = "";
                    if ($request->hasFile('stdPhoto')) {
                        //$path = $request->stdPhoto->store('files/uploads/images/profile');
                        //return response()->json(array('successMsg' => 'File found',));
                        $targetFolder = 'files/uploads/images/profile/';
                        $file = $request->file('stdPhoto');
                        $name = time() . '.' . $file->getClientOriginalName();
                        $image['filePath'] = $name;
                        $file->move($targetFolder, $name);
                        $path = '/' . $targetFolder . $name;
                    }
                    $result = DB::table('students')->insert([
                        'name' => $request->name,
                        'dateOfBirth' => $request->birthdate,
                        'gender' => $request->gender,
                        'religion' => $request->religion,
                        'nationality' => $request->nationality,
                        'studentType' => $request->studentType,
                        'studentBirthRegNo' => $request->birthregnum,
                        'bloodGroup' => $request->bloodgroup,
                        'mobile' => $request->mobile,
                        'email' => $request->email,
                        'studentPhotoLink' => $path,
                        'addedBy' => Session::get('userId'),
                        'token' => Session::token()
                    ]);
                    $row = DB::table('students')->where('token', Session::token())->orderBy('created_at', 'desc')->take(1)->get();
                    $arr = $row->toArray();
                    $studentId = $arr[0]->studentId;
                    session([
                        'newStudentId' => $studentId,
                    ]);
                    $result2 = DB::table('class_allhistory')->insert([
                        'sessionName' => $request->acaSession,
                        'classId' => Session::get('classId'),
                        'groupName' => $request->group,
                        'studentId' => $studentId,
                        'rollNo' => $request->rollNo,
                        'regNo' => $request->regNo
                    ]);
                    if ($result) {
                        return response()->json(array(
                            'successMsg' => 'New Student profile is successfully created.',
                            'newStudentId' => $studentId
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to create new profile. Please try again.'));
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

    public function storeStdAddress(Request $request){
        try {
            if (session()->has('newStudentId')) {
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
                    $result1 = DB::table('addresses')->insert([
                        'addressType' => 'Present',
                        'userId' => Session::get('newStudentId'),
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
                    $result2 = DB::table('addresses')->insert([
                        'addressType' => 'Permanent',
                        'userId' => Session::get('newStudentId'),
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

    public function storeFnfInfo(Request $request){
        try {
            if (session()->has('newStudentId')) {
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
                    $result1 = DB::table('fnf_details')->insert([
                        'fnfType' => $request->fnfType,
                        'userId' => Session::get('newStudentId'),
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
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
//            dd($ex->getMessage());
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }

    public function storePrevStudyInfo(Request $request){
        try {
            if (session()->has('newStudentId')) {
                $rules = array (
                    'exam' => 'required',
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
                    $result1 = DB::table('std_previous_study')->insert([
                        'userId' => Session::get('newStudentId'),
                        'exam' => $request->exam,
                        'board' => $request->board,
                        'session' => $request->acaSession,
                        'rollNo' => $request->rollNo,
                        'regNo' => $request->regNo,
                        'instituteName' => $request->instituteName,
                        'instituteAddress' => $request->instituteAddress,
                        'resultGrade' => $request->resultGrade,
                        'resultGPA' => $request->resultGPA,
                        'resultPosition' => $request->resultPosition,
                        'result' => $request->resultSummary,
                    ]);
                    if ($result1) {
                        return response()->json(array(
                            'successMsg' => 'Previous Study Info saved successfully.',
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

    public function storeStdAttendance(Request $request){
        try {
            if (session()->has('classId')) {
                $attendance = json_decode($request->getContent(), true);
                $rows =  DB::table('std_attendence_summary')
                    ->select('attendanceId')
                    ->where([
                        ['date', '=',$attendance['date']],
                        ['classId', '=', Session::get('classId')]
                    ])
                    ->distinct()->get()->count();
                //print_r(date('Y-m-d'));
                if ($rows>0) {
                    return response()->json(array('errorMsg' => 'You can Attendance a time a day. Please try for another Class/Course.'));
                }
                else {
                    DB::beginTransaction();
                    $result1 = DB::table('std_attendence_summary')->insert([
                        'classId' => Session::get('classId'),
                        'teacherId' => Session::get('userId'),
                        'date' => $attendance['date'],
                        'token' => Session::token()
                    ]);
                    if ($result1) {
                        $row = DB::table('std_attendence_summary')->where('token', Session::token())->orderBy('created_at', 'desc')->take(1)->get();
                        $arr = $row->toArray();
                        $attendanceId = $arr[0]->attendanceId;
                        $attendance_arr = $attendance['attendance'];
                        $data = array();
                        foreach ($attendance_arr as $row) {
                            $data[] = array(
                                "attendanceId" => $attendanceId,
                                "studentId" => $row['studentId'],
                                "attendance" => $row['attendance']
                            );
                        }
                        $result2 = DB::table('std_attendence_details')->insert($data);
                        if ($result2) {
                            DB::commit();
                            return response()->json(array(
                                'successMsg' => 'Attendance saved successfully.'
                            ));
                        } else {
                            DB::rollBack();
                        }
                    } else {

                        DB::rollBack();
                        return response()->json(array('errorMsg' => 'Failed to Save data. Please try again.'));
                    }
                }
            }
            else {
                return response()->json(array('errorMsg' => 'Session Timed Out. No Class Information found. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
//            dd($ex->getMessage());
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }

}
