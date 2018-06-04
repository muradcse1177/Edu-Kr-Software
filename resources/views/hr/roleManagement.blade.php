@extends('layout.app')
@section('title', 'Role Management')
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
            <h5 class="m-b-10">Role Management</h5><hr>
            <form id="formRolManage">
            <div class="row">
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="hrall" type="checkbox">
                        <label for="hrall">
                            <h5> HR</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning ">
                        <input id="hrsingle1" name="1" value="1" type="checkbox"  class="hr">
                        <label for="hrsingle1">
                            Designation Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="hrsingle2" name="1" value="2" type="checkbox"  class="hr">
                        <label for="hrsingle2">
                            Role Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="hrsingle3" name="1" value="3" type="checkbox"  class="hr">
                        <label for="hrsingle3">
                            Leave Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="hrsingle4" name="1" value="4" type="checkbox"  class="hr">
                        <label for="hrsingle4">
                            Account Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="hrsingle5" name="1" value="5" type="checkbox"  class="hr">
                        <label for="hrsingle5">
                            Pay Roll Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="hrsingle6" name="1" value="6" type="checkbox"  class="hr">
                        <label for="hrsingle6">
                            Tax Management
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="acaall" type="checkbox">
                        <label for="acaall">
                            <h5>Academic</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning ">
                        <input id="aca1" name="2" value="1" type="checkbox" class="aca">
                        <label for="aca1">
                            Academic Calender
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca1" name="2" value="2" type="checkbox"  class="aca">
                        <label for="aca1">
                            Class Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca1" name="2" value="3" type="checkbox"  class="aca">
                        <label for="aca1">
                            Course Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca1" name="2" value="4" type="checkbox"  class="aca">
                        <label for="aca1">
                            Class Routine
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca1" name="2" value="6" type="checkbox"  class="aca">
                        <label for="aca1">
                           Routine Management
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="teacherall" type="checkbox">
                        <label for="teacherall">
                            <h5>Teacher</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning ">
                        <input id="aca3" name="3" value="1" type="checkbox" class="teacher">
                        <label for="aca3">
                            Create New Profile
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca3" name="3" value="2" type="checkbox"  class="teacher">
                        <label for="aca3">
                            Show Teacher Profile
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca3" name="3" value="3" type="checkbox"  class="teacher">
                        <label for="aca3">
                            Attendance
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca3" name="3" value="4" type="checkbox"  class="teacher">
                        <label for="aca3">
                            Course Management
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="studentall" type="checkbox">
                        <label for="studentall">
                            <h5>Student</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning ">
                        <input id="aca2" name="4" value="1" type="checkbox" class="student">
                        <label for="aca2">
                            Create New Profile
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="4" value="2" type="checkbox"  class="student">
                        <label for="aca2">
                            Show Studence Profile
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="4" value="3" type="checkbox"  class="student">
                        <label for="aca2">
                            Attendance
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="4" value="4" type="checkbox"  class="student">
                        <label for="aca2">
                            Course Management
                        </label>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12s">
                    <hr>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="admission" type="checkbox">
                        <label for="admission">
                            <h5>Admission</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning ">
                        <input id="aca2" name="5" value="1" type="checkbox" class="admission">
                        <label for="aca2">
                            Manage Circular
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="5" value="2" type="checkbox"  class="admission">
                        <label for="aca2">
                            Applicant Profile
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="5" value="3" type="checkbox"  class="admission">
                        <label for="aca2">
                           User Panel
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="5" value="4" type="checkbox"  class="admission">
                        <label for="aca2">
                           Manage Applicant
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="exam" type="checkbox">
                        <label for="exam">
                            <h5>Examination</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning ">
                        <input id="aca2" name="6" value="1" type="checkbox" class="exam">
                        <label for="aca2">
                            Manage Exam Type
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="6" value="2" type="checkbox"  class="exam">
                        <label for="aca2">
                            Manage Grade
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="6" value="3" type="checkbox"  class="exam">
                        <label for="aca2">
                           Manage Exam
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="result" type="checkbox">
                        <label for="result">
                            <h5>Result</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="7" value="1" type="checkbox"  class="result">
                        <label for="aca2">
                            Manage Student Mark
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="7" value="2" type="checkbox"  class="result">
                        <label for="aca2">
                           Process Exam Result
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="notice" type="checkbox">
                        <label for="notice">
                            <h5>Noticeboard</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="7" value="3" type="checkbox"  class="notice">
                        <label for="aca2">
                           Manage Notice
                        </label>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12s">
                    <hr>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="fees" type="checkbox">
                        <label for="fees">
                            <h5>Fees</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="8" value="1" type="checkbox"  class="fees">
                        <label for="aca2">
                            Academic Fees Panel
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="8" value="2" type="checkbox"  class="fees">
                        <label for="aca2">
                            Absent/Late Fine Create
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="8" value="3" type="checkbox"  class="fees">
                        <label for="aca2">
                            Transaction Details
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="library" type="checkbox">
                        <label for="library">
                            <h5>Library</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="9" value="1" type="checkbox"  class="library">
                        <label for="aca2">
                           Barcode Generator
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="9" value="2" type="checkbox"  class="library">
                        <label for="aca2">
                            Assign Book
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="9" value="3" type="checkbox"  class="library">
                        <label for="aca2">
                            Return Book
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="9" value="4" type="checkbox"  class="library">
                        <label for="aca2">
                           Transaction Details
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="9" value="5" type="checkbox"  class="library">
                        <label for="aca2">
                           Book List
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="9" value="6" type="checkbox"  class="library">
                        <label for="aca2">
                           Library Fine Report
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="hostel" type="checkbox">
                        <label for="hostel">
                            <h5>Hostel</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="10" value="1" type="checkbox"  class="hostel">
                        <label for="aca2">
                          Add Hostel
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2"  name="10" value="2"  type="checkbox"  class="hostel">
                        <label for="aca2">
                           Room Allocate
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2"  name="10" value="3"  type="checkbox"  class="hostel">
                        <label for="aca2">
                           Terminate Student
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2"  name="10" value="4"  type="checkbox"  class="hostel">
                        <label for="aca2">
                           Student List
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2"  name="10" value="5"  type="checkbox"  class="hostel">
                        <label for="aca2">
                           Hostel Fess panel
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2"  name="10" value="6"  type="checkbox"  class="hostel">
                        <label for="aca2">
                          Transaction Details
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="transport"   type="checkbox">
                        <label for="transport">
                            <h5>Transport</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="11" value="2" type="checkbox"  class="transport">
                        <label for="aca2">
                          Add Transport
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="11" value="3" type="checkbox"  class="transport">
                        <label for="aca2">
                           Assign Vehicle
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="11" value="4" type="checkbox"  class="transport">
                        <label for="aca2">
                           Terminate Vehicle
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="11" value="5" type="checkbox"  class="transport">
                        <label for="aca2">
                           Transportation Details
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="11" value="6" type="checkbox"  class="transport">
                        <label for="aca2">
                           Transaction Details
                        </label>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12s">
                    <hr>
                </div>
                <div class="col-lg-3 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="sms" type="checkbox">
                        <label for="sms">
                            <h5>Message/SMS</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="12" value="1" type="checkbox"  class="sms">
                        <label for="aca2">
                            Student
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="12" value="2"  type="checkbox"  class="sms">
                        <label for="aca2">
                            Teacher
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="12" value="3"  type="checkbox"  class="sms">
                        <label for="aca2">
                            Employee
                        </label>
                    </div><br>
                </div>
                <div class="col-lg-4 col-xl-12s">
                    <div class="checkbox-color checkbox-success">
                        <input id="web" type="checkbox">
                        <label for="web">
                            <h5>Website Management</h5>
                        </label>
                    </div><hr>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="13" value="1"  type="checkbox"  class="web">
                        <label for="aca2">
                            School Info
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="13" value="2" type="checkbox"  class="web">
                        <label for="aca2">
                            Slide Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="13" value="3" type="checkbox"  class="web">
                        <label for="aca2">
                            Principal Message
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="13" value="4" type="checkbox"  class="web">
                        <label for="aca2">
                           Noticeboard Management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="13" value="5" type="checkbox"  class="web">
                        <label for="aca2">
                           Calender management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="13" value="6" type="checkbox"  class="web">
                        <label for="aca2">
                           Gallery management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="13" value="7" type="checkbox"  class="web">
                        <label for="aca2">
                           Testimonial management
                        </label>
                    </div><br>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox-color checkbox-warning hr">
                        <input id="aca2" name="13" value="8" type="checkbox"  class="web">
                        <label for="aca2">
                           Teacher Info
                        </label>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12s">
                    <hr>
                </div>
                <div class="col-sm-12 col-xl-6 m-b-30">
                    <select id="designation" name="designation"  class="form-control " required>
                        <option value="">Select Designation</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="hidden" id="addressType" class="form-control " placeholder="col">
                </div>
                <div class="col">
                    <input type="hidden" id="studentId" class="form-control " placeholder="col">
                </div>
                <div class="col-sm-4">
                    <button id="submitClassInfo"  type="submit" class="form-control form-bg-primary">Add Role to Employee</button>
                </div><hr>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    @parent
