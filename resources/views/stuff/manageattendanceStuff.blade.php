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
            <h5 class="m-b-10">Select Your Class for Attendance</h5>
            <hr>
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <input type="text" id="datepicker_att" class="form-control " placeholder="Select Date" >
                    </div>
                </div>
                <div class="dt-responsive table-responsive">
                    <hr><center><h6>Click button for attendance.</h6></center><hr>
                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Stuff Code</th>
                            <th>Name</th>
                            <th>Absent</th>
                            <th>Present</th>
                            <th>Late</th>
                            <th>Leave</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>1255</td>
                            <td>sdf vgs</td>
                            <td>
                                <div class="checkbox-color checkbox-danger">
                                    <input id="checkbox1" type="checkbox" >
                                    <label for="checkbox1">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-color checkbox-success">
                                    <input id="checkbox2" type="checkbox" >
                                    <label for="checkbox2">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-color checkbox-primary">
                                    <input id="checkbox3" type="checkbox" >
                                    <label for="checkbox3">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-color checkbox-info">
                                    <input id="checkbox4" type="checkbox" >
                                    <label for="checkbox4">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1255</td>
                            <td>sdf vgs</td>
                            <td>
                                <div class="checkbox-color checkbox-danger">
                                    <input id="checkbox5" type="checkbox" >
                                    <label for="checkbox5">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-color checkbox-success">
                                    <input id="checkbox6" type="checkbox" >
                                    <label for="checkbox6">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-color checkbox-primary">
                                    <input id="checkbox7" type="checkbox" >
                                    <label for="checkbox7">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-color checkbox-info">
                                    <input id="checkbox8" type="checkbox" >
                                    <label for="checkbox8">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div  class="col-sm-12 col-xl-3 m-b-30">
                        <button  id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                    </div>

                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <button  class="form-control form-bg-primary">
                            Send SMS To Absent
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
        <script>
        $( function() {
            $( "#datepicker_att" ).datepicker();
        } );

    </script>
@endsection
