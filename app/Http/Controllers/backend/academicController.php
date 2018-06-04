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

class academicController extends Controller
{
    public function insertNewCourse(Request $request){

        try{
            if (session()->has('classId')) {
                $classId = Session::get('classId');
            }
            $name=$request->name;
            $code=$request->code;

            $rows =  DB::table('subjects')
                ->select('id')
                ->where([['classId', '=', $classId]  ])
                ->where(function($query) use ($name,$code) {
                    $query->where('name', $name)
                        ->orWhere('code', $code);
                })
                ->distinct()->get()->count();

            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('subjects')->insert([
                    'classId' =>  $classId,
                    'name' =>  $request->name,
                    'code' =>  $request->code,
                    'class' =>  $request->class,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Subject is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Subject. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertAcademicSession(Request $request){

        try{
            $rows =  DB::table('academic_sessions')
                ->select('sessionId')
                ->where([['sessionName', '=', $request->sessionName]  ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('academic_sessions')->insert([
                    'sessionName' =>  $request->sessionName,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Session is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Session. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertAcademicClass(Request $request){

        try{
            $rows =  DB::table('class_classes')
                ->select('classNum')
                ->where([
                    ['classNum', '=', $request->classNum],
                    ['className', '=', $request->className]
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('class_classes')->insert([
                    'classNum' =>  $request->classNum,
                    'className' =>  $request->className,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Class is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Class. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertAcademicShift(Request $request){

        try{
            $rows =  DB::table('class_shifts')
                ->select('shiftName')
                ->where([
                    ['shiftName', '=', $request->shiftName],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('class_shifts')->insert([
                    'shiftName' =>  $request->shiftName,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Shift is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Shift. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertAcademicGroup(Request $request){

        try{
            $rows =  DB::table('class_groups')
                ->select('groupName')
                ->where([
                    ['groupName', '=', $request->groupName],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('class_groups')->insert([
                    'groupName' =>  $request->groupName,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Group is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Group. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertAcademicSection(Request $request){

        try{
            $rows =  DB::table('class_sections')
                ->select('sectionName')
                ->where([
                    ['sectionName', '=', $request->sectionName],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('class_sections')->insert([
                    'sectionName' =>  $request->sectionName,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Section is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Section. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertAcademicVersion(Request $request){

        try{
            $rows =  DB::table('class_versions')
                ->select('versionName')
                ->where([
                    ['versionName', '=', $request->versionName],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('class_versions')->insert([
                    'versionName' =>  $request->versionName,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Version is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Version. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getSession(Request $request){
        try{
            $rows =DB::table('academic_sessions')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getMedium(Request $request){
        try{
            $rows =DB::table('class_mediums')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getVersion(Request $request){
        try{
            $rows =DB::table('class_versions')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getShift(Request $request){
        try{
            $rows =DB::table('class_shifts')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getSections(Request $request){
        try{
            $rows =DB::table('class_sections')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getClass(Request $request){
        try{
            $rows =DB::table('class_classes')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getGroup(Request $request){
        try{
            $rows =DB::table('class_groups')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertAcademicInfo(Request $request){

        try{
            $rows =  DB::table('class_allclasses')
                ->select('classId')
                ->where([
                    ['sessionName', '=', $request->sessionName],
                    ['mediumName', '=', $request->mediumName],
                    ['versionName', '=', $request->versionName],
                    ['shiftName', '=', $request->shiftName],
                    ['classNum', '=', $request->className],
                    ['sectionName', '=', $request->sectionName],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('class_allclasses')->insert([
                    'sessionName' =>  $request->sessionName,
                    'mediumName' =>  $request->mediumName,
                    'versionName' =>  $request->versionName,
                    'shiftName' =>  $request->shiftName,
                    'classNum' =>  $request->className,
                    'sectionName' =>  $request->sectionName,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Class Info is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Class Info. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showClassInfoList(Request $request){
        try{
            $rows =DB::table('class_allclasses')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editAcademicInfo(Request $request){
        try{

            $result =DB::table('class_allclasses')
                ->where('classId', $request->dbid)
                ->update([
                    'sessionName' =>  $request->sessionName,
                    'mediumName' =>  $request->mediumName,
                    'versionName' =>  $request->versionName,
                    'shiftName' =>  $request->shiftName,
                    'classNum' =>  $request->className,
                    'sectionName' =>  $request->sectionName,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Class Info is successfully updated.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Class Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function findSubjectList(Request $request){
        try{
            if (session()->has('classId')) {
                $rows =DB::table('subjects')
                    ->where('classId',Session::get('classId'))
                    ->get();
                return response()->json(array('data'=>$rows));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function updateNewCourse(Request $request){
        try{

            $result =DB::table('subjects')
                ->where('id', $request->dbid)
                ->update([
                    'name' =>  $request->name,
                    'code' =>  $request->code,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Course Info is successfully updated.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Course Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertDayTypeSetup(Request $request){

        try{
            $rows =  DB::table('class_week_half')
                ->select('id')
                ->where([
                    ['day', '=', $request->day],
                    ['dayType', '=', $request->dayType],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('class_week_half')->insert([
                    'day' =>  $request->day,
                    'dayType' =>  $request->dayType,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Day Info is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Day Info. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showDayList(Request $request){
        try{
            $rows =DB::table('class_week_half')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function updateDayTypeSetup(Request $request){
        try{
            $result =DB::table('class_week_half')
                ->where('id', $request->dbid)
                ->update([
                    'day' =>  $request->day,
                    'dayType' =>  $request->dayType,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Day Info is successfully updated.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Day Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertClassTime(Request $request){

        try{
            if (session()->has('classId')) {
                $startTime=date("H:i:s", strtotime($request->startTime));
                $endTime=date("H:i:s", strtotime($request->endTime));
                $rows =  DB::table('class_time')
                    ->select('id')
                    ->where([
                        ['classId', '=', Session::get('classId')],
                        ['day', '=', $request->day],
                        ['group', '=', $request->group],
                        ['subCode', '=', $request->subject],
                        ['startTime', '=',$startTime],
                        ['endTime', '=', $endTime],
                        ['serial', '=', $request->serial],
                        ['teacherId', '=', $request->teacherId],
                    ])
                    ->distinct()->get()->count();
                if ($rows>0) {
                    return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                }
                else{
                    $result = DB::table('class_time')->insert([
                        'classId' => Session::get('classId'),
                        'group' =>  $request->group,
                        'day' =>  $request->day,
                        'subCode' =>  $request->subject,
                        'startTime' =>  $startTime,
                        'endTime' =>   $endTime,
                        'serial' =>  $request->serial,
                        'teacherId' =>  $request->teacherId,
                    ]);
                    if ($result) {
                        return response()->json(array(
                            'successMsg' => 'New Class Time is successfully added.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to add new Class Time. Please try again.'));
                    }
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function searchSubjectList(Request $request){
        try{
            if (session()->has('classId')) {
                $rows =DB::table('subjects As a')
                    ->join('class_time as b','b.subCode','a.code')
                    ->where([
                        ['a.classId', '=', Session::get('classId')],
                    ])
                    ->get();
                return response()->json(array('data'=>$rows));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showSubListForPeriod(Request $request){
        try{
            if (session()->has('classId')) {
                $classId = json_decode($request->getContent(), true);
                $rows =DB::table('subjects')
                    ->where([
                        ['classId', '=', $classId['classId']],
                    ])
                    ->get();
                return response()->json(array('data'=>$rows));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editPeriodList(Request $request){
        try {

            $data = DB::transaction(function () use ($request) {
                $startTime=date("H:i:s", strtotime($request->startTime));
                $endTime=date("H:i:s", strtotime($request->endTime));
                $result = DB::table('class_time')
                    ->where('id', $request->dbid)
                    ->update([
                        'day' =>  $request->day,
                        'startTime' => $startTime,
                        'endTime' =>  $endTime,
                        'serial' =>  $request->serial,
                        'teacherId' =>  $request->teacherId,
                    ]);
                if ($result) {
                    $rows =DB::table('class_time as a')
                        ->join('subjects as b','a.subCode','b.code')
                        ->where([
                            ['a.classId', '=', $request->classId],
                        ])
                        ->get()->toArray();
                    $rows = array_merge($rows,array("successMsg"=>"Class Time is successfully updated."));
                    return response()->json(array('data'=>$rows));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to update Class time. Please try again.'));
                }
            }, 5);
            return $data;
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deletePeriodList(Request $request){
        try{
            $data = DB::transaction(function () use ($request) {

                $result =  DB::table('class_time')
                    ->where('id',$request->dbiddel)
                    ->delete();
                if ($result) {
                    $rows =DB::table('class_time as a')
                        ->join('subjects as b','a.subCode','b.code')
                        ->where([
                            ['a.classId', '=', $request->classId],
                        ])
                        ->get()->toArray();
                    $rows = array_merge($rows,array("successMsg"=>"Class Time is successfully Delated."));
                    return response()->json(array('data'=>$rows));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to Delete Class time. Please try again.'));
                }
            }, 5);
            return $data;

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertSubjectSettings(Request $request){

        try{
            if (session()->has('classId')) {
                $startTime=date("H:i:s", strtotime($request->startTime));
                $endTime=date("H:i:s", strtotime($request->endTime));
                $rows =  DB::table('class_tiffin_settings')
                    ->select('id')
                    ->where([
                        ['classId', '=', Session::get('classId')],
                        ['group', '=', $request->group],
                        ['startTime', '=',$startTime],
                        ['endTime', '=', $endTime],
                        ['totalperiod', '=', $request->totalperiod],
                        ['afterTiffin', '=', $request->afterTiffin],
                        ['afterTiffinHalfDay', '=', $request->afterTiffinHalfDay],
                    ])
                    ->distinct()->get()->count();
                if ($rows>0) {
                    return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                }
                else{
                    $result = DB::table('class_tiffin_settings')->insert([
                        'classId' => Session::get('classId'),
                        'group' =>  $request->group,
                        'startTime' =>  $startTime,
                        'endTime' =>   $endTime,
                        'totalperiod' =>  $request->totalperiod,
                        'afterTiffin' =>  $request->afterTiffin,
                        'beforeTiffin' =>  $request->totalperiod-$request->afterTiffin,
                        'afterTiffinHalfDay' =>  $request->afterTiffinHalfDay,
                    ]);
                    if ($result) {
                        return response()->json(array(
                            'successMsg' => 'New Tiffin Time is successfully added.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to add new Tiffin Time. Please try again.'));
                    }
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function tiffinInfoList(Request $request){
        try{

            $classId = json_decode($request->getContent(), true);
            $rows =DB::table('class_tiffin_settings')
                ->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editTiffinList(Request $request){
        try {

            $startTime=date("H:i:s", strtotime($request->startTime));
            $endTime=date("H:i:s", strtotime($request->endTime));
            $result = DB::table('class_tiffin_settings')
                ->where('id', $request->dbid)
                ->update([
                    'startTime' => $startTime,
                    'endTime' =>  $endTime,
                    'totalperiod' =>  $request->totalperiod,
                    'afterTiffin' =>  $request->afterTiffin,
                    'beforeTiffin' =>  $request->totalperiod-$request->afterTiffin,
                    'afterTiffinHalfDay' =>  $request->afterTiffinHalfDay,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Day Info is successfully updated.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to update Class time. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function searchRoutine(Request $request){
        try{
            if (session()->has('classId')) {
                $rows =DB::table('class_time AS a')
                    ->select('a.day','c.totalperiod','c.beforeTiffin','c.afterTiffin','c.startTime as tiffinStart','c.endTime as tiffinEnd',DB::raw('group_concat(serial) as period'),DB::raw('group_concat(b.name) as subname'),DB::raw('group_concat(a.startTime) as startTime'),DB::raw('group_concat(a.endTime) as endTime'),DB::raw('group_concat(a.teacherId) as teacherId'))
                    ->join('subjects As b','a.subcode','b.code')
                    ->join('class_tiffin_settings As c','c.classId','a.classId')
                    ->where(function ($query) use($request) {
                        if(Session::get('classId')  != '' )
                            $query->where('a.classId', '=', Session::get('classId'));
                        if($request->group  != '' )
                            $query->where('a.group', '=', $request->group);
                    })
                    ->groupBy('a.day')
                    ->get();
                return response()->json(array('data'=>$rows));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
}