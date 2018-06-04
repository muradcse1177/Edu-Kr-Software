@extends('layout.app')
@section('title', 'Transportation Details')
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
                        <a class="nav-link active" data-toggle="tab" href="#noticeset" role="tab"><i class="icofont icofont-ui-message"></i>Transportation Details</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="noticeset" role="tabpanel">
                        <div class="form-radio m-b-30">
                            <form>
                                <div class="radio radiofill radio-success radio-inline">
                                    <label>
                                        <input type="radio" name="radio" id="student "checked="checked" onclick="myFunction()">
                                        <i class="helper"></i>Student
                                    </label>
                                </div>
                                <div class="radio radiofill radio-info radio-inline">
                                    <label>
                                        <input type="radio" name="radio" id="teacher" checked="checked" onclick="myFunction1()">
                                        <i class="helper"></i>Teacher
                                    </label>
                                </div>
                                <div class="radio radiofill radio-warning radio-inline">
                                    <label>
                                        <input type="radio" name="radio" checked="checked" onclick="myFunction2()">
                                        <i class="helper"></i>Officer
                                    </label>
                                </div>
                                <div class="radio radiofill radio-inverse radio-inline">
                                    <label>
                                        <input type="radio" name="radio" checked="checked" onclick="myFunction3()">
                                        <i class="helper"></i>Stuff
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div id="for_student" style="display: none;">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <div class="checkbox-color checkbox-success">
                                        <input id="checkbox16" type="checkbox" checked="">
                                        <label for="checkbox16">
                                            For All
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="medium" name="medium" class="form-control form-control-success">
                                        <option value="">Select Medium</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="session" name="session" class="form-control form-control-success">
                                        <option value="">Select Session</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="class"  name="class" class="form-control form-control-success">
                                        <option value="">Select Class</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="class" name="class" class="form-control form-control-success">
                                        <option value="">Select Group</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="shift" name="shift" class="form-control form-control-success">
                                        <option value="">Select Shift</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="version" name="version" class="form-control form-control-success">
                                        <option value="">Select Version</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="studentCode" class="form-control form-control-success" placeholder="Student Code">
                                </div>
                            </div>
                        </div>
                        <div id="for_teacher" style="display: none;">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <div class="checkbox-color checkbox-success">
                                        <input id="checkbox15" type="checkbox" checked="">
                                        <label for="checkbox15">
                                            For All
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="teacherCode" class="form-control form-control-success" placeholder="Teacher Code">
                                </div>
                            </div>
                        </div>
                        <div id="for_officer" style="display: none;">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <div class="checkbox-color checkbox-success">
                                        <input id="checkbox15" type="checkbox" checked="">
                                        <label for="checkbox15">
                                            For All
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="officerCode" class="form-control form-control-success" placeholder="Officer Code">
                                </div>
                            </div>
                        </div>
                        <div id="for_stuff" style="display: none;">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <div class="checkbox-color checkbox-success">
                                        <input id="checkbox15" type="checkbox" checked="">
                                        <label for="checkbox15">
                                            For All
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="stuffCode" class="form-control form-control-success" placeholder="Stuff Code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="publishdate" class="form-control form-control-success" placeholder="Start Date" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="enddate" class="form-control form-control-success" placeholder="End Date" >
                            </div>
                        </div>
                    </div>
                    <hr><center><h5 class="m-b-10">Transportation Details</h5></center><hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Vehicle Code</th>
                                <th>Vehicle Name</th>
                                <th>Route</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>178451
                                </td>
                                <td>ha haha
                                </td>
                                <td>488484
                                </td>
                                <td>sdfksdgfa
                                </td>
                                <td>2
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
            $( "#publishdate" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#enddate" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#publishdate1" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#enddate1" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("for_student");
            x.style.display = "block";
            var y = document.getElementById("for_teacher");
            y.style.display = "none";
            var y = document.getElementById("for_officer");
            y.style.display = "none";
            var y = document.getElementById("for_stuff");
            y.style.display = "none";
        }
        function myFunction1() {
            var x = document.getElementById("for_student");
            x.style.display = "none";
            var y = document.getElementById("for_teacher");
            y.style.display = "block";
            var y = document.getElementById("for_officer");
            y.style.display = "none";
            var y = document.getElementById("for_stuff");
            y.style.display = "none";
        }
        function myFunction2() {
            var x = document.getElementById("for_student");
            x.style.display = "none";
            var y = document.getElementById("for_teacher");
            y.style.display = "none";
            var y = document.getElementById("for_officer");
            y.style.display = "block";
            var y = document.getElementById("for_stuff");
            y.style.display = "none";
        }
        function myFunction3() {
            var x = document.getElementById("for_student");
            x.style.display = "none";
            var y = document.getElementById("for_teacher");
            y.style.display = "none";
            var y = document.getElementById("for_officer");
            y.style.display = "none";
            var y = document.getElementById("for_stuff");
            y.style.display = "block";
        }
        function myFunctionedit() {
            var x = document.getElementById("for_studentedit");
            x.style.display = "block";
            var y = document.getElementById("for_teacheredit");
            y.style.display = "none";
            var y = document.getElementById("for_officeredit");
            y.style.display = "none";
            var y = document.getElementById("for_stuffedit");
            y.style.display = "none";
        }
        function myFunctionedit1() {
            var x = document.getElementById("for_studentedit");
            x.style.display = "none";
            var y = document.getElementById("for_teacheredit");
            y.style.display = "block";
            var y = document.getElementById("for_officeredit");
            y.style.display = "none";
            var y = document.getElementById("for_stuffedit");
            y.style.display = "none";
        }
        function myFunctionedit2() {
            var x = document.getElementById("for_studentedit");
            x.style.display = "none";
            var y = document.getElementById("for_teacheredit");
            y.style.display = "none";
            var y = document.getElementById("for_officeredit");
            y.style.display = "block";
            var y = document.getElementById("for_stuffedit");
            y.style.display = "none";
        }
        function myFunctionedit3() {
            var x = document.getElementById("for_studentedit");
            x.style.display = "none";
            var y = document.getElementById("for_teacheredit");
            y.style.display = "none";
            var y = document.getElementById("for_officeredit");
            y.style.display = "none";
            var y = document.getElementById("for_stuffedit");
            y.style.display = "block";
        }
    </script>
@endsection



