@extends('layout.app')
@section('title', 'Add Salary')
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
            <h5 class="m-b-10">Role Management</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add New Salary Type</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#showSetting" role="tab"><i class="icofont icofont-ui-message"></i>Manage Salary Type</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="feeslog" role="tabpanel">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Salary Code</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Salary Code">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Salary Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Salary Name">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Salary Type</label>
                                </div>
                                <div class="col-sm-10">
                                    <select name="select" class="form-control ">
                                        <option value="opt1">Select Salary Type</option>
                                        <option value="opt2">Add</option>
                                        <option value="opt3">Deduct</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Default Amount</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Default Amount">
                                </div>
                            </div>
                             <hr>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                </div>
                                <div class="col">
                                    <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-4">
                                    <button id="submitClassInfo" class="form-control form-bg-primary">Create Salary Type</button>
                                </div><hr>
                            </div>
                        </div>
                        <div class="tab-pane" id="showSetting" role="tabpanel">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Salary Code</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Salary Code">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Salary Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Salary Name">
                                </div>
                            </div><hr>
                            <div class="card-header">
                                <center><h4>Salary Type List of Employee!!!</h4></center><hr>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Salary Code</th>
                                        <th>Salary Name</th>
                                        <th>Salary Type</th>
                                        <th>Default Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>2554411
                                        </td>
                                        <td>TA
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
                                                <h4 class="modal-title">Edit Salary Type Structure</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Salary Code</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Salary Code">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Salary Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Salary Name">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Salary Type</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <select name="select" class="form-control ">
                                                            <option value="opt1">Select Salary Type</option>
                                                            <option value="opt2">Add</option>
                                                            <option value="opt3">Deduct</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Default Amount</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Default Amount">
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
                    </div>
                </div>
            </div>
        </div>
 </div>
@endsection
@section('footer')
    @parent

@endsection





