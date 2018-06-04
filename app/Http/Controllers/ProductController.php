<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use SnappyPdf;
use DB;
use Excel;
class ProductController extends Controller
{
    // show all data
    public function index(Request $req)
    {
        // show all data to index
        $blogs = DB::table("class_allhistory")->get();
        $blogs = json_decode(json_encode($blogs), True);
        view()->share('blogs',$blogs);
        if($req->has('download')){
            $pdf = PDF::loadView('pdfPage')->setPaper('a4');
            return $pdf->download('pdf.pdf');
        }
        return view('indexx');
    }
    public function downloadExcel()
    {
        $blogs = DB::table("class_allhistory")->get();
        $data = json_decode(json_encode($blogs), True);
        return Excel::download($data, 'report.xlsx');
    }
    public function pdfview(Request $request)
    {
        $users = DB::table("users")->get();
        view()->share('users',$users);

        if($request->has('download')) {
            // pass view file
            $pdf = SnappyPdf::loadView('pdfview');
            // download pdf
            return $pdf->download('userlist.pdf');
        }
        return view('pdfview');
    }
}