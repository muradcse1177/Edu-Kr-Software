@extends('layout.app')
@section('title', 'Pay Slip Management')
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
                                <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Payslip Generate</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="feeslog" role="tabpanel">
                                @if(isset($info))
                                <center><h5 class="m-b-10" style="color:red;">{{ $info }}</h5></center>
                                <hr>
                                @endif
                                {{ Form::open(array('url' => 'api/htmltopdfSalary','method' => 'post')) }}
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Employee Code</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="employeeId" name="employeeId" class="form-control form-control-success"  placeholder="Employe ID" required>
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
                                            <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Generate Payslip</button>
                                        </div><hr>
                                    </div>
                                {{Form::close()}}
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


    </script>
@endsection