<script>
    $("#hrall").click(function () {
        $('.hr').not(this).prop('checked', this.checked);
    });
    $("#acaall").click(function () {
        $('.aca').not(this).prop('checked', this.checked);
    });
    $("#teacherall").click(function () {
        $('.teacher').not(this).prop('checked', this.checked);
    });
    $("#studentall").click(function () {
        $('.student').not(this).prop('checked', this.checked);
    });
    $("#admission").click(function () {
        $('.admission').not(this).prop('checked', this.checked);
    });
    $("#exam").click(function () {
        $('.exam').not(this).prop('checked', this.checked);
    });
    $("#result").click(function () {
        $('.result').not(this).prop('checked', this.checked);
    });
    $("#notice").click(function () {
        $('.notice').not(this).prop('checked', this.checked);
    });
    $("#fees").click(function () {
        $('.fees').not(this).prop('checked', this.checked);
    });
    $("#library").click(function () {
        $('.library').not(this).prop('checked', this.checked);
    });
    $("#hostel").click(function () {
        $('.hostel').not(this).prop('checked', this.checked);
    });
    $("#transport").click(function () {
        $('.transport').not(this).prop('checked', this.checked);
    });
    $("#sms").click(function () {
        $('.sms').not(this).prop('checked', this.checked);
    });
    $("#web").click(function () {
        $('.web').not(this).prop('checked', this.checked);
    });
    function loadDesignation() {
        $.ajax({
            url: '/api/listDesignationNames',
            type: 'POST',
            success: function (response) {
                data = response.data;
                for (i = 0; i < data.length; i++) {
                    $('#designation').append($('<option>', {
                        value: data[i].designationName,
                        text: data[i].designationName
                    }));
                }
            }
        });
    }
    $(document).ready(function(){
        loadDesignation();
        $("#formRolManage").validate({

            submitHandler: function(form) {
                var data = JSON.stringify( $(form).serializeArray() );
                var designation = $('#designation').find(":selected").val();
                var fullJson = "{\"designation\": \"" +designation+ "\", \"role\": " + data + "}";
                $.ajax({
                    url: '/api/insertRoleEmp',
                    type: 'POST',
                    data: fullJson,
                    dataType:'json',
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                        }

                    }
                });

                return false;

            }
        });
    });
</script>
@endsection





