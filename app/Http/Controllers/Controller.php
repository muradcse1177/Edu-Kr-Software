<?php

namespace App\Http\Controllers;

use App\Sessions;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
/*
    public function savedata(Request $request){
        $result = Crud::create($request->all());
        if($result){
            //return 'Called successfully with '.$request->name;
            return response()->json(array('message'=>'Record successfully added'));
        }
        else{
            return response()->json(array('message'=>'Record failed to be added'));
        }
    }

    public function getList(){
        $rows =  Crud::all();
        return response()->json(array('data'=>$rows));
    }
*/

}
