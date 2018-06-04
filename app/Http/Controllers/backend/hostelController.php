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
use PDF;
use Validator;
use Illuminate\Support\Facades\Input;

class hostelController extends Controller
{
    public function insertNewHostel(Request $request){
        try{
            $rows =  DB::table('hostel_info')->select('id')->where([
                ['name', '=', $request->name],
                ['room', '=', $request->room],
                ['floor', '=', $request->floor],
                ['address', '=', $request->address],
                ['roomPerStudent', '=', $request->studentPerRoom],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('hostel_info')->insert([
                    'name' =>  $request->name,
                    'address' =>  $request->address,
                    'room' =>  $request->room,
                    'floor' =>  $request->floor,
                    'roomPerStudent' =>  $request->studentPerRoom,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Hostel Name is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Hostel Name. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showHostelList(Request $request){
        try{
            $rows =  DB::table('hostel_info')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editHostelList(Request $request){
        try{

            $result =DB::table('hostel_info')
                ->where('id', $request->dbid)
                ->update([
                    'name' =>  $request->name,
                    'address' =>  $request->address,
                    'floor' =>  $request->floor,
                    'room' =>  $request->room,
                    'roomPerStudent' =>  $request->studentPerRoom,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Hostel is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Hostel is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteHostelList(Request $request){
        try{
            $result =  DB::table('hostel_info')
                ->where('id',$request->dbiddel)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Hostel Info file is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Hostel Info. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getHostelName(Request $request){
        try{
            $rows =  DB::table('hostel_info')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function getHostelFloor(Request $request){
        try{
            $name =json_decode($request->getContent(), true);

            $rows =DB::table('hostel_info')->where('name',$name)->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertRoomAllocation(Request $request){
        try{
            $rows =  DB::table('hostel_allocation')->select('id')->where([
                ['studentId', '=', $request->studentId],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same Student can not stay one more hostel.Try another.'));
            }
            else{
                $result = DB::table('hostel_allocation')->insert([
                    'studentId' =>  $request->studentId,
                    'hostelName' =>  $request->hostelname,
                    'roomNo' =>  $request->roomNo,
                    'floor' =>  $request->floor,
                    'status' =>  'ON',
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Hostel Allocation is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to Hostel Allocation . Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function searchHostelStudentInfo(Request $request){
        try{
            $rows =DB::table('hostel_allocation as a')
                ->join('class_allhistory as b','a.studentId','b.studentId')
                ->where('a.studentId',$request->studentId)
                ->where('a.status','ON')
                ->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function terminateHostelStudent(Request $request){
        try{

            $result =DB::table('hostel_allocation')
                ->where('studentId', $request->studentId)
                ->update([
                    'status' =>'OFF',
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Hostel Life is successfully Terminated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Hostel Life is not Terminated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getHostelFloorList(Request $request){
        try{
            $name =json_decode($request->getContent(), true);

            $rows =DB::table('hostel_allocation')->select('floor')->where('hostelName',$name)->distinct()->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getHostelRoom(Request $request){
        try{
            $name =json_decode($request->getContent(), true);

            $rows =DB::table('hostel_allocation')->select('roomNo')->where('hostelName',$name)->distinct()->get();
            return response()->json(array('data'=>$rows));

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showHostelStudentList(Request $request){
        try{
            if($request->forAll =='forAll'){
                $rows =DB::table('hostel_allocation as a')
                    ->select('a.id','a.studentId','c.sessionName','d.name','c.mediumName','c.versionName','c.shiftName','c.classNum','b.rollNo','a.hostelName','a.roomNo','a.floor')
                    ->join('class_allhistory as b','a.studentId','b.studentId')
                    ->join('class_allclasses as c','b.classId','c.classId')
                    ->join('students as d','a.studentId','d.studentId')
                    ->where('a.status','ON')
                    ->get();
                return response()->json(array('data'=>$rows));
            }
            else{
                $rows =DB::table('hostel_allocation as a')
                    ->select('a.id','a.studentId','c.sessionName','d.name','c.mediumName','c.versionName','c.shiftName','c.classNum','b.rollNo','a.hostelName','a.roomNo','a.floor')
                    ->join('class_allhistory as b','a.studentId','b.studentId')
                    ->join('class_allclasses as c','b.classId','c.classId')
                    ->join('students as d','a.studentId','d.studentId')
                    ->where('a.status','ON')
                    ->where(function ($query) use($request) {
                        if($request->hostelName  != '' )
                            $query->where('a.hostelName', '=', $request->hostelName);
                        if($request->acaSession  != '' )
                            $query->where('a.floor', '=', $request->floor);
                        if($request->medium  != '' )
                            $query->where('a.roomNo', '=', $request->room);
                    })
                    ->get();
                return response()->json(array('data'=>$rows));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editHosteStdInfo(Request $request){
        try{

            $result =DB::table('hostel_allocation')
                ->where('id', $request->dbid)
                ->update([
                    'hostelName' =>  $request->hostelName,
                    'floor' =>  $request->floor,
                    'roomNo' =>  $request->room,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Hostel is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Hostel is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertFeesHostel(Request $request){
        try{

            if (session()->has('classId')) {
                $classId = Session::get('classId');
                $feesdetails = json_decode($request->getContent(), true);

                $finalRow=DB::transaction(function () use ($request, $classId,$feesdetails) {

                    $rows =  DB::table('fees_time_hostel')->select('classId')->where([
                        ['classId', '=', $classId],
                        ['year', '=', $feesdetails['year']],
                        ['month', '=', $feesdetails['month']],
                        ['hostelName', '=', $feesdetails['hostelName']],
                    ])->distinct()->get()->count();
                    if ($rows>0) {
                        return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                    }
                    else {
                        DB::table('fees_time_hostel')->insert([
                            'classId' =>  $classId,
                            'year' =>  $feesdetails['year'],
                            'month' =>  $feesdetails['month'],
                            'hostelName' =>  $feesdetails['hostelName'],
                        ]);

                        $rows =  DB::table('fees_time_hostel')->select('feesTimeId')
                            -> orderBy('feesTimeId','desc')
                            ->limit(1)
                            ->get();
                        $arr=$rows->toArray();
                        $feesTimeId = $arr[0]->feesTimeId;

                        $fees = $feesdetails['fees'];
                        $data = array();
                        $count = count($fees);
                        foreach ($fees as $row){

                            if (--$count <= 0) {
                                break;
                            }
                            $data[] = array(
                                "feesTimeID" => $feesTimeId,
                                "feesId" => $row['name'],
                                "amount" => $row['value']
                            );
                        }

                        $result=DB::table('fees_history_hostel')->insert($data);

                        if ($result) {
                            $rows =  DB::table('hostel_allocation as a')
                                ->join('class_allhistory as b','a.studentId','b.studentId')
                                ->where('a.hostelName', $feesdetails['hostelName'])
                                ->where('a.status', 'ON')
                                ->where('b.classId',Session::get('classId'))
                                ->get();
                            $arr=json_decode($rows,true);
                            foreach ($arr as $row){

                                $data1[] = array(
                                    "studentId" => $row['studentId'],
                                    "session" => $row['sessionName'],
                                    "year" => $feesdetails['year'],
                                    "month" => $feesdetails['month'],
                                    "amount" => '',
                                    "status" => 'unpaid',
                                    'hostelName' =>  $feesdetails['hostelName'],
                                    "date" => date('Y-m-d'),
                                );
                            }
                            $result1=DB::table('fees_status_hostel')->insert($data1);
                            if($result1) {
                                return response()->json(array(
                                    'successMsg' => 'New Fees  is successfully added.',
                                ));
                            }

                        } else {
                            return response()->json(array('errorMsg' => 'Failed to create new Fees. Please try again.'));
                        }
                    }

                }, 5);

                return $finalRow;
            }
            else{
                return response()->json(array('errorMsg' => 'Session Timed Out. No Class Information found. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getYearHostel(Request $request){
        try{
            $rows = DB::transaction(function () use ($request) {

                $rows =  DB::table('fees_time_hostel')->select('year','feesTimeId')->where([['hostelName', '=', $request->hostelName]])->distinct()->get();
                return $rows;
            }, 5);
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getMonthHostel(Request $request){
        try{
            $rows = DB::transaction(function () use ($request) {

                $rows =  DB::table('fees_time_hostel')->select('month','feesTimeId')->where([['hostelName', '=', $request->hostelName],['year', '=', $request->year]])->distinct()->get();
                return $rows;
            }, 5);
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showFeesListHostel(Request $request){
        try{

            $rows = DB::transaction(function () use ($request) {

                $rows = DB::table('fees_name')->select('fees_history_hostel.id','fees_name.feesName','fees_history_hostel.feesTimeID','fees_history_hostel.feesId','fees_history_hostel.amount')
                    ->join('fees_history_hostel','fees_name.feesId','=','fees_history_hostel.feesId')
                    ->where([['feesTimeID', '=', $request->feesTimeId]])
                    ->get();
                return $rows;
            }, 5);

            return view('hostel/editfeesTable', ['feesdetails' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editfeesAmountHostel(Request $request){
        try{
            if($request->action=='edit'){
                $result =DB::table('fees_history_hostel')
                    ->where('feesTimeID', $request->feesTimeID)
                    ->where('feesId', $request->feesId)
                    ->update([
                        'amount' =>  $request->amount,
                    ]);
                if($result){
                    return response()->json(array(
                        'successMsg' => 'Fees Amount is successfully updated.',
                    ));
                }
                else{
                    return response()->json(array('errorMsg' => 'Failed to edit Fees Amount. Please try again.'));
                }
            }
            else if($request->action=='delete'){
                $result =  DB::table('fees_history_hostel')
                    ->where('id', $request->id)
                    ->delete();
                if($result){
                    return response()->json(array(
                        'successMsg' => 'Fees Amount is successfully Deleted.Please Reload Page.',
                    ));
                }
                else{
                    return response()->json(array('errorMsg' => 'Failed to delete Fees Amount. Please try again.'));
                }
            }
            else{
                return response()->json(array('errorMsg' => 'No Action Occurred. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function billGenaratorHostel(Request $request){
        try{
            $stdId= $request->stdId;
            $sessionName= $request->sessionName;
            $startMonth= $request->startMonth;
            $endMonth= $request->endMonth;
            $year= $request->year;
            $hostelName = $request->hostelName;

            $result = DB::transaction(function () use ($request, $stdId,$sessionName,$startMonth,$endMonth,$year,$hostelName) {

                $rows = DB::table('class_allhistory AS a')
                    ->select('d.feesName','c.amount','e.sessionName','e.mediumName','e.versionName','e.shiftName','e.classNum','e.sectionName','f.name','a.rollNo','a.regNo')
                    ->join('fees_time_hostel AS b','a.classId','=','b.classId')
                    ->join('fees_history_hostel AS c','b.feesTimeId','=','c.feesTimeId')
                    ->join('fees_name AS d','d.feesId','=','c.feesId')
                    ->join('class_allclasses AS e','e.classId','=','a.classId')
                    ->join('students AS f','f.studentId','=','a.studentId')
                    ->where([
                        ['a.studentId', '=', $stdId],
                        ['a.sessionName', '=', $sessionName],
                        ['b.month', '=', $startMonth],
                        ['b.year', '=', $year],
                    ])
                    ->where('b.hostelName',$hostelName)->get();
                return $rows;

            }, 5);

            return response()->json(array('data'=>$result));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function billPaymentHostel(Request $request){
        try{
            $rows =  DB::table('fees_status_hostel')->select('studentId')->where([
                ['studentId', '=', $request->stdId],
                ['session', '=', $request->sessionName],
                ['year', '=', $request->year],
                ['month', '=', $request->startMonth],
                ['hostelName', '=', $request->hostelName],
                ['status', '=','paid'],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'A student can pay bill for one time a month.Try another.'));
            }
            else{
                $result =DB::table('fees_status_hostel')
                    ->where([
                        ['studentId', '=', $request->stdId],
                        ['session', '=', $request->sessionName],
                        ['year', '=', $request->year],
                        ['month', '=', $request->startMonth],
                        ['hostelName', '=', $request->hostelName],
                    ])
                    ->update([
                        'amount' =>  $request->amount,
                        'date' => date('Y-m-d'),
                        'status' => 'paid',
                    ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Congratulation.Bill is paid successfully.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to paid bill. Please try again.'));
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function searchTransactionHostel(Request $request){
        try{
            if( $request->search=='search') {
                $rows = DB::table('fees_status_hostel as a')
                    ->join('students as b','a.studentId','b.studentId')
                    ->join('class_allhistory as c','c.studentId','a.studentId')
                    ->join('class_allclasses as d','d.classId','c.classId')
                    ->where([
                        ['a.year', '=', $request->year],
                        ['a.status', '=', $request->status],
                        ['a.month', '>=', $request->startMonth],
                        ['a.month', '<=', $request->endMonth],
                        ['a.hostelName', '=', $request->hostelName],
                    ])
                    ->where(function ($query) use($request) {
                        if($request->stdId  != '' )
                            $query->where('a.studentId', '=', $request->stdId);
                    })->get();
                return view('hostel/transactionDetailsHostel', ['data' =>$rows]);
            }
            if( $request->pdf=='pdf') {

                $rows = DB::table('fees_status_hostel as a')
                    ->join('students as b','a.studentId','b.studentId')
                    ->join('class_allhistory as c','c.studentId','a.studentId')
                    ->join('class_allclasses as d','d.classId','c.classId')
                    ->where([
                        ['a.year', '=', $request->year],
                        ['a.status', '=', $request->status],
                        ['a.month', '>=', $request->startMonth],
                        ['a.month', '<=', $request->endMonth],
                        ['a.hostelName', '=', $request->hostelName],
                    ])
                    ->where(function ($query) use($request) {
                        if($request->stdId  != '' )
                            $query->where('a.studentId', '=', $request->stdId);
                    })->get();
                view()->share('data', $rows);
                $customPaper = array(0,0,800,800);
                $pdf = PDF::setPaper($customPaper)->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('fees/transactionPdf');
                return $pdf->download('Transaction Details.pdf');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
}