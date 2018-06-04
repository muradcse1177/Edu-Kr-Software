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
use Response;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class noticeController extends Controller
{
    public function insertNewNotice(Request $request){
        try{
                $path = "";
                if ($request->hasFile('file')) {
                    $targetFolder = 'files/uploads/images/profile/';
                    $file = $request->file('file');
                    print_r($file);
                    $name = time() . '.' . $file->getClientOriginalName();
                    $image['filePath'] = $name;
                    $file->move($targetFolder, $name);
                    $path = '/' . $targetFolder . $name;
                }
                $result = DB::table('noticeboard')->insert([
                    'noticeFor'=> $request->radio,
                    'noticeTitle'=> $request->title,
                    'type'=> $request->noticeType,
                    'notice'=> $request->notice,
                    'file'=> $path,
                    'publishdate'=> $request->publishdate,
                    'enddate'=> $request->enddate,

                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Notice is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Notice. Please try again.'));
                }
            }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editNewNotice(Request $request){
        try {
            $path = "";
            if ($request->hasFile('file')) {
                $targetFolder = 'files/uploads/images/profile/';
                $file = $request->file('file');
                $name = time() . '.' . $file->getClientOriginalName();
                $image['filePath'] = $name;
                $file->move($targetFolder, $name);
                $path = '/' . $targetFolder . $name;
            }
            $result = DB::table('noticeboard')
                ->where('id', $request->dbid)
                ->update([
                    'noticeFor'=> $request->radio,
                    'noticeTitle'=> $request->title,
                    'notice'=> $request->notice,
                    'file'=> $path,
                    'publishdate'=> $request->publishdate,
                    'enddate'=> $request->enddate,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Notice is successfully updated.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to update Notice. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showAllNotice(Request $request) {

        $rows =  DB::table('noticeboard')
            ->where([
                ['publishdate', '>=', $request->publishdate],
                ['enddate', '<=', $request->enddate],
            ])
            ->get();
        return response()->json(array('data'=>$rows));

    }
    public function deleteNoticeList(Request $request){
        try{

            $result =  DB::table('noticeboard')
                ->where('id',$request->dbiddel)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Notice Info is successfully Deleted.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Delete Notice. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editNotice1stStep(Request $request){
        try{
            $rows =  DB::table('noticeboard')
                ->where([
                    ['id', '=', $request->id],
                ])
                ->get();
            $rows =json_decode($rows,true);
            return view('noticeboard/editNotice', ['data' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function noticeDownload(Request $request)
    {
        $file= substr($request->file,1);
        $path_info = pathinfo($file);
        $ext= $path_info['extension'];
        return Response::download($file, 'Notice File.'.$ext);
    }
}