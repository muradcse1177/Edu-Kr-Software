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
use Image;
use Validator;
use Illuminate\Support\Facades\Input;

class settingController extends Controller
{
    public function register(Request $request) {

        $username =  htmlspecialchars(stripslashes(trim($request->username)));
        $password = $request->password;
        $password =htmlspecialchars(stripslashes(($password)));
        $password = md5($password);
        $rows =  DB::table('users')
            ->select('id')
            ->where([[
                'login', '=', $username
            ]])
            ->distinct()->get()->count();
        if ($rows>0) {
            return view('/register', ['msg' => 'Same UserID already exists.Try another.']);
        }
        else{
            $result = DB::table('users')->insert([
                'name' => $request->name,
                'login' => $username,
                'email' => $request->email,
                'password' => $password,
                'userType' =>  $request->designation,
                'remember_token' => $request->get ( '_token' ),
            ]);
            if ($result) {
                return view('/login', ['msg' => 'Congratulation! Registration successful.']);
            }
            else{
                return view('/register', ['msg' => 'Sorry! Registration is not successful.']);
            }
        }
    }
    public function login(Request $request) {

        if(isset($_SESSION["username"])){
            $rows = DB::table('role_manage')
                ->where([
                    ['designation', '=', $_SESSION["designation"]],
                ])
                ->get();
            $role= json_decode($rows,true);

            $_SESSION["role"] =$role;
            $rows =  DB::table('web_school_info')->get();
            $arr = $rows->toArray();
            session([
                'schoolName' => $arr[0]->schoolName,
                'logo' => $arr[0]->logo,
                'address' => $arr[0]->address,
                'contactNumber' => $arr[0]->contactNumber1,
            ]);
            return view('indexadminpanel');
        }
        else {
            $username = $request->username;
            $username =  htmlspecialchars(stripslashes(trim($username)));
            $password = $request->password;
            $password =htmlspecialchars(stripslashes(($password)));
            $password = md5($password);
            $rows = DB::table('users')
                ->select('id')
                ->where([
                    ['login', '=', $username],
                    ['password', '=', $password]
                ])
                ->distinct()->get()->count();
            if ($rows == 1) {
                $rows = DB::table('users')
                    ->where([
                        ['login', '=', $username],
                        ['password', '=', $password]
                    ])
                    ->get();
                $arr = $rows->toArray();
                $_SESSION["username"] = $arr[0]->login;
                $_SESSION["name"] =$arr[0]->name;
                $_SESSION["email"] = $arr[0]->email;
                $_SESSION["designation"] = $arr[0]->userType;
                $rows = DB::table('role_manage')
                    ->where([
                        ['designation', '=', $_SESSION["designation"]],
                    ])
                    ->get();
                $role= json_decode($rows,true);
                $_SESSION["role"] =$role;
                $rows =  DB::table('web_school_info')->get();
                $arr = $rows->toArray();
                session([
                    'schoolName' => $arr[0]->schoolName,
                    'logo' => $arr[0]->logo,
                    'address' => $arr[0]->address,
                    'contactNumber' => $arr[0]->contactNumber1,
                ]);
                return view('indexadminpanel');
            } else {
                return view('login', ['msg' => 'Username & Password not correct.']);
            }
        }
    }
    public function logout() {
        session_destroy();
        return view('login', ['msg' => 'You are Logged Out.Please Login Again.']);
    }
    public function insertSchoolInfo(Request $request){
        try {
            $rows = DB::table('web_school_info')->groupBy('id')->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'School information already exists.If needed please update your information.'));
            }
            else {
                $path = "";
                if ($request->hasFile('logo')) {
                    $targetFolder = 'files/uploads/images/profile/';
                    $file = $request->file('logo');
                    $name = time() . '.' . $file->getClientOriginalName();
                    $image['filePath'] = $name;
                    $file->move($targetFolder, $name);
                    $path = '/' . $targetFolder . $name;
                }
                $result = DB::table('web_school_info')->insert([
                    'schoolName' => $request->schoolName,
                    'logo' => $path,
                    'aboutSchool' => $request->schoolName,
                    'totalteacher' => $request->totalteacher,
                    'totalstudent' => $request->totalstudent,
                    'contactNumber1' => $request->aboutSchool,
                    'successrate' => $request->successrate,
                    'parsat' => $request->aboutSchool,
                    'contactNumber2' => $request->contactNumber2,
                    'address' => $request->address,
                    'email' => $request->email,
                    'faxNumber' => $request->faxNumber,
                    'establishYear' => $request->establishYear,
                    'eiinNumber' => $request->eiinNumber,
                    'openingDayFrom' => $request->openingdayfrom,
                    'closingDayTo' => $request->closingdayto,
                    'facebookLink' => $request->facebooklink,
                    'twitterLink' => $request->twitterLink,
                    'youtubeLink' => $request->youtubeLink,
                    'googlPlusLink' => $request->googleLink,
                    'intragramLink' => $request->instragramLink,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New School Info name is successfully created.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to create School Info name. Please try again.'));
                }
            }
        }
            catch(\Illuminate\Database\QueryException $ex){
                return response()->json(array('errorMsg' => $ex->getMessage() ));
            }


    }

    public function showSchoolInfo(Request $request){
        try{
            $rows =  DB::table('web_school_info')->get();
            $arr = $rows->toArray();
            session([
                'schoolName' => $arr[0]->schoolName,
                'logo' => $arr[0]->logo,
                'address' => $arr[0]->address,
                'contactNumber' => $arr[0]->contactNumber1,
            ]);
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }


    public function editSchoolInfo(Request $request){
        try{


            $path = "";
            if ($request->hasFile('newlogo')) {
                //$path = $request->stdPhoto->store('files/uploads/images/profile');
                //return response()->json(array('successMsg' => 'File found',));
                $targetFolder = 'files/uploads/images/profile/';
                $file = $request->file('newlogo');
                $name = time() . '.' . $file->getClientOriginalName();
                $image['filePath'] = $name;
                $file->move($targetFolder, $name);
                $path = '/' . $targetFolder . $name;
            }


            $id= $request->dbid;

            $newschoolName = $request->newschoolName;
            $aboutSchool = $request->newaboutSchool;
            $totalteacher = $request->newtotalteacher;
            $totalstudent = $request->newtotalstudent;
            $successrate = $request->newsuccessrate;
            $parsat = $request->newparsat;
            $newcontactNumber1 = $request->newcontactNumber1;
            $newcontactNumber2 = $request->newcontactNumber2;
            $newemail = $request->newemail;
            $newaddress = $request->newaddress;
            $newfaxNumber = $request->newfaxNumber;
            $newestablishYear = $request->newestablishYear;
            $neweiinNumber = $request->neweiinNumber;
            $newopeningdayfrom = $request->newopeningdayfrom;
            $newclosingdayto = $request->newclosingdayto;
            $newfacebooklink = $request->newfacebooklink;
            $newtwitterLink = $request->newtwitterLink;
            $newyoutubeLink = $request->newyoutubeLink;
            $newgoogleLink = $request->newgoogleLink;
            $newinstragramLink = $request->newinstragramLink;

            if( $path != "" ){
                $result =DB::table('web_school_info')
                    ->where('id', $id)
                    ->update([
                        'schoolName' => $newschoolName,
                        'logo' => $path,
                        'aboutSchool' =>  $aboutSchool,
                        'totalteacher' =>  $totalteacher,
                        'totalstudent' =>  $totalstudent,
                        'successrate' =>  $successrate,
                        'parsat' =>  $parsat,
                        'contactNumber1' => $newcontactNumber1,
                        'contactNumber2' => $newcontactNumber2,
                        'email' => $newemail,
                        'faxNumber' => $newaddress,
                        'address' => $newfaxNumber,
                        'establishYear' => $newestablishYear,
                        'eiinNumber' => $neweiinNumber,
                        'openingDayFrom' => $newopeningdayfrom,
                        'closingDayTo' => $newclosingdayto,
                        'facebookLink' => $newfacebooklink,
                        'twitterLink' => $newtwitterLink,
                        'youtubeLink' => $newyoutubeLink,
                        'googlPlusLink' => $newgoogleLink,
                        'intragramLink' => $newinstragramLink,
                    ]);
            }
            else{
                $result =DB::table('web_school_info')
                    ->where('id', $id)
                    ->update([
                        'schoolName' => $newschoolName,
                        'aboutSchool' =>  $aboutSchool,
                        'totalteacher' =>  $totalteacher,
                        'totalstudent' =>  $totalstudent,
                        'successrate' =>  $successrate,
                        'parsat' =>  $parsat,
                        'contactNumber1' => $newcontactNumber1,
                        'contactNumber2' => $newcontactNumber2,
                        'email' => $newemail,
                        'faxNumber' => $newaddress,
                        'address' => $newfaxNumber,
                        'establishYear' => $newestablishYear,
                        'eiinNumber' => $neweiinNumber,
                        'openingDayFrom' => $newopeningdayfrom,
                        'closingDayTo' => $newclosingdayto,
                        'facebookLink' => $newfacebooklink,
                        'twitterLink' => $newtwitterLink,
                        'youtubeLink' => $newyoutubeLink,
                        'googlPlusLink' => $newgoogleLink,
                        'intragramLink' => $newinstragramLink,
                    ]);
            }


            if ($result) {
                return response()->json(array(
                    'successMsg' => 'School Info is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'School Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }


    public function insertSlideImage(Request $request){
        try{
            $path = "";
            if($request->hasFile('image')) {
                $image       = $request->file('image');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1424, 772);
                $image_resize->save($targetFolder .$filename);
                $path = '/' . $targetFolder . $filename;
            }

            if($request->status== ""){
                $status="Inactive";
            }
            else
                $status= $request->status;

            $result = DB::table('web_slide_img')->insert([
                'sliderName' =>  $request->sliderNmae,
                'image' => $path,
                'imageText' =>  $request->description,
                'status' =>  $status
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'New Slider Image is successfully added.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to add Slider Image. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }


    public function showSliderImage(Request $request){
        try{
            $rows =  DB::table('web_slide_img')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editSlideImage(Request $request){
        try{


            $path = "";
            if($request->hasFile('editimage')) {
                $image       = $request->file('editimage');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1424, 772);
                $image_resize->save($targetFolder .$filename);
                $path = '/' . $targetFolder . $filename;
            }

            $id= $request->dbid;

            $editsliderName = $request->editsliderName;
            $editDescription = $request->editDescription;
            if($request->editstatus== ""){
                $status="Inactive";
            }
            else
                $status= "Active";

            if( $path != "" ){
                $result =DB::table('web_slide_img')
                    ->where('id', $id)
                    ->update([
                        'sliderName' => $editsliderName,
                        'logo' => $path,
                        'imageText' => $editDescription,
                        'status' => $status
                    ]);
            }
            else{
                $result =DB::table('web_slide_img')
                    ->where('id', $id)
                    ->update([
                        'sliderName' => $editsliderName,
                        'imageText' => $editDescription,
                        'status' => $status
                    ]);
            }


            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Slider Image is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Slider Image is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteSliderImage(Request $request){
        try{
            $id= $request->dbidmain;

            $result =  DB::table('web_slide_img')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Slider Image is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Slider Image. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function insertMessage(Request $request){
        try{
            $rows = DB::table('web_principal_message')->groupBy('id')->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Principal Message already exists.If needed please update your information.'));
            }

            else{

                $path = "";
                if($request->hasFile('image')) {
                    $image       = $request->file('image');
                    $filename    = time() . '.' .$image->getClientOriginalName();
                    $targetFolder = 'files/uploads/images/profile/';
                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(1204, 802);
                    $image_resize->save($targetFolder .$filename);
                    $path = '/' . $targetFolder . $filename;
                }

                if($request->status== ""){
                    $status="Inactive";
                }
                else
                    $status= $request->status;

                $result = DB::table('web_principal_message')->insert([
                    'principalName' =>  $request->sliderNmae,
                    'photo' => $path,
                    'message' =>  $request->description,
                    'status' =>  $status
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Principal Message is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add Principal Message. Please try again.'));
                }

            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function showMessage(Request $request){
        try{
            $rows =  DB::table('web_principal_message')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }


    public function editMessage(Request $request){
        try{


            $path = "";
            if($request->hasFile('editimage')) {
                $image       = $request->file('editimage');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1204, 802);
                $image_resize->save($targetFolder .$filename);
                $path = '/' . $targetFolder . $filename;
            }

            $id= $request->dbid;

            $editsliderName = $request->editsliderName;
            $editDescription = $request->editDescription;
            if($request->editstatus== ""){
                $status="Inactive";
            }
            else
                $status= "Active";

            if( $path != "" ){
                $result =DB::table('web_principal_message')
                    ->where('id', $id)
                    ->update([
                        'principalName' => $editsliderName,
                        'photo' => $path,
                        'message' => $editDescription,
                        'status' => $status
                    ]);
            }
            else{
                $result =DB::table('web_principal_message')
                    ->where('id', $id)
                    ->update([
                        'principalName' => $editsliderName,
                        'message' => $editDescription,
                        'status' => $status
                    ]);
            }


            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Principal Message is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Principal Message is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function deleteMessage(Request $request){
        try{
            $id= $request->dbidmain;

            $result =  DB::table('web_principal_message')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Principal Message is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Principal Message. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function insertNotice(Request $request){
        try{

            $path = "";
            if ($request->hasFile('file')) {

                $targetFolder = 'files/uploads/images/profile/';
                $file = $request->file('file');
                $name = time() . '.' . $file->getClientOriginalName();
                $image['filePath'] = $name;
                $file->move($targetFolder, $name);
                $path = '/' . $targetFolder . $name;
            }
            $imagePath = "";
            if ($request->hasFile('image')) {

                $targetFolder = 'files/uploads/images/profile/';
                $file = $request->file('image');
                $name = time() . '.' . $file->getClientOriginalName();
                $image['filePath'] = $name;
                $file->move($targetFolder, $name);
                $imagePath = '/' . $targetFolder . $name;
            }

            if($request->status== ""){
                $status="Inactive";
            }
            else
                $status= $request->status;

            $result = DB::table('web_noticeboard')->insert([
                'type' =>  $request->noticeType,
                'title' => $request->title,
                'photo' => $imagePath,
                'file' => $path,
                'date' =>$request->publishdate1,
                'notice' =>  $request->description,
                'status' =>  $status
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Notice is successfully added.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to add Notice. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function showNotice(Request $request){
        try{
            $rows =  DB::table('web_noticeboard')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editNotice(Request $request){
        try{


            $path = "";
            if ($request->hasFile('editfile')) {
                $targetFolder = 'files/uploads/images/profile/';
                $file = $request->file('editfile');
                $name = time() . '.' . $file->getClientOriginalName();
                $image['filePath'] = $name;
                $file->move($targetFolder, $name);
                $path = '/' . $targetFolder . $name;
            }

            $imagePath = "";
            if ($request->hasFile('editimage')) {

                $targetFolder = 'files/uploads/images/profile/';
                $file = $request->file('editimage');
                $name = time() . '.' . $file->getClientOriginalName();
                $image['filePath'] = $name;
                $file->move($targetFolder, $name);
                $imagePath = '/' . $targetFolder . $name;
            }

            $id= $request->dbid;

            if($request->editstatus== ""){
                $status="Inactive";
            }
            else
                $status= "Active";

            if( $path != "" ){
                $result =DB::table('web_noticeboard')
                    ->where('id', $id)
                    ->update([
                        'type' => $request->editnoticeType,
                        'title' => $request->edittitle,
                        'photo' => $imagePath,
                        'file' => $path,
                        'date' => $request->editpublishdate1,
                        'notice' => $request->editdescription,
                        'status' => $status
                    ]);
            }
            else{
                $result =DB::table('web_noticeboard')
                    ->where('id', $id)
                    ->update([
                        'type' => $request->editnoticeType,
                        'title' =>$request->edittitle,
                        'date' => $request->editpublishdate1,
                        'notice' => $request->editdescription,
                        'status' => $status
                    ]);
            }


            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Notice is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Notice is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }


    public function deleteNotice(Request $request){
        try{
            $id= $request->dbidmain;

            $result =  DB::table('web_noticeboard')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Notice is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Notice. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function insertEventDay(Request $request){
        try{
            $result = DB::table('web_calender')->insert([
                'eventType' =>  $request->eventType,
                'title' =>  $request->title,
                'startdate' =>  $request->startdate,
                'enddate' =>  $request->enddate,
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'New Event is successfully created.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to create new Event. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function showEvent(Request $request){
        try{
            $rows =  DB::table('web_calender')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editEvent(Request $request){
        try{

            $id= $request->dbid;
            $result =DB::table('web_calender')
                ->where('id', $id)
                ->update([
                    'eventType' =>  $request->editeventType,
                    'title' =>  $request->edittitle,
                    'startdate' =>  $request->editstartdate,
                    'enddate' =>  $request->editenddate,
                ]);

            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Event is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Event is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteEvent(Request $request){
        try{
            $id= $request->dbidmain;

            $result =  DB::table('web_calender')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Event is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Event. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }


    public function insertGalleryFile(Request $request){
        try{

            $path = "";


            if ($request->hasFile('file')) {

                $targetFolder = 'files/uploads/images/profile/';
                $file = $request->file('file');
                $name = time() . '.' . $file->getClientOriginalName();
                $image['filePath'] = $name;
                $file->move($targetFolder, $name);
                $path = '/' . $targetFolder . $name;
            }

            $imagePath = "";
            if($request->hasFile('image')) {
                $image       = $request->file('image');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(800, 800);
                $image_resize->save($targetFolder .$filename);
                $imagePath = '/' . $targetFolder . $filename;
            }

            if($request->status== ""){
                $status="Inactive";
            }
            else
                $status= $request->status;

            $result = DB::table('web_gallery')->insert([
                'type' =>  $request->type,
                'title' => $request->fileName,
                'image' => $imagePath,
                'file' => $path,
                'status' =>  $status
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'File is successfully added.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to add File. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showGallery(Request $request){
        try{
            $rows =  DB::table('web_gallery')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editGallery(Request $request){
        try{


            $path = "";
            if ($request->hasFile('editfile')) {
                $targetFolder = 'files/uploads/images/profile/';
                $file = $request->file('editfile');
                $name = time() . '.' . $file->getClientOriginalName();
                $image['filePath'] = $name;
                $file->move($targetFolder, $name);
                $path = '/' . $targetFolder . $name;
            }

            $imagePath = "";
            if($request->hasFile('editimage')) {
                $image       = $request->file('editimage');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(800, 800);
                $image_resize->save($targetFolder .$filename);
                $imagePath = '/' . $targetFolder . $filename;
            }

            $id= $request->dbid;

            if($request->editstatus== ""){
                $status="Inactive";
            }
            else
                $status= "Active";

            if( $path != "" ){
                $result =DB::table('web_gallery')
                    ->where('id', $id)
                    ->update([
                        'type' => $request->edittype,
                        'title' => $request->editfileName,
                        'image' => $imagePath,
                        'file' => $path,
                        'status' => $status
                    ]);
            }
            else{
                $result =DB::table('web_gallery')
                    ->where('id', $id)
                    ->update([
                        'type' => $request->edittype,
                        'title' => $request->editfileName,
                        'status' => $status
                    ]);
            }


            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Gallery is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Gallery is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteGallery(Request $request){
        try{
            $id= $request->dbidmain;

            $result =  DB::table('web_gallery')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Gallery file is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Gallery file. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function insertTestimonial(Request $request){
        try{

            $path = "";
            if($request->hasFile('image')) {
                $image       = $request->file('image');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(400, 400);
                $image_resize->save($targetFolder .$filename);
                $path = '/' . $targetFolder . $filename;
            }
            if($request->status== ""){
                $status="Inactive";
            }
            else
                $status= $request->status;

            $result = DB::table('web_testimonial')->insert([
                'name' =>  $request->name,
                'image' => $path,
                'designation' =>  $request->designation,
                'description' =>  $request->description,
                'status' =>  $request->status,
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'New Testimonial is successfully added.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to add Testimonial. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showTestimonial(Request $request){
        try{
            $rows =  DB::table('web_testimonial')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editTestimonial(Request $request){
        try{


            $path = "";
            if($request->hasFile('editimage')) {
                $image       = $request->file('editimage');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(400, 400);
                $image_resize->save($targetFolder .$filename);
                $path = '/' . $targetFolder . $filename;
            }
            $id= $request->dbid;

            if($request->editstatus== ""){
                $status="Inactive";
            }
            else
                $status= "Active";

            if( $path != "" ){
                $result =DB::table('web_testimonial')
                    ->where('id', $id)
                    ->update([
                        'name' =>  $request->editname,
                        'image' => $path,
                        'designation' =>  $request->editdesignation,
                        'description' =>  $request->editdescription,
                        'status' =>  $request->editstatus,
                    ]);
            }
            else{
                $result =DB::table('web_testimonial')
                    ->where('id', $id)
                    ->update([
                        'name' =>  $request->editname,
                        'designation' =>  $request->editdesignation,
                        'description' =>  $request->editdescription,
                        'status' =>  $request->editstatus,
                    ]);
            }


            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Testimonial is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Testimonial is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function deleteTestimonial(Request $request){
        try{
            $id= $request->dbidmain;

            $result =  DB::table('web_testimonial')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Testimonial file is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Testimonial file. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertTeacherInfo(Request $request){
        try{

            $path = "";

            if($request->hasFile('image')) {
                $image       = $request->file('image');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(351, 355);
                $image_resize->save($targetFolder .$filename);
                $path = '/' . $targetFolder . $filename;
            }
            if($request->status== ""){
                $status="Inactive";
            }
            else
                $status= $request->status;

            $result = DB::table('web_teacher_info')->insert([
                'name' =>  $request->name,
                'image' => $path,
                'designation' =>  $request->designation,
                'status' =>  $request->status,
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'New Teacher Info is successfully added.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to add Teacher Info. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showTeacherInfo(Request $request){
        try{
            $rows =  DB::table('web_teacher_info')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editTeacherInfo(Request $request){
        try{


            $path = "";
            if($request->hasFile('editimage')) {
                $image       = $request->file('editimage');
                $filename    = time() . '.' .$image->getClientOriginalName();
                $targetFolder = 'files/uploads/images/profile/';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(351, 355);
                $image_resize->save($targetFolder .$filename);
                $path = '/' . $targetFolder . $filename;
            }

            $id= $request->dbid;

            if($request->editstatus== ""){
                $status="Inactive";
            }
            else
                $status= "Active";

            if( $path != "" ){
                $result =DB::table('web_teacher_info')
                    ->where('id', $id)
                    ->update([
                        'name' =>  $request->editname,
                        'image' => $path,
                        'designation' =>  $request->editdesignation,
                        'status' =>  $request->editstatus,
                    ]);
            }
            else{
                $result =DB::table('web_teacher_info')
                    ->where('id', $id)
                    ->update([
                        'name' =>  $request->editname,
                        'designation' =>  $request->editdesignation,
                        'status' =>  $request->editstatus,
                    ]);
            }


            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Teacher Info is successfully updated'
                ));
            } else {
                return response()->json(array('errorMsg' => 'Teacher Info is not updated.Please try again' ));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function deleteTeacherInfo(Request $request){
        try{
            $id= $request->dbidmain;

            $result =  DB::table('web_teacher_info')
                ->where('id',$id)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Teacher Info file is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Teacher Info. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertNewsletter(Request $request){
        try {

            $result = DB::table('web_newsletter')->insert([
                'email' => $request->email,
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Congratulation! We send our work via mail.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Subscribe. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }


    }
    public function insertContactUs(Request $request){
        try {

            $result = DB::table('web_contact_us')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'comment' => $request->comment,
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Congratulation! We Got It',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to send. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showNewsletter(Request $request){
        try{
            $rows =  DB::table('web_newsletter')->orderBy('id','desc')->limit(50)->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showContactUs(Request $request){
        try{
            $rows =  DB::table('web_contact_us')->orderBy('id','desc')->limit(50)->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

}