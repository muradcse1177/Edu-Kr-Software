@extends('layout.app')
@section('title', 'Loan Management')
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
        <h5 class="m-b-10">Employee Loan Management</h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add New Loan</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#showSetting" role="tab"><i class="icofont icofont-ui-message"></i>Manage Loan</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#showSetting1" role="tab"><i class="icofont icofont-ui-message"></i>Transaction Details</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="feeslog" role="tabpanel">
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Employee Code</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employe Code">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employee Name">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Department</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Department">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Permitted By</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Permitted By">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Loan Purpose</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Loan Purpose">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Approve Date</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="datepicker_start" class="form-control form-control-success" id="inputSuccess1" placeholder="Approve Date">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Repayment Date</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="datepicker_end" class="form-control form-control-success" id="inputSuccess1" placeholder="Approve Date">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Amount</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Amount">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Interest Percentage</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Interest Percentage">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Installment Period </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Installment Period">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Repayment Total</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Repayment Total ">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Installment</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Installment">
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
                                <button id="submitClassInfo" class="form-control form-bg-primary">Create Loan</button>
                            </div><hr>
                        </div>
                    </div>
                    <div class="tab-pane" id="showSetting" role="tabpanel">
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Employee Code</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employe Code">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employee Name">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Department</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Department">
                            </div>
                        </div><hr>
                        <div class="card-header">
                            <center><h4>Loan List of Employee!!!</h4></center><hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Employee Code</th>
                                    <th>Employee Name</th>
                                    <th>Department</th>
                                    <th>Loan</th>
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
                                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#managenotice" data-toggle="tooltip"   data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip"   data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="modal fade" id="managenotice" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Loan Structure</h4>
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
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employe Code">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employee Name">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Department</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Department">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Permitted By</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Permitted By">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Loan Purpose</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Loan Purpose">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Approve Date</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="datepicker_start1" class="form-control form-control-success" id="inputSuccess1" placeholder="Approve Date">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Repayment Date</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="datepicker_end1" class="form-control form-control-success" id="inputSuccess1" placeholder="Approve Date">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Amount</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Amount">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Interest Percentage</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Interest Percentage">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Installment Period </label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Installment Period in Month">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Repayment Total</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Repayment Total ">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Installment</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Installment">
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
                            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <div class="tab-pane" id="showSetting1" role="tabpanel">
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Start Date</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="datepicker_start" class="form-control form-control-success" id="inputSuccess1" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">End date</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="datepicker_end" class="form-control form-control-success" id="inputSuccess1" placeholder=" End date">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Employee Code</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employe Code">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employee Name">
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Department</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Department">
                            </div>
                        </div>
                        <hr>
                        <div class="card-header">
                            <center><h4>Loan List of Employee!!!</h4></center><hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Employee Code</th>
                                    <th>Employee Name</th>
                                    <th>Department</th>
                                    <th>Loan</th>
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
                                            <h4 class="modal-title">Edit Loan Structure</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Employee Code</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employe Code">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Employee Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employee Name">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Department</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Department">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Permitted By</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Permitted By">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Loan Purpose</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Loan Purpose">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Approve Date</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="datepicker_start2" class="form-control form-control-success" id="inputSuccess1" placeholder="Approve Date">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Repayment Date</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="datepicker_end2" class="form-control form-control-success" id="inputSuccess1" placeholder="Approve Date">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Amount</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Amount">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Interest Percentage</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Interest Percentage">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Installment Period </label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Installment Period in Month">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Repayment Total</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Repayment Total ">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Installment</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Installment">
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
</div>

@endsection
@section('footer')
    @parent
    <script>


    </script>
@endsection
