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
use PDF;
use Response;
use Illuminate\Support\Facades\Input;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class hrController extends Controller
{
    public function insertDesignationName(Request $request){
        try{
            $result = DB::table('employee_designation')->insert([
                'designationName' =>  $request->designationName,
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'New Designation name is successfully created.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to create Designation name. Please try again.'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function showDesignationList(Request $request){
        try{
            $rows =  DB::table('employee_designation')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editDesignationName(Request $request){
        try{
            $oldDesName = $request->oldDesName;
            $newDesName = $request->newDesName;
            $result =DB::table('employee_designation')
                ->where('designationName', $oldDesName)
                ->update(['designationName' => $newDesName]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Designation name is successfully updated.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to update Designation name. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteDesignationName(Request $request){
        try{
            $deleteDesignation = $request->deleteDesignation;
            //return $deleteDesignation;
            $result =  DB::table('employee_designation')
                ->where('designationName',$deleteDesignation)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Designation name is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Designation name. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function searchEmployeeInfo(Request $request){
        try{
            $rows =  DB::table('employees')
                ->where('employeeId',$request->employeeId)
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function upgradeEmployeeDesig(Request $request){
        try{
            $result =DB::table('employees')
                ->where('employeeId', $request->employeeId)
                ->update(['designation' => $request->designation]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Designation name is successfully upgraded.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to upgrade Designation name. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertleaveName(Request $request){

        try{
            $rows =  DB::table('employee_leave')
                ->select('id')
                ->where([
                    ['leaveName', '=', $request->leaveName],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('employee_leave')->insert([
                    'leaveName' =>  $request->leaveName,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Leave Name is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Leave Name. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showLeaveList(Request $request){
        try{
            $rows =  DB::table('employee_leave')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editLeaveName(Request $request){
        try{
            $result =DB::table('employee_leave')
                ->where('id', $request->dbid)
                ->update(['leaveName' => $request->leaveName]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Leave name is successfully updated.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to update leave name. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function deleteLeaveName(Request $request){
        try{
            $result =  DB::table('employee_leave')
                ->where('id',$request->dbiddel)
                ->delete();
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Leave name is successfully Deleted.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to Deleted Leave name. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function assignEmployeeLeave(Request $request){

        try{
            $rows =  DB::table('employee_leave_details')
                ->select('id')
                ->where([
                    ['employeeId', '=', $request->employeeId],
                    ['startDate', '=', $request->startDate],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('employee_leave_details')->insert([
                    'employeeId' =>  $request->employeeId,
                    'leaveType' =>  $request->leaveName,
                    'startDate' =>  $request->startDate,
                    'endDate' =>  $request->endDate,
                    'joiningDate' =>  $request->joiningDate,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Leave Assign is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Leave Assign. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showLeaveAssignList(Request $request){
        try{
            $rows =  DB::table('employee_leave_details as a')
                ->join('employees as b','a.employeeId','b.employeeId')
                ->orderBy('id','desc')
                ->limit(20)
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editEmployeeLeave(Request $request){
        try{
            $result =DB::table('employee_leave_details')
                ->where('id', $request->dbid1)
                ->update([
                    'leaveType' =>  $request->leaveName,
                    'startDate' =>  $request->startDate,
                    'endDate' =>  $request->endDate,
                    'joiningDate' =>  $request->joiningDate,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Leave Assign is successfully updated.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to update leave Assign. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertTaxValue(Request $request){

        try{
            $rows =  DB::table('employee_tax')
                ->select('id')
                ->where([
                    ['startBasic', '=', $request->startBasic],
                    ['endBasic', '=', $request->endBasic],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('employee_tax')->insert([
                    'startBasic' =>  $request->startBasic,
                    'endBasic' =>  $request->endBasic,
                    'taxAmount' =>  $request->taxAmount,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'Tax Assign is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add new Tax Assign. Please try again.'));
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showTaxList(Request $request){
        try{
            $rows =  DB::table('employee_tax')
                ->orderBy('id','desc')
                ->limit(20)
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function editTaxValue(Request $request){
        try{
            $result =DB::table('employee_tax')
                ->where('id', $request->dbid)
                ->update([
                    'startBasic' =>  $request->startBasic,
                    'endBasic' =>  $request->endBasic,
                    'taxAmount' =>  $request->taxAmount,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Tax Assign is successfully updated.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to update Tax Assign. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showEmpList(Request $request){
        try{
            $rows =  DB::table('employees')
                ->select('name','employeeId')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }

    public function addBaseSalary(Request $request){

        try{
            $rows =  DB::table('employee_base_salary')
                ->select('id')
                ->where([
                    ['employeeId', '=', $request->empName],
                    ['scale', '=', $request->scale],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                if(($request->basic+ $request->medical+ $request->houseRent+ $request->conveyance+ $request->allowance+ $request->transAllowance+ $request->dailyAllowance)==100){
                    $result = DB::table('employee_base_salary')->insert([
                        'employeeId' =>  $request->empName,
                        'scale' =>  $request->scale,
                        'netSalary' =>  $request->netSalary,
                        'basic' =>  $request->basic,
                        'medical' =>  $request->medical,
                        'houseRent' =>  $request->houseRent,
                        'conveyance' =>  $request->conveyance,
                        'allowance' =>  $request->allowance,
                        'transAllowance' =>  $request->transAllowance,
                        'dailyAllowance' =>  $request->dailyAllowance,
                        'proFund' =>  $request->proFund,
                        'loan' =>  $request->loan,
                        'bima' =>  $request->bima,
                        'fund' =>  $request->fund,
                    ]);
                    if ($result) {
                        return response()->json(array(
                            'successMsg' => 'New Salary Generation is successfully added.',
                        ));
                    } else {
                        return response()->json(array('errorMsg' => 'Failed to add New Salary Generation. Please try again.'));
                    }
                }
                else{
                    return response()->json(array('errorMsg' => 'Salary Calculation not correct. Please try again.'));
                }

            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function searchemployeeId(Request $request){
        try{
            $rows =  DB::table('employee_base_salary')
                ->where('employeeId',$request->employeeId)
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function editBaseSalary(Request $request){
        try{
            $result =DB::table('employee_base_salary')
                ->where('id', $request->dbid)
                ->update([
                    'employeeId' =>  $request->empName,
                    'scale' =>  $request->scale,
                    'netSalary' =>  $request->netSalary,
                    'basic' =>  $request->basic,
                    'medical' =>  $request->medical,
                    'houseRent' =>  $request->houseRent,
                    'conveyance' =>  $request->conveyance,
                    'allowance' =>  $request->allowance,
                    'transAllowance' =>  $request->transAllowance,
                    'dailyAllowance' =>  $request->dailyAllowance,
                    'proFund' =>  $request->proFund,
                    'loan' =>  $request->loan,
                    'bima' =>  $request->bima,
                    'fund' =>  $request->fund,
                ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'Salary is successfully updated.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to update Salary Assign. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function htmltopdfSalary(Request $request)
    {
        $rows =  DB::table('employee_salary_status')
            ->select('employeeId')
            ->where([
                ['employeeId', '=', $request->employeeId]
            ])
            ->whereYear('date', '=', date('Y'))
            ->whereMonth('date', '=', date('m'))
            ->distinct()->get()->count();
        if ($rows>0) {
            return view('hr/payslip', ['info' => 'Your Payslip is already downloaded.You download your payslip only one time a month.']);
        }
        else {
            $rows1 =  DB::table('employee_base_salary')
                ->select('employeeId')
                ->where([
                    ['employeeId', '=', $request->employeeId]
                ])
                ->distinct()->get()->count();
            if ($rows1<1) {
                return view('hr/payslip', ['info' => 'EmployeeID Not Found In Database.Please Try with Valid EmployeeID']);
            }
            else{
                $result = DB::table('employee_salary_status')->insert([
                    'employeeId' =>  $request->employeeId,
                    'date' =>  date("Y-m-d"),
                    'status' =>  'Paid',
                ]);
                if($result){
                    $employeeInfo = DB::table("employee_base_salary as a")
                        ->where('a.employeeId', $request->employeeId)
                        ->join('employees as b', 'a.employeeId', 'b.employeeId')
                        ->get();
                    if($employeeInfo){
                        view()->share('employeeInfo', $employeeInfo);
                        $pdf = PDF::loadView('hr/salaryPdfInvoice');
                        return $pdf->download('payslip.pdf');
                    }
                }
            }

        }
    }
    public function insertNewAccount(Request $request){

        try{
            $rows =  DB::table('account_name')
                ->select('id')
                ->where([
                    ['acName', '=', $request->acName],
                    ['iniAmount', '=', $request->iniAmount],
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same info already exists.Try another.'));
            }
            else{
                $result = DB::table('account_name')->insert([
                    'acName' =>  $request->acName,
                    'iniAmount' =>  $request->iniAmount,
                ]);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Account Generation is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to add New Account Generation. Please try again.'));
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertTransaction(Request $request){

        try{
            if($request->type =='income'){

                $rows =  DB::table('account_deatils')->orderBy('id','desc')->limit(1)->get();
               if(count($rows )<1){
                   $rows1 =  DB::table('account_name')->where('acName',$request->accName)->get();
                   $account_info = json_decode($rows1,true);
                   $iniAmount = $account_info[0]['iniAmount'];
                   $finalBalance = $request->amount+$iniAmount;
               }
                if(count($rows) == 1 ){
                    $finalBalance = json_decode($rows,true);
                   $finalBalance=$finalBalance[0]['finalBalance'];
                   $finalBalance = $request->amount + $finalBalance;
               }
            }
            if($request->type == 'expenditure'){

                $rows =  DB::table('account_deatils')->orderBy('id','desc')->limit(1)->get();
                if(count($rows)<1){
                    $rows1 =  DB::table('account_name')->where('acName',$request->accName)->get();
                    $account_info = json_decode($rows1,true);
                    $iniAmount = $account_info[0]['iniAmount'];
                    $finalBalance = -$request->amount+$iniAmount;
                }
                if(count($rows) == 1 ){
                    $finalBalance = json_decode($rows,true);
                    $finalBalance=$finalBalance[0]['finalBalance'];
                    $finalBalance = $finalBalance-$request->amount;
                }
            }
            $result = DB::table('account_deatils')->insert([
                'date' =>  $request->date,
                'checquNumber' =>  $request->checquNumber,
                'description' =>  $request->description,
                'type' =>  $request->type,
                'amount' =>  $request->amount,
                'finalBalance' =>$finalBalance,
                'accountName' =>  $request->accName,
            ]);
            if ($result) {
                return response()->json(array(
                    'successMsg' => 'New Transaction Generation is successfully added.',
                ));
            } else {
                return response()->json(array('errorMsg' => 'Failed to add New Transaction Generation. Please try again.'));
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function showAccountList(Request $request){
        try{
            $rows =  DB::table('account_name')
                ->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function accountTransaction(Request $request){
        try{
            if($request->search =='search'){

                $rows =  DB::table('account_deatils')
                    ->where('date','>=',$request->startdate)
                    ->where('date','<=',$request->enddate)
                    ->where('accountName',$request->accName)
                    ->get();
                return view('hr/accountManagement', ['transaction' => $rows]);
            }
            if($request->pdfDownload =='pdfDownload'){

                $rows =  DB::table('account_deatils')
                    ->where('date','>=',$request->startdate)
                    ->where('date','<=',$request->enddate)
                    ->where('accountName',$request->accName)
                    ->get();
                view()->share('transaction', $rows);
                $pdf = PDF::setPaper('a4')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('hr/pdfTransactionPage');
                return $pdf->download('Transaction.pdf');
            }

            if($request->xlsDownLoad =='xlsDownLoad'){
                unlink('Transaction.xlsx');
                $rows =  DB::table('account_deatils')
                    ->where('date','>=',$request->startdate)
                    ->where('date','<=',$request->enddate)
                    ->where('accountName',$request->accName)
                    ->get();
                $rows = json_decode($rows,true);
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('C2', 'Date');
                $sheet->setCellValue('D2', 'Ref/Check Number');
                $sheet->setCellValue('E2', 'Details');
                $sheet->setCellValue('F2', 'Type');
                $sheet->setCellValue('G2', 'Amount');
                $sheet->setCellValue('H2', 'Final Balance');
                foreach($rows as $row){
                    $array[]  =[$row['date'],$row['checquNumber'],$row['description'],$row['type'],$row['amount'],$row['finalBalance']];
                }
                $spreadsheet->getActiveSheet()
                    ->fromArray(
                        $array,
                        NULL,
                        'C3'
                    );
                $writer = new Xlsx($spreadsheet);
                $writer->save('Transaction.xlsx');
                $file= "Transaction.xlsx";
                return Response::download($file, 'Transaction.xlsx');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
    public function insertRoleEmp(Request $request){

        try{

            $role = json_decode($request->getContent(), true);
            $rows =  DB::table('role_manage')
                ->select('id')
                ->where([
                    ['designation', '=', $role['designation']]
                ])
                ->distinct()->get()->count();
            if ($rows>0) {
                return response()->json(array('errorMsg' => 'Same Info Already Exits. Please try for another designation.'));
            }
            else {
                $data = array();
                $cnt = 0;
                $final_role = $role['role'];
                unset($final_role[count($final_role)-1]);
                foreach ($final_role as $row) {

                    $data[] = array(
                        "designation" => $role['designation'],
                        "roleName" => $row['name'],
                        "roleValue" => $row['value']
                    );
                }
                //print_r($data);
                $result = DB::table('role_manage')->insert($data);
                if ($result) {
                    return response()->json(array(
                        'successMsg' => 'New Role Management  is successfully added.',
                    ));
                } else {
                    return response()->json(array('errorMsg' => 'Failed to create new Role Management. Please try again.'));
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('errorMsg' => $ex->getMessage() ));
        }

    }
}