@extends('layout.app')
@section('title', 'Attendance Report')
@section('content')
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-header table-card-header">
            <center> <h4>Employee Attendance Management</h4></center><hr>
        </div>
        <div class="card-block">
            {{--<form id="formSearchAttendance" >--}}
                {{ Form::open(array('url' => '/api/searchEmpAttendance')) }}
                <div class="row">
                    <div class="col-sm-12 col-xl-4 m-b-30">
                        <input type="text" id="employeeId" name="employeeId" class="form-control " placeholder="Employee ID">
                    </div>
                    <div class="col-sm-12 col-xl-4 m-b-30">
                        <input type="text" id="datepicker_start" name="datepicker_start" class="form-control " placeholder="Start Date" >
                    </div>
                    <div class="col-sm-12 col-xl-4 m-b-30">
                        <input type="text" id="datepicker_end" name="datepicker_end" class="form-control " placeholder="End Date" >
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="hidden" id="barCodeFinal" name="barCodeFinal" value="" class="form-control " placeholder="col">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" id="submitClassInfo" name="pdf" value="pdf" class="form-control form-bg-primary">Save Pdf</button>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" id="submitClassInfo" name="search"  value="search" class="form-control form-bg-primary">Search Attendance</button>
                    </div>
                </div>
            {{ Form::close() }}

        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                @if(isset($data))
                    @if(count($data)>0)
                        <div class="card-header">
                            <hr><center><h4>Attendance Details are given below.</h4></center><hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>EmployeeId</th>
                                    <th>Name</th>
                                    <th>Attendance</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$datas->date}}</td>
                                        <td>{{$datas->employeeId}}</td>
                                        <td>{{$datas->name}}</td>
                                        <td>{{$datas->attendance}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="card-header">
                            <hr><center><h4>No Data Found!Please Try Later.</h4></center><hr>
                        </div>
                    @endif
                @endif
                <div id="wellSummary">

                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@section('footer')
    @parent
    <script type="text/javascript" class="init">

        $( "#datepicker_start" ).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
            dateFormat: "yy-mm-dd",

        });
        $( "#datepicker_end" ).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
            dateFormat: "yy-mm-dd",

        });
    </script>
@endsection
