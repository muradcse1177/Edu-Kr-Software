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

class libraryController extends Controller
{
    public function bookInsert(Request $request){
        try{
            $rows =  DB::table('lib_book_list')->select('barCode')->where([
                ['barCode', '=', $request->barCode],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                date_default_timezone_set('Asia/Dhaka');
                $date = date("Y-m-d");
                $result = DB::table('lib_book_list')->insert([
                    'barCode' =>  $request->barCode,
                    'isbn' =>  $request->isbn,
                    'name' =>  $request->name,
                    'AutorName' =>  $request->AutorName,
                    'edition' =>  $request->edition,
                    'publisher' =>  $request->publisher,
                    'bookColor' =>  $request->bookColor,
                    'price' =>  $request->price,
                    'subjectName' =>  $request->subjectName,
                    'selfLocation' =>  $request->selfLocation,
                    'availability' =>  1,
                    'date' =>  $date,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New book  is successfully added.',
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

    public function searchBookInfo(Request $request){
        try{
            $rows =DB::table('lib_book_list')->where([['barCode', '=', $request->barCode]])->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function searchStudentInfo(Request $request){
        try{
            $rows = DB::table('students AS a')
                ->select('a.studentId','a.name','c.classNum','c.versionName','c.sectionName')
                ->join('class_allhistory AS b','a.studentId','=','b.studentId')
                ->join('class_allclasses AS c','b.classId','=','c.classId')
                ->where([
                    ['a.studentId', '=', $request->studentId],
                ])->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function bookAssign(Request $request){
        try{
            $rows =  DB::table('lib_book_allocation')->select('barCode','studentId')->where([
                ['barCode', '=', $request->barCodeFinal],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same Book can not assign more time.Try another.'));
            }
            else{
                date_default_timezone_set('Asia/Dhaka');
                $date = date("Y-m-d");
                $result = DB::transaction(function () use ($request,$date) {
                    DB::table('lib_book_allocation')->insert([
                        'studentId' =>  $request->studentIdFinal,
                        'barCode' =>  $request->barCodeFinal,
                        'status' =>  'borrowed',
                        'issuDate' =>  $date,
                        'returnDate' =>  'waiting',
                    ]);
                    $rows = DB::table('lib_book_list')
                        ->where('barCode', $request->barCodeFinal)
                        ->update([
                            'availability' => 0,
                        ]);
                    return $rows;
                }, 5);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Book assign successfully completed.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to assign book. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function returnBook(Request $request){
        try{
            $rows =  DB::table('lib_book_allocation')->select('barCode','studentId')->where([
                ['barCode', '=', $request->barCodeFinal],
                ['status', '=', 'returned'],
            ])->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('ererrorMsg' => 'Same Book can not returned more time.Try another.'));
            }
            else{
                date_default_timezone_set('Asia/Dhaka');
                $date = date("Y-m-d");
                $result = DB::transaction(function () use ($request,$date) {
                    DB::table('lib_book_list')
                        ->where('barCode', $request->barCodeFinal)
                        ->update([
                            'availability' => 1,
                        ]);
                    $rows = DB::table('lib_book_allocation')
                        ->where('barCode', $request->barCodeFinal)
                        ->update([
                            'status' => 'returned',
                            'issuDate' =>  'clear',
                            'returnDate' =>  $date,
                        ]);
                    return $rows;
                }, 5);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Book assign successfully completed.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to assign book. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function libBooksTransaction(Request $request){
        try{

            $rows =DB::table('lib_book_list AS a')
                ->join('lib_book_allocation AS b','a.barCode','=','b.barCode')
                ->where(function ($query) use($request) {
                    if($request->forAll  != '' ){
                        $query->where([
                            ['issuDate', '>=', $request->startdate],
                            ['issuDate', '<=', $request->enddate]
                        ]);
                    }
                    else if($request->universeid  != '' )
                        $query->where('studentId', '=', $request->universeid);

                })->get();

            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function searchBookList(Request $request){
        try{
            //print_r($request->enddate);
            $rows =DB::table('lib_book_list')
                ->where(function ($query) use($request) {
                    if($request->barCode  != '' )
                        $query->where('barCode', '=', $request->barCode);
                    if($request->name  != '' )
                        $query->where('name', '=', $request->name);
                    if($request->AutorName  != '' )
                        $query->where('AutorName', '=', $request->AutorName);
                    if($request->subjectName  != '' )
                        $query->where('subjectName', '=', $request->subjectName);
                    if($request->selfLocation  != '' )
                        $query->where('selfLocation', '=', $request->selfLocation);
                    if($request->startdate  != '' )
                        $query->where('date', '>=', $request->startdate);
                    if($request->enddate  != '' )
                        $query->where('date', '<=', $request->enddate);
                })->get();

            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function bookUpdate(Request $request){
        try{

            $result =DB::table('lib_book_list')
                ->where('id', $request->dbid)
                ->update([
                    'barCode' =>  $request->barCode,
                    'isbn' =>  $request->isbn,
                    'name' =>  $request->name,
                    'AutorName' =>  $request->AutorName,
                    'edition' =>  $request->edition,
                    'publisher' =>  $request->publisher,
                    'bookColor' =>  $request->bookColor,
                    'price' =>  $request->price,
                    'subjectName' =>  $request->subjectName,
                    'selfLocation' =>  $request->selfLocation,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Books Info is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Books Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteBooks(Request $request){
        try{
            $id= $request->dbiddel;

            $result =  DB::table('lib_book_list')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Books Info file is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Books Info. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertLibFineSetup(Request $request){
        try{
            $rows = DB::table('lib_fine_info')->groupBy('id')->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Information already exists.If needed please update your information.'));
            }
            else{
                $result = DB::table('lib_fine_info')->insert([
                    'amount' =>  $request->amount,
                    'fineStart' =>  $request->fineStart,
                    'highestAllocation' =>  $request->highestAllocation,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Info is successfully created.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to create Info. Please try again.'));
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function showFineInfoList(Request $request){
        try{

            $rows = DB::table('lib_fine_info')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editFineInfoSet(Request $request){
        try{

            $result =DB::table('lib_fine_info')
                ->where('id', $request->dbid)
                ->update([
                    'amount' =>  $request->amount,
                    'fineStart' =>  $request->fineStart,
                    'highestAllocation' =>  $request->highestAllocation,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Fine Info is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Fine Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteFeesInfoSet(Request $request){
        try{
            $id= $request->dniddel;

            $result =  DB::table('lib_fine_info')
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
    public function libFineTransaction(Request $request){
        try{
            $rows =DB::table('lib_book_allocation AS a')
                ->join('lib_book_list AS b','b.barCode','=','a.barCode')
                ->where(function ($query) use($request) {
                    if($request->forAll  != '' ){
                        $query->where([
                            ['a.issuDate', '>=', $request->startdate],
                            ['a.issuDate', '<=', $request->enddate]
                        ]);
                    }
                    if($request->universeid  != '' ) {
                        $query->where([
                            ['a.studentId', '=', $request->universeid],
                            ['a.status', '=', 'borrowed'],
                        ]);
                    }

                })
                ->get();
            $rows1 =DB::table('lib_fine_info')->get();

            return response()->json(array('data'=>$rows,'data1'=>$rows1));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
}
