@extends('layout.app')
@section('title', 'Salary Management')
@section('content')
    <div class="page-header card">
        <div class="card-block">
            <div class="card-header">
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <h5 class="m-b-10">Employee Payroll Management</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add New Salary</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#showSetting" role="tab"><i class="icofont icofont-ui-message"></i>Manage Salary</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#showSetting1" role="tab"><i class="icofont icofont-ui-message"></i>Transaction Details</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="feeslog" role="tabpanel">
                            <form id="formAddNewSalary">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="empName" name="empName" class="form-control form-control-success empNameClass">
                                            <option value="">Select Employee Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Salary Scale</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="scale" name="scale" class="form-control form-control-success ">
                                            <option value="">Select Salary Scale</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Net Salary</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="netSalary" name="netSalary" class="form-control form-control-success" placeholder="Net Salary">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <h5 class="m-b-10">Earning Monthly:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="basic" name="basic" class="form-control form-control-success"  placeholder="Basic(%)">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="medical" name="medical" class="form-control form-control-success"  placeholder="Medical(%)">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="houseRent" name="houseRent" class="form-control form-control-success"  placeholder="House Rent(%)">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="conveyance" name="conveyance" class="form-control form-control-success"  placeholder="Conveyance(%)">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="allowance" name="allowance" class="form-control form-control-success"  placeholder="Allowance(%)">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="transAllowance" name="transAllowance" class="form-control form-control-success"  placeholder="Transport Allowance(%)">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="dailyAllowance" name="dailyAllowance" class="form-control form-control-success"  placeholder="Daily Allowance(%)">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <h5 class="m-b-10">Deduction:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="proFund" name="proFund" class="form-control form-control-success"  placeholder="Provident Fund(%)">
                                    </div><br>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id=loan"" name="loan" class="form-control form-control-success"  placeholder="Loan(%)">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="bima" name="bima" class="form-control form-control-success"  placeholder="Bima(%)">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="fund" name="fund" class="form-control form-control-success"  placeholder="Fund(%)">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add New Salary</button>
                                    </div><hr>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="showSetting" role="tabpanel">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="employeeId" name="employeeId" class="form-control form-control-success empNameClass">
                                        <option value="">Select Employee Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-header">
                                <hr><center><h4>Salary List of Employee!!!</h4></center><hr>
                            </div>
                            <div class="table-responsive">
                                <table id="tableSalaryList" class="table table-bordered">

                                </table>
                                <div class="modal fade" id="editmodalSalary" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Salary Structure</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formEditSalary">
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <select id="empName1" name="empName" class="form-control form-control-success empNameClass">
                                                                <option value="">Select Employee Name</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Salary Scale</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <select id="scale1" name="scale" class="form-control form-control-success">
                                                                <option value="">Select Salary Scale</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Net Salary</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" id="netSalary1" name="netSalary" class="form-control form-control-success" placeholder="Net Salary">
                                                        </div>
                                                    </div><hr>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <h5 class="m-b-10">Earning Monthly:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="basic1" name="basic" class="form-control form-control-success"  placeholder="Basic(%)">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="medical1" name="medical" class="form-control form-control-success"  placeholder="Medical(%)">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="houseRent1" name="houseRent" class="form-control form-control-success"  placeholder="House Rent(%)">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="conveyance1" name="conveyance" class="form-control form-control-success"  placeholder="Conveyance(%)">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="allowance1" name="allowance" class="form-control form-control-success"  placeholder="Allowance(%)">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="transAllowance1" name="transAllowance" class="form-control form-control-success"  placeholder="Transport Allowance(%)">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="dailyAllowance1" name="dailyAllowance" class="form-control form-control-success"  placeholder="Daily Allowance(%)">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <h5 class="m-b-10">Deduction:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="proFund1" name="proFund" class="form-control form-control-success"  placeholder="Provident Fund(%)">
                                                        </div><br>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="loan1" name="loan" class="form-control form-control-success"  placeholder="Loan(%)">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="bima1" name="bima" class="form-control form-control-success"  placeholder="Bima(%)">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fund1" name="fund" class="form-control form-control-success"  placeholder="Fund(%)">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" id="dbid" name="dbid" class="form-control form-control-success" placeholder="col">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="showSetting1" role="tabpanel">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Start Date</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="datepicker_start" class="form-control form-control-success"  placeholder="Start Date">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">End date</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="datepicker_end" class="form-control form-control-success"  placeholder=" End date">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Employee Code</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control form-control-success"  placeholder="Employe Code">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control form-control-success"  placeholder="Employee Name">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Department</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control form-control-success"  placeholder="Department">
                                </div>
                            </div>
                            <hr>
                            <div class="card-header">
                                <center><h4>Salary List of Employee!!!</h4></center><hr>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Employee Code</th>
                                        <th>Employee Name</th>
                                        <th>Department</th>
                                        <th>Salary</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>2554411
                                        </td>
                                        <td>Murad
                                        </td>
                                        <td>1st Class
                                        </td>
                                        <td>50000
                                        </td>
                                        <td>
                                            <div class="animation-model">
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#managenotice1" data-toggle="tooltip"   data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#confirm-delete1" data-toggle="tooltip"   data-placement="top" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="managenotice1" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Salary Structure</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Employee Code</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Employe Code">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Employee Name">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Department</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Department">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Net Salary</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Net Salary">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <h5 class="m-b-10">Earning Monthly:</h5>
                                                    </div><hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Basic">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Medical">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="House Rent">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Extra Hour">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Extra Hour">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Conveyance">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Allowance">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Transport Allowance">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Daily Allowance">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Others">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <h5 class="m-b-10">Deduction:</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Provident Fund">
                                                    </div><br>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Loan">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Bima">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Tax">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Leave">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Fund">
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="" class="form-control form-control-success"  placeholder="Others">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect ">Close</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="confirm-delete1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <center><h4 class="modal-title">Are You Sure to Delete This??</h4></center>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-danger btn-ok" data-dismiss="modal">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
@endsection
@section('footer')
    @parent
    <script>
        function loadEmpList() {
            $.ajax({
                url: '/api/showEmpList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    for(var i=0; i<data.length; i++)
                    {
                        $('.empNameClass').append($('<option>', {
                            value: data[i].employeeId,
                            text: data[i].name + "--(" + data[i].employeeId +")"
                        }));

                    }
                }
            });
        }
        $('#employeeId').on('change', function() {
            var employeeId= this.value ;
            $.ajax({
                url: '/api/searchemployeeId',
                type: 'POST',
                data: {employeeId:employeeId},
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    if(!$.trim(data)){
                        $('#tableSalaryList').html("No data found.Please try again.");
                    }
                    else {
                        var tbody = "<thead> " +
                            "<tr> " +
                            "<th>SL. No</th>" +
                            " <th>Employee ID</th>" +
                            " <th>Scale</th>" +
                            " <th>Net Salary</th>" +
                            " <th>Action</th>" +
                            " </tr>" +
                            " </thead>" +
                            "<tbody>" +
                            "</tbody>";
                        for (var i = 0; i < data.length; i++) {
                            tbody += "<tr>";
                            tbody += "<td>" + (i + 1) + "</td>";
                            tbody += "<td>" + data[i]['employeeId'] + "</td>";
                            tbody += "<td>" + data[i]['scale'] + "</td>";
                            tbody += "<td>" + data[i]['netSalary'] + "</td>";
                            tbody += "<td>" + "<div class='animation-model'>" +
                                " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editSalaryList(this.id);' id=" + i + " data-toggle='modal' data-target='#editmodalSalary' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                "<i class='fa fa-edit'></i> " +
                                "</button>&nbsp;&nbsp;" +
                                "</div> " +
                                "</td>";
                            tbody += "</tr>";

                        }
                        $('#tableSalaryList').html(tbody);
                    }
                }
            });
        });
        $(document).ready(function(){
            loadEmpList();
            $("#formAddNewSalary").validate({
                rules: {
                    empName:{required: true},
                    netSalary: {required: true, number: true},
                    scale: {required: true, number: true},
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/addBaseSalary',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);

                            }

                        }
                    });
                    return false;
                }
            });
            $("#formEditSalary").validate({
                rules: {
                    empName:{required: true},
                    netSalary: {required: true, number: true},
                    scale: {required: true, number: true},

                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editBaseSalary',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#editmodalSalary').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#editmodalSalary').modal('hide');

                            }

                        }
                    });
                    return false;
                }
            });
        });
        function editSalaryList(i) {
            document.getElementById('dbid').value = data[i]['id'];
            document.getElementById('empName1').value = data[i]['employeeId'];
            document.getElementById('scale1').value = data[i]['scale'];
            document.getElementById('netSalary1').value = data[i]['netSalary'];
            document.getElementById('basic1').value = data[i]['basic'];
            document.getElementById('medical1').value = data[i]['medical'];
            document.getElementById('houseRent1').value = data[i]['houseRent'];
            document.getElementById('conveyance1').value = data[i]['conveyance'];
            document.getElementById('allowance1').value = data[i]['allowance'];
            document.getElementById('transAllowance1').value = data[i]['transAllowance'];
            document.getElementById('dailyAllowance1').value = data[i]['dailyAllowance'];
            document.getElementById('proFund1').value = data[i]['proFund'];
            document.getElementById('loan1').value = data[i]['loan'];
            document.getElementById('bima1').value = data[i]['bima'];
            document.getElementById('fund1').value = data[i]['fund'];
        }
    </script>
@endsection





