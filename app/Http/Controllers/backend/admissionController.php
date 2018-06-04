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
use PDF;
use View;
use Illuminate\Support\Facades\Input;

class admissionController extends Controller
{
    public function insertNewAdCircular(Request $request){
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
            $result = DB::table('admission_circular')->insert([
                'sessionName'=> $request->sessionName,
                'file'=> $path,
                'title'=> $request->title,
                'notice'=> $request->notice,
                'publishdate'=> $request->publishdate,
                'enddate'=> $request->enddate,

            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'New Circular is successfully added.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to add new Circular. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showAllCircular(Request $request) {

        $rows =  DB::table('admission_circular')
            ->where([
                ['publishdate', '>=', $request->publishdate],
                ['enddate', '<=', $request->enddate],
            ])
            ->get();
        return response()->json(array('data'=>$rows));

    }
    public function editNewCircular(Request $request){
        try {
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
            $result = DB::table('admission_circular')
                ->where('id', $request->dbid)
                ->update([
                    'sessionName'=> $request->sessionName,
                    'file'=> $path,
                    'title'=> $request->title,
                    'notice'=> $request->notice,
                    'publishdate'=> $request->publishdate,
                    'enddate'=> $request->enddate,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Circular is successfully updated.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to update Circular. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteCircularList(Request $request){
        try{

            $result =  DB::table('admission_circular')
                ->where('id',$request->dbiddel)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Circular Info is successfully Deleted.'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Circular Notice. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function saveAdmissionAppInfo(Request $request){
        try {

            $data = DB::transaction(function () use ($request) {
                $path = "";
                if ($request->hasFile('stdPhoto')) {
                    $targetFolder = 'files/uploads/images/profile/';
                    $file = $request->file('stdPhoto');
                    $name = time() . '.' . $file->getClientOriginalName();
                    $image['filePath'] = $name;
                    $file->move($targetFolder, $name);
                    $path = '/' . $targetFolder . $name;
                }
                $result = DB::table('admission_applicants')->insert([
                    'acaSession' => date("Y"),
                    'medium' => $request->medium,
                    'version' => $request->version,
                    'shift' => $request->shift,
                    'class' => $request->class,
                    'group' => $request->group,
                    'name' => $request->name,
                    'birthdate' => $request->birthdate,
                    'gender' => $request->gender,
                    'religion' => $request->religion,
                    'nationality' => $request->nationality,
                    'bloodgroup' => $request->bloodgroup,
                    'mobile' => $request->mobile,
                    'stdPhoto' => $path,
                    'presentAdd' => $request->presentAdd,
                    'parmanentAdd' => $request->parmanentAdd,
                    'gurName' => $request->Name,
                    'gurMobile' => $request->Mobile,
                    'Email' => $request->Email,
                    'Occupation' => $request->Occupation,
                    'YearlyIncome' => $request->YearlyIncome,
                    'gurdianAddress' => $request->gurdianAddress,
                    'exam' => $request->exam,
                    'board' => $request->board,
                    'rollNo' => $request->rollNo,
                    'regNo' => $request->regNo,
                    'instituteName' => $request->instituteName,
                    'instituteAddress' => $request->instituteAddress,
                    'resultGrade' => $request->resultGrade,
                    'resultGPA' => $request->resultGPA,
                    'resultPosition' => $request->resultPosition,
                    'resultSummary' => $request->resultSummary,
                ]);
                if ($result) {
                    $rows =DB::table('admission_applicants')
                        ->select('registrationNo')
                        ->orderBY('registrationNo','desc')
                        ->limit(1)
                        ->get()->toArray();
                    $registrationNo = json_decode(json_encode($rows), True);
                    session(['registrationNo' => array($registrationNo)]);
                    $rows = array_merge($rows,array("successMsg"=>"New Student profile is successfully Added."));
                    return response()->json(array('data'=>$rows));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to create new profile. Please try again.'));
                }
            }, 5);
            return $data;

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }
    }
    public function makePdfApplicantProfile(Request $req)
    {
        if (session()->has('registrationNo')) {
            $applicantInfo = DB::table("admission_applicants")->where('registrationNo',Session::get('registrationNo'))->get();
            $applicantInfo = json_decode(json_encode($applicantInfo), True);
            view()->share('applicantInfo', $applicantInfo);
            if ($req->has('download')) {
                $pdf = PDF::setPaper('a4')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admission/pdfPage');

                return $pdf->download('Admission.pdf');
            }
        }

    }
    public function applicantLogin(Request $request) {

        $rows =  DB::table('admission_applicants')
            ->where([
                ['registrationNo', '=', $request->regNo],
                ['mobile', '=', $request->mobile],
            ])
            ->distinct()->get()->count();

        if ($rows>0) {
            $rows =DB::table('admission_applicants')
                ->select('registrationNo')
                ->where([
                    ['registrationNo', '=', $request->regNo],
                    ['mobile', '=', $request->mobile],
                ])
                ->get()->toArray();
            $registrationNo = json_decode(json_encode($rows), True);
            session(['registrationNo' => array($registrationNo)]);
            $data=array('successMessege'=>"Welcome to user Panel.");
            view()->share('data',$data);
            return view('admission/userPanel');
        }
        else{
            $data=array('errorMessege'=>"Authentication is not correct.!!!");
            view()->share('data',$data);
            return view('admission/userLogin');
        }
    }
    public function pdfApplicantProfile(Request $req)
    {
        if (session()->has('registrationNo')) {
            $applicantInfo = DB::table("admission_applicants")->where('registrationNo',Session::get('registrationNo'))->get();
            $applicantInfo = json_decode(json_encode($applicantInfo), True);
            view()->share('applicantInfo', $applicantInfo);
            if ($req->has('download')) {
                $pdf = PDF::setPaper('a4')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admission/pdfPage');

                return $pdf->download('profile.pdf');
            }
        }

    }
    public function pdfAdmitCard(Request $req)
    {
        if (session()->has('registrationNo')) {
            $applicantInfo = DB::table("admission_applicants")->where('registrationNo',Session::get('registrationNo'))->get();
            $applicantInfo = json_decode(json_encode($applicantInfo), True);
            view()->share('applicantInfo', $applicantInfo);
            if ($req->has('download')) {
                $pdf = PDF::setPaper('a4')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admission/pdfPage');

                return $pdf->download('profile.pdf');
            }
        }

    }
    public function searchApplicant(Request $request) {

        $rows =  DB::table('admission_applicants')
            ->where(function ($query) use($request) {
                if($request->regNo  != '' )
                    $query->where('registrationNo', '=', $request->regNo);
                if($request->acaSession  != '' )
                    $query->where('acaSession', '=', $request->acaSession);
                if($request->medium  != '' )
                    $query->where('medium', '=', $request->medium);
                if($request->version  != '' )
                    $query->where('version', '=', $request->version);
                if($request->shift  != '' )
                    $query->where('shift', '=', $request->shift);
                if($request->class  != '' )
                    $query->where('class', '=', $request->class);
                if($request->group  != '' )
                    $query->where('group', '=', $request->group);
                if($request->mobile  != '' )
                    $query->where('mobile', '=', $request->mobile);
            })
            ->get();
        return response()->json(array('data'=>$rows));

    }
    public function dowloadAppliProfile(Request $req)
    {
        $applicantInfo = DB::table("admission_applicants")->where('registrationNo',$req->regNo)->get();
        $applicantInfo = json_decode(json_encode($applicantInfo), True);
        print_r($applicantInfo);
        view()->share('applicantInfo', $applicantInfo);
        setlocale(LC_NUMERIC, "C");
        $headers=header('Content-type: application/pdf');
        $pdf = PDF::setPaper('a4')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('/admission/pdfPage');
        return $pdf->stream('profile.pdf');
    }
}