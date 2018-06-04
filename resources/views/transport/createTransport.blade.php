@extends('layout.app')
@section('title', 'Add Transport')
@section('header')
    @parent
    <link rel="stylesheet" type="text/css" href="/files/bower_components/spectrum/css/spectrum.css" />
    <link rel="stylesheet" type="text/css" href="/files/bower_components/jquery-minicolors/css/jquery.minicolors.css" />
@endsection
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
        <h5 class="m-b-10">Manage Transport</h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Create Transport</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="markEntry" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="code" class="form-control form-control-success" placeholder="Vehicle Code" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="name" class="form-control form-control-success" placeholder="Vehicle Name" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="route" class="form-control form-control-success" placeholder="Route Name" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="goTime" class="form-control form-control-success" placeholder="Going Time" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="returnTime" class="form-control form-control-success" placeholder="Return Time" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="color" class="form-control demo" placeholder="Vehicle Color" data-position="top right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" id="addressType" class="form-control form-control-success" placeholder="col">
                            </div>
                            <div class="col">
                                <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                            </div>
                            <div class="col-sm-4">
                                <button id="submitClassInfo" class="form-control form-bg-primary">Create</button>
                            </div>
                        </div><hr>
                        <center> <h4>Vehicle Settings List!!!</h4></center><hr>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Vehicle Code</th>
                                    <th>Vehicle Name</th>
                                    <th>Route Name</th>
                                    <th>Cost Per Person</th>
                                    <th>Going Time</th>
                                    <th>Return Time</th>
                                    <th>Vehicle Color</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>414
                                    </td>
                                    <td>Eagle
                                    </td>
                                    <td>42
                                    </td>
                                    <td>300
                                    </td>
                                    <td>8.30
                                    </td>
                                    <td>9.15
                                    </td>
                                    <td>Red
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
                                            <h4 class="modal-title">Edit your building settings</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="code" class="form-control form-control-success" placeholder="Vehicle Code" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="name" class="form-control form-control-success" placeholder="Vehicle Name" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="route" class="form-control form-control-success" placeholder="Route Name" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="cost" class="form-control form-control-success" placeholder="Cost Per Person" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="goTime" class="form-control form-control-success" placeholder="Going Time" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="returnTime" class="form-control form-control-success" placeholder="Return Time" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="color" class="form-control demo" placeholder="Vehicle Color" data-position="top right">
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
        <!-- </div> -->
    </div>
</div>
@endsection
@section('footer')
    @parent
    <script src="/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>
    <script src="/files/bower_components/datedropper/js/datedropper.min.js"></script>
    <script src="/files/bower_components/spectrum/js/spectrum.js"></script>
    <script src="/files/bower_components/jscolor/js/jscolor.js"></script>
    <script src="/files/bower_components/jquery-minicolors/js/jquery.minicolors.min.js"></script>
    <script src="/files/assets/pages/advance-elements/custom-picker.js"></script>
    <script>

        $( function() {
            $( "#goTime" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#returnTime" ).datepicker({
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




