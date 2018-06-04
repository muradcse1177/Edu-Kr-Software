@extends('layout.app')
@section('title', 'Exam Management')
@section('header')
    @parent
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
            <center><h5 class="m-b-10">Examination Management </h5></center><hr>
            <form id="formExamDetails">
                <form id="examinationSetup">
                    <div class="row">
                        <div class="col-sm-12 col-xl-4 m-b-30">
                            <select name="acaSession" id="acaSession" class="form-control ">
                                <option value="">Select Session</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xl-4 m-b-30">
                            <select name="examName" id="examName2" class="form-control ">
                                <option value="">Select Exam</option>
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
                        <div class="col-sm-3">
                            <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </form>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xl-4 m-b-30">
                    <button class="form-control btn btn-primary" data-toggle="modal" data-target="#class-exam" data-toggle="tooltip"   data-placement="top" >Examination Setup</button>
                </div>
                <div class="col-sm-12 col-xl-4 m-b-30">
                    <button class="form-control btn btn-primary" data-toggle="modal" data-target="#class-exam-marks" data-toggle="tooltip"   data-placement="top" >Examination Marks Setup</button>
                </div>
                <div class="col-sm-12 col-xl-4 m-b-30">
                    <button class="form-control btn btn-primary" data-toggle="modal" data-target="#class-exam-time" data-toggle="tooltip"   data-placement="top" >Examination Time Setup</button>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <center><h5>Exam List and Its Correspondent Settings</h5></center><hr>
                <table id="examGradeList" class="table table-bordered">


                </table>
            </div>
            <div class="modal fade" id="confirm-setting" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Examination Management</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center><h5 class="modal-title">Edit Marks Distribution.</h5></center>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table id="subjectMark" class="table table-striped table-bordered">

                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="class-exam" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Examination Management</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="examinationSetup">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="sessionName" id="sessionName" class="form-control ">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="examName" id="examName" class="form-control ">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="className" id="className" class="form-control ">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="courseCode" id="courseCode" class="form-control courseCode">

                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="class-exam-marks" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Examination Management</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="examinationMarkSetup">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="className" id="className1" class="form-control ">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="courseCode" id="courseCode1" class="form-control courseCode">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="fullMarks" name="fullMarks" class="form-control " value=""  placeholder="Full Marks">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="written" name="written" class="form-control " value="" placeholder="Written Marks">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="objective" name="objective" class="form-control " value="" placeholder="Objective Marks" >
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="practical" name="practical" class="form-control " value="" placeholder="Practical Marks">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="ct" name="ct" class="form-control " value="" placeholder="CT Marks">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="attendance" name="attendance" class="form-control " value="" placeholder="Attendance Marks">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="sar" name="sar" class="form-control " value="" placeholder="SAR Marks">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="ca" name="ca" class="form-control " value="" placeholder="CA Marks">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="assesment" name="assesment" class="form-control " value="" placeholder="Assesment Marks">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="class-exam-time" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Examination Management</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="examinationTimeSetup">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="sessionName" id="sessionName1" class="form-control ">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="examName" id="examName1" class="form-control ">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="className" id="className2" class="form-control ">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="courseCode" id="courseCode2" class="form-control ">

                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="examDate" name="date" class="form-control " value=""  placeholder="Exam Date">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="startTime" name="startTime" class="form-control " value=""  placeholder="Start Time">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="endTime" name="endTime" class="form-control " value=""  placeholder="End Time">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input  id="roomNo" name="roomNo" class="form-control " value=""  placeholder="Room No.">
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select name="teacherId" id="teacherId" class="form-control ">

                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <input  type="hidden" id="examId" name="examId" class="form-control " value="" placeholder="">
                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="examTimeTableModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Examination Management</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center><h5 class="modal-title">Edit Examination Time.</h5></center>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="examTimeTable" class="table table-striped ">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="class-update1" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit your examination structure</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="examinationSetup">
                            <div class="row">
                                <div class="col-sm-12 col-xl-6 m-b-30">
                                    <select name="sessionName" id="sessionName3" class="form-control ">

                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-6 m-b-30">
                                    <select name="examName" id="examName3" class="form-control ">

                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-6 m-b-30">
                                    <select name="className" id="className3" class="form-control ">

                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-6 m-b-30">
                                    <select name="courseCode" id="courseCode3" class="form-control ">

                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
    <script>

        function getSessionist() {
            $.ajax({
                url: '/api/listSession',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Session</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['sessionName'] + '\">'+ data[i]['sessionName'] + '</option>';

                    }
                    $('#sessionName,#sessionName1,#acaSession').html(selectBody);
                }
            });
        }
        function teachetIdSearch() {
            $.ajax({
                url: '/api/teacherList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Teacher</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['employeeId'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    console.log(selectBody);
                    $('#teacherId').html(selectBody);
                }
            });
        }
        function getExamist() {
            $.ajax({
                url: '/api/examList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Exam Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['examName'] + '\">'+ data[i]['examName'] + '</option>';

                    }
                    $('#examName').html(selectBody);
                }
            });
        }
        function getClassName() {
            $.ajax({
                url: '/api/getClassName',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Class</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        var classValue = data[i]['classNum'];
                        switch (classValue) {
                            case 1:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">One</option>';
                                break;
                            case 2:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Two</option>';
                                break;
                            case 3:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Three</option>';
                                break;
                            case 4:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Four</option>';
                                break;
                            case 5:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Five</option>';
                                break;
                            case 6:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Six</option>';
                                break;
                            case 7:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Seven</option>';
                                break;
                            case 8:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Eight</option>';
                                break;
                            case 9:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Nine</option>';
                                break;
                            case 10:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Ten</option>';
                                break;
                            case 11:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Eleven</option>';
                                break;
                            case 12:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Twelve</option>';
                                break;
                        }
                        // selectBody += '<option value=\"' + data[i]['classNum'] + '\">'+ data[i]['classNum'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#className,#className1').html(selectBody);
                }
            });
        }
        $('#className').on('change', function() {
            var className =  $('#className').val();
            var fullJson = "{\"class\": \"" +className+ "\"}";

            //console.log(fullJson);
            $.ajax({
                url: '/api/getCourseList',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Subject Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['code'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#courseCode').html(selectBody);
                }
            });
        });
        $('#className1').on('change', function() {
            var className =  $('#className1').val();
            var fullJson = "{\"class\": \"" +className+ "\"}";

            //console.log(fullJson);
            $.ajax({
                url: '/api/getCourseList',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Subject Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['code'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#courseCode1').html(selectBody);
                }
            });
        });

        $('#className2').on('change', function() {
            var className =  $('#className2').val();
            var fullJson = "{\"class\": \"" +className+ "\"}";

            //console.log(fullJson);
            $.ajax({
                url: '/api/getCourseList',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Subject Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['code'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#courseCode2').html(selectBody);
                }
            });
        });
        $('#sessionName1').on('change', function() {
            var sessionName =  $('#sessionName1').val();
            var fullJson = "{\"sessionName\": \"" +sessionName+ "\"}";

            //console.log(fullJson);
            $.ajax({
                url: '/api/getExamNameList',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Exam Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['examName'] + '\">'+ data[i]['examName'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#examName1').html(selectBody);
                }
            });
        });
        $('#acaSession').on('change', function() {
            var sessionName =  $('#acaSession').val();
            var fullJson = "{\"sessionName\": \"" +sessionName+ "\"}";
            $.ajax({
                url: '/api/getExamNameList',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Exam Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['examName'] + '\">'+ data[i]['examName'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#examName2').html(selectBody);
                }
            });
        });

        $('#examName1').on('change', function() {
            var sessionName =  $('#sessionName1').val();
            var examName =  $('#examName1').val();
            var fullJson = "{\"sessionName\": \"" +sessionName+ "\", \"examName\": \"" + examName + "\"}";
            //console.log(fullJson);
            $.ajax({
                url: '/api/getclassNameList',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Class Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        var classValue = data[i]['class'];
                        switch (classValue) {
                            case 1:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">One</option>';
                                break;
                            case 2:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Two</option>';
                                break;
                            case 3:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Three</option>';
                                break;
                            case 4:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Four</option>';
                                break;
                            case 5:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Five</option>';
                                break;
                            case 6:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Six</option>';
                                break;
                            case 7:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Seven</option>';
                                break;
                            case 8:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Eight</option>';
                                break;
                            case 9:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Nine</option>';
                                break;
                            case 10:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Ten</option>';
                                break;
                            case 11:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Eleven</option>';
                                break;
                            case 12:
                                selectBody += '<option value=\"' + data[i]['class'] + '\">Twelve</option>';
                                break;
                        }
                        // selectBody += '<option value=\"' + data[i]['classNum'] + '\">'+ data[i]['classNum'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#className2').html(selectBody);

                }
            });
        });
        $('#courseCode2').on('change', function() {
            var courseCode =  $('#courseCode2').val();
            var sessionName =  $('#sessionName1').val();
            var className =  $('#className2').val();
            var examName =  $('#examName1').val();
            var fullJson = "{\"sessionName\": \"" +sessionName+ "\", \"examName\": \"" + examName + "\", \"courseCode\": \"" + courseCode +  "\", \"className\": \"" + className + "\"}";

            //console.log(fullJson);
            $.ajax({
                url: '/api/getExamId',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    $('#examId').val(data[0]['examId']);
                }
            });
        });
        $(document).ready(function(){
            getSessionist();
            getExamist();
            getClassName();
            teachetIdSearch();
            $("#formExamDetails").validate({
                rules: {
                    acaSession: "required",
                    examName: "required",
                    classname: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/showGradeListGroup',
                        type: 'POST',
                        data: new FormData($("#formExamDetails")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            length = data.length;
                            if(!$.trim(data)){
                                $('#examGradeList').html("No data found.Please try again.");
                            }
                            else{
                                var tbody= "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Class</th>" +
                                    " <th>Exam Name</th>" +
                                    " <th>Action</th>" +
                                    " </tr>" +
                                    " </thead>"+
                                    "<tbody>"+
                                    "</tbody>";
                                for(var i=0; i<data.length; i++)
                                {
                                    tbody += "<tr>";
                                    tbody += "<td>"+ (i+1) +"</td>";
                                    tbody += "<td>"+data[i]['class']+"</td>";
                                    className = data[i]['class'];
                                    sessionName=data[i]['sessionName'];
                                    examName=data[i]['examName'];
                                    tbody += "<td>"+data[i]['examName']+"</td>";
                                    tbody += "<td>" +'<div class="animation-model">\n' +
                                        '                                <button type="button" class="" data-toggle="modal" onclick=" editExamInfo(this.id);" id="'+ data[i]['class'] +'" name="'+this.id+'"  data-toggle="tooltipManage"   data-placement="top" title="Manage course marks this exam">\n' +
                                        '                                    <i class="fa fa-gears"></i>\n' +
                                        '                                </button>\n' +
                                        '                                <button type="button" class="" data-toggle="modal" onclick=" editExamDateTime(this.id,sessionName,examName);" id="'+ data[i]['class'] +'" name="'+this.id+'"data-target="#class-time" data-toggle="tooltip"   data-placement="top" title="Set exam time">\n' +
                                        '                                    <i class="fa fa-clock-o"></i>\n' +
                                        '                                </button>\n' +
                                        '                                <button type="button" class="" data-toggle="modal" data-target="#class-update" data-toggle="tooltip"   data-placement="top" title="Edit">\n' +
                                        '                                    <i class="fa fa-edit"></i>\n' +
                                        '                                </button>\n' +
                                        '                                <button type="button" class="" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip"   data-placement="top" title="Delete">\n' +
                                        '                                    <i class="fa fa-trash"></i>\n' +
                                        '                                </button>\n' +
                                        '\n' +
                                        '                            </div>' +
                                        "</td>";
                                    tbody += "</tr>";
                                }
                                $('#examGradeList').html(tbody);
                            }
                        }
                    });
                    return false;
                }
            });
            $("#examinationSetup").validate({
                rules: {
                    courseCode: "required",
                    examName: "required",
                    sessionName: "required",
                    classname: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertExaminationSetup',
                        type: 'POST',
                        data: new FormData($("#examinationSetup")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#class-exam').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#class-exam').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#examinationMarkSetup").validate({
                rules: {
                    courseCode: "required",
                    className: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertExaminationMarksSetup',
                        type: 'POST',
                        data: new FormData($("#examinationMarkSetup")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#class-exam-marks').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#class-exam-marks').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#examinationTimeSetup").validate({
                rules: {
                    courseCode: "required",
                    className: "required",
                    date: "required",
                    startTime: "required",
                    roomNo: "required",
                    endTime: "required",
                    TeacherName: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertExaminationTimeSetup',
                        type: 'POST',
                        data: new FormData($("#examinationTimeSetup")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#class-exam-time').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#class-exam-time').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

        });

        $( function() {
            $( "#examDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat:"yy-mm-dd"
            });
        } );
    </script>

    <script>
        function editExamInfo(i) {
            var className = i;
            window.location.href = "/api/showSubjectListResult?className="+className;
        }
        function editExamDateTime(i,j,k){
            var className = i;
            var sessionName = j;
            var examName = k;
            window.location.href = "/api/showExamDateTime?className="+className+'&sessionName='+sessionName+'&examName='+examName;
        }
        // function editExamDateTime(i,j,k){
        //     var className = i;
        //     var sessionName = j;
        //     var examName = k;
        //     var fullJson = "{\"className\": \"" +className+ "\",\"sessionName\": \"" + sessionName + "\",\"examName\": \"" + examName + "\"}";
        //     $.ajax({
        //         url: '/api/showExamDateTime',
        //         type: 'POST',
        //         data: fullJson,
        //         dataType:'json',
        //         success: function (response) {
        //             data = response.data;
        //             console.log(data);
        //             length = data.length;
        //             if ($.trim(data)) {
        //                 var tbody = "<thead> " +
        //                     "<tr> " +
        //                     "<th>SL. No</th>" +
        //                     " <th>Class Name</th>" +
        //                     " <th>Sub Name</th>" +
        //                     " <th>Sub Code</th>" +
        //                     " <th>Exam date</th>" +
        //                     " <th>Start Time</th>" +
        //                     " <th>End Time</th>" +
        //                     " <th>Room</th>" +
        //                     " <th>Teacher Name</th>" +
        //                     " <th style='display:none;'>Class Name</th>" +
        //                     " </tr>" +
        //                     " </thead>" +
        //                     "<tbody>" +
        //                     "</tbody>";
        //                 for (var i = 0; i < data.length; i++) {
        //                     tbody += "<tr>";
        //                     tbody += "<td >" + (i + 1) + "</td>";
        //                     tbody += "<td >" + data[i]['class'] + "</td>";
        //                     tbody += "<td>" + data[i]['name'] + "</td>";
        //                     tbody += "<td>" + data[i]['code'] + "</td>";
        //                     tbody += "<td>" + data[i]['date'] + "</td>";
        //                     tbody += "<td>" + data[i]['startTime'] + "</td>";
        //                     tbody += "<td>" + data[i]['endTime'] + "</td>";
        //                     tbody += "<td>" + data[i]['roomNo'] + "</td>";
        //                     tbody += "<td>" + data[i]['TeacherName'] + "</td>";
        //                     tbody += "<td style=\"display:none;\">" + data[i]['id'] + "</td>";
        //                     tbody += "</tr>";
        //                 }
        //                 console.log(tbody);
        //                 $('#examTimeTable').html(tbody);
        //                 $("#examTimeTableModal").modal('show');
        //                 $('#examTimeTable').Tabledit({
        //                     url: '/api/updateExamDateTime',
        //                     deleteButton: true,
        //                     columns: {
        //                         identifier: [9, 'id'],
        //                         editable: [[1, 'class'], [2, 'name'], [3, 'code'], [4, 'date'], [5, 'startTime'], [6, 'endTime'], [7, 'roomNo'], [8, 'TeacherName']]
        //                     },
        //                     onSuccess: function (data, textStatus, jqXHR) {
        //                         if (typeof data.successMsg !== 'undefined') {
        //                             notify('success', data.successMsg);
        //                         }
        //                         if (typeof data.errorMsg !== 'undefined') {
        //                             notify('danger', data.errorMsg);
        //                         }
        //                     },
        //                 });
        //             }
        //             else {
        //                 $("#examTimeTableModal").modal('show');
        //                 $('#examTimeTable').html("No data found.Please try again.");
        //             }
        //
        //         }
        //     });
        //
        //     return false;
        // }
    </script>

    <script src="/files/assets/pages/edit-table/jquery.tabledit.js"></script>
@endsection
