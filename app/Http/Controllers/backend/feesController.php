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
use PDF;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class feesController extends Controller
{
    public function insertFeesName(Request $request){
        try{
            $rows =  DB::table('fees_name')->select('feesName')->where([
                ['feesName', '=', $request->feesName],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('fees_name')->insert([
                    'feesName' =>  $request->feesName,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Fees Name is successfully created.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to create new Fees Name. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertFees(Request $request){
        try{

            if (session()->has('classId')) {
                $classId = Session::get('classId');
                $feesdetails = json_decode($request->getContent(), true);

                $finalRow=DB::transaction(function () use ($request, $classId,$feesdetails) {

                    $rows =  DB::table('fees_time')->select('classId')->where([
                        ['classId', '=', $classId],
                        ['year', '=', $feesdetails['year']],
                        ['month', '=', $feesdetails['month']]
                    ])->distinct()->get()->count();
                    if ($rows>0) {
                        return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
                    }
                    else {
                        DB::table('fees_time')->insert([
                            'classId' =>  $classId,
                            'year' =>  $feesdetails['year'],
                            'month' =>  $feesdetails['month'],
                        ]);

                        $rows =  DB::table('fees_time')->select('feesTimeId')
                            -> orderBy('feesTimeId','desc')
                            ->limit(1)
                            ->get();
                        $arr=$rows->toArray();
                        $feesTimeId = $arr[0]->feesTimeId;
                        //echo $feesTimeId;

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

                        $result=DB::table('fees_history')->insert($data);

                        if ($result) {
                            $rows =  DB::table('class_allhistory')
                                ->where('classId',Session::get('classId'))
                                ->get();
                            $arr=json_decode($rows,true);
                            foreach ($arr as $row){

                                $data[] = array(
                                    "studentId" => $row['studentId'],
                                    "session" => $row['sessionName'],
                                    "year" => $feesdetails['year'],
                                    "month" => $feesdetails['month'],
                                    "amount" => '',
                                    "status" => 'unpaid',
                                    "date" => date('Y-m-d'),
                                );
                            }
                            $result1=DB::table('fees_status')->insert($data);
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
    public function editFeesStructure(Request $request){
        try{

            $feesdetails = json_decode($request->getContent(), true);
            $feesTimeId = $feesdetails['feesTimeId'];
            $fees = $feesdetails['fees'];
            $data = array();
            foreach ($fees as $row){

                $data[] = array(
                    "feesTimeID" => $feesTimeId,
                    "feesId" => $row['name'],
                    "amount" => $row['value']
                );
            }
            print_r($data);
            for($i=0; $i<count($data); $i++){

                $result =DB::table('fees_history')
                    ->where('feesTimeID', $feesTimeId)
                    ->update([
                        'feesId' =>  $data[$i]['feesId'],
                        'amount' =>  $data[$i]['amount']
                    ]);
            }

            if ($result) {
                //print_r($data);
                return response()->json(array(
                    'successMsg' => 'Fees  is successfully edited.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to edit Fees. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function showFessName(Request $request){
        try{
            $rows =  DB::table('fees_name')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function getMonth(Request $request){
        try{
            $classInfo=json_decode($request->getContent(), true);

            $rows = DB::transaction(function () use ($request, $classInfo) {
                $year = $classInfo['year'];
                $classId = $classInfo['classId'];
                $classId =  DB::table('class_allclasses')->select('classId')->where([['classNum', '=', $classId]])->get();
                $arr=$classId->toArray();
                $classId = $arr[0]->classId;
                $rows =  DB::table('fees_time')->select('month','feesTimeId')->where([['classId', '=', $classId],['year', '=', $year]])->get();
                return $rows;
            }, 5);
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getClassName(Request $request){
        try{

            $rows = DB::table('class_allclasses')->select('class_allclasses.classNum')
                ->join('fees_time','fees_time.classId','=','class_allclasses.classId')
                ->distinct()
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getYear(Request $request){
        try{
            $classId=json_decode($request->getContent(), true);

            $rows = DB::transaction(function () use ($request, $classId) {

                $classId =  DB::table('class_allclasses')->select('classId')->where([['classNum', '=', $classId]])->get();
                $arr=$classId->toArray();
                $classId = $arr[0]->classId;

                $rows =  DB::table('fees_time')->select('year','feesTimeId')->where([['classId', '=', $classId]])->distinct()->get();
                return $rows;
            }, 5);
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showFeesList(Request $request){
        try{

            $rows = DB::transaction(function () use ($request) {

                $rows = DB::table('fees_name')->select('fees_history.id','fees_name.feesName','fees_history.feesTimeID','fees_history.feesId','fees_history.amount')
                    ->join('fees_history','fees_name.feesId','=','fees_history.feesId')
                    ->where([['feesTimeID', '=', $request->feesTimeId]])
                    ->get();
                return $rows;
            }, 5);
//            return response()->json(array(
//                'rows' => $rows,
//            ));
            return view('fees/editfeesTable', ['feesdetails' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editfeesAmount(Request $request){
        try{
            if($request->action=='edit'){
                $result =DB::table('fees_history')
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
                $result =  DB::table('fees_history')
                    ->where('id', $request->id)
                    ->delete();
                if($result){
                    return response()->json(array(
                        'successMsg' => 'Fees Amount is successfully Deleted.',
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
    public function deleteFees(Request $request){
        try{
            $feesTimeId= $request->feesTimeIdDel;
            $result = DB::transaction(function () use ($request, $feesTimeId) {
                DB::table('fees_time')
                    ->where('feesTimeId',$feesTimeId)
                    ->delete();
                $rows =  DB::table('fees_history')
                    ->where('feesTimeId',$feesTimeId)
                    ->delete();
                return $rows;
            }, 5);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Fees is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Fees. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertFineSetup(Request $request){
        try{
            $rows =  DB::table('fees_for_fine')->select('fineName')->where([
                ['fineName', '=', $request->fineName],
                ['fineType', '=', $request->fineType],
                ['amount', '=', $request->amount],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('fees_for_fine')->insert([
                    'fineName' =>  $request->fineName,
                    'fineType' =>  $request->fineType,
                    'amount' =>  $request->amount,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Fine is successfully created.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to create Fine. Please try again.'));
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showFineList(Request $request){
        try{
            $rows =  DB::table('fees_for_fine')->orderBy('id', 'asc')->limit(10)->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editFineSet(Request $request){
        try{

            $result =DB::table('fees_for_fine')
                ->where('id', $request->dbid)
                ->update([
                    'fineName' =>  $request->fineName1,
                    'fineType' =>  $request->fineType1,
                    'amount' =>  $request->amount1,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Fine is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Fine is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteFeesSet(Request $request){
        try{
            $id= $request->feesTimeIdDel;

            $result =  DB::table('fees_for_fine')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Fees Info file is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Fees Info. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function billGenarator(Request $request){
        try{
            $stdId= $request->stdId;
            $sessionName= $request->sessionName;
            $startMonth= $request->startMonth;
            $endMonth= $request->endMonth;
            $year= $request->year;

            $result = DB::transaction(function () use ($request, $stdId,$sessionName,$startMonth,$endMonth,$year) {

                    $rows = DB::table('class_allhistory AS a')
                        ->select('d.feesName','c.amount','e.sessionName','e.mediumName','e.versionName','e.shiftName','e.classNum','e.sectionName','f.name','a.rollNo','a.regNo')
                        ->join('fees_time AS b','a.classId','=','b.classId')
                        ->join('fees_history AS c','b.feesTimeId','=','c.feesTimeId')
                        ->join('fees_name AS d','d.feesId','=','c.feesId')
                        ->join('class_allclasses AS e','e.classId','=','a.classId')
                        ->join('students AS f','f.studentId','=','a.studentId')
                        ->where([
                            ['a.studentId', '=', $stdId],
                            ['a.sessionName', '=', $sessionName],
                            ['b.month', '=', $startMonth],
                            ['b.year', '=', $year],
                        ])->get();
                return $rows;

            }, 5);

            return response()->json(array('data'=>$result));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function billPayment(Request $request){
        try{
            $rows =  DB::table('fees_status')->select('studentId')->where([
                ['studentId', '=', $request->stdId],
                ['session', '=', $request->sessionName],
                ['year', '=', $request->year],
                ['month', '=', $request->startMonth],
                ['status', '=','paid'],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'A student can pay bill for one time a month.Try another.'));
            }
            else{
                $result =DB::table('fees_status')
                    ->where([
                        ['studentId', '=', $request->stdId],
                        ['session', '=', $request->sessionName],
                        ['year', '=', $request->year],
                        ['month', '=', $request->startMonth],
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
    public function getFeesSession(Request $request){
        try{
            $rows =  DB::table('academic_sessions')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function getFeesYear(Request $request){
        try{
            $rows =  DB::table('fees_time')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function searchTransaction(Request $request){
        try{
            if( $request->search=='search') {
                $rows = DB::table('fees_status as a')
                    ->join('students as b','a.studentId','b.studentId')
                    ->join('class_allhistory as c','c.studentId','a.studentId')
                    ->join('class_allclasses as d','d.classId','c.classId')
                    ->where([
                        ['a.year', '=', $request->year],
                        ['a.status', '=', $request->status],
                        ['a.month', '>=', $request->startMonth],
                        ['a.month', '<=', $request->endMonth],
                    ])
                    ->where(function ($query) use($request) {
                        if($request->stdId  != '' )
                            $query->where('a.studentId', '=', $request->stdId);
                    })->get();
                return view('fees/feesTransactionDetails', ['data' =>$rows]);
            }
            if( $request->pdf=='pdf') {

                $rows = DB::table('fees_status as a')
                    ->join('students as b','a.studentId','b.studentId')
                    ->join('class_allhistory as c','c.studentId','a.studentId')
                    ->join('class_allclasses as d','d.classId','c.classId')
                    ->where([
                        ['a.year', '=', $request->year],
                        ['a.status', '=', $request->status],
                        ['a.month', '>=', $request->startMonth],
                        ['a.month', '<=', $request->endMonth],
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