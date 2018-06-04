@extends('layout.app')
@section('title', 'Termination Transport')
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
        <h5 class="m-b-10">Terminate</h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Terminate Vehicle</a>
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
                        </div><hr>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" id="addressType" class="form-control form-control-success" placeholder="col">
                            </div>
                            <div class="col">
                                <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                            </div>
                            <div class="col-sm-4">
                                <button id="submitClassInfo" class="form-control form-bg-primary">Terminate</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
@section('footer')
    @parent

@endsection




