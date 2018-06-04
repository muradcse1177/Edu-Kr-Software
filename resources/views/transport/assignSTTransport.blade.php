@extends('layout.app')
@section('title', 'Assign Transport')
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
        <h5 class="m-b-10">Transport Management</h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Allocate Vehicle</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="markEntry" role="tabpanel">
                        <center><h5 class="m-b-10">Information</h5></center>
                        <div class="row">
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="studentId" class="form-control form-control-success" placeholder="Unique Id" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="name" class="form-control form-control-success" placeholder="Name" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="class" class="form-control form-control-success" placeholder="Class" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="version" class="form-control form-control-success" placeholder="Version" >
                            </div>
                        </div>
                        <hr>
                        <center><h5 class="m-b-10">Transport Allocation</h5></center>
                        <div class="row">
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <select id="class" name="name" class="form-control form-control-success">
                                    <option value="">Transport Name</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <select id="floor" name="name" class="form-control form-control-success">
                                    <option value="">Select Route</option>
                                </select>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" id="addressType" class="form-control form-control-success" placeholder="col">
                            </div>
                            <div class="col">
                                <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                            </div>
                            <div class="col-sm-4">
                                <button id="submitClassInfo" class="form-control form-bg-primary">Allocate Transport</button>
                            </div>
                        </div><hr>
                        <center> <h4>Transport Allocation List!!!</h4></center>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Vehicle Name</th>
                                    <th>Route Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1245
                                    </td>
                                    <td>Student
                                    </td>
                                    <td>Murad
                                    </td>
                                    <td>Eagle
                                    </td>
                                    <td>2
                                    </td>
                                    <td>
                                        <div class="animation-model">
                                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#managenotice" data-toggle="tooltip"   data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip"   data-placement="top" title="Edit">
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
                                            <h4 class="modal-title">Edit Allocation settings</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <center><h5 class="m-b-10">Information</h5></center>
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="studentId" class="form-control form-control-success" placeholder="Unique Id" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="name" class="form-control form-control-success" placeholder="Name" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="class" class="form-control form-control-success" placeholder="Class" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="version" class="form-control form-control-success" placeholder="Version" >
                                                </div>
                                            </div>
                                            <hr>
                                            <center><h5 class="m-b-10">Transport Allocation</h5></center>
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <select id="class" name="name" class="form-control form-control-success">
                                                        <option value="">Transport Name</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <select id="floor" name="name" class="form-control form-control-success">
                                                        <option value="">Select Route</option>
                                                    </select>
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
        <!-- </div> -->
    </div>
@endsection
@section('footer')
    @parent
    <script>

        $( function() {
            $( "#aca_year" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#datepicker_start" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#datepicker_end" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#datepicker_start2" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#datepicker_end2" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );

    </script>
@endsection




