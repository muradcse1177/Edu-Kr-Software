@extends('layout.app')
@section('title', 'Show Student Profile')
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
        <h5 class="m-b-10">Select Your Estimate Students Profile</h5>
        <hr>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 col-xl-3 m-b-30">
                    <select name="select" class="form-control ">
                        <option value="opt1">Select Absent or Present</option>
                        <option value="opt2">Type 2</option>
                        <option value="opt3">Type 3</option>
                    </select>
                </div>
                <div class="col-sm-12 col-xl-3 m-b-30">
                    <input type="text" id="studentCode" name="studentCode" class="form-control " placeholder="Employee Code">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xl-3 m-b-30">
                    <input type="text" id="datepicker_start" class="form-control " placeholder="Start Date" >
                </div>
                <div class="col-sm-12 col-xl-3 m-b-30">
                    <input type="text" id="datepicker_end" class="form-control " placeholder="End Date" >
                </div>
            </div>
            <div class="dt-responsive table-responsive">
                <hr><center><h5>Attendance Report.</h5></center><hr>
                <table id="basic-btn" class="table table-striped table-bordered nowrap">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Stuff Code</th>
                        <th>Name</th>
                        <th>Number of Absent/Present</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1</th>
                        <td>23456</td>
                        <td>dsgs dsdgrh</td>
                        <td>4</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
    @parent
    <script>
        $( function() {
            $( "#datepicker_start" ).datepicker();
        } );
        $( function() {
            $( "#datepicker_end" ).datepicker();
        } );
    </script>
@endsection