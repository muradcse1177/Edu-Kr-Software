@extends('layout.app')
@section('title', 'Mark Management')
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
        <h5 class="m-b-10">Manage Student Mark</h5>
        <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Mark entry</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#showResult" role="tab"><i class="icofont icofont-ui-message"></i>Show/edit Mark Details</a>
                            <div class="slide"></div>
                        </li>

                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane " id="showResult" role="tabpanel">
                            {{ Form::open(array('url' => '/api/showStudentListForMarkEdit','method' => 'post')) }}
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="acaSession1" name="acaSession" class="form-control" >
                                        <option value="">Select Session</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="medium1" name="medium" class="form-control" >
                                        <option value="">Medium</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="version1" name="version" class="form-control" >
                                        <option value="">Version</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="shift1" name="shift" class="form-control" >
                                        <option value="">Shift</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="class1" name="class" class="form-control" >
                                        <option value="">Class</option>
                                    </select>
                                </div>
                                <div id="idsection" class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="section1" name="section" class="form-control" >
                                        <option value="">Section</option>
                                    </select>
                                </div>
                                <div id="divGroup" class="col-sm-12 col-xl-3 m-b-30" style="display: block;">
                                    <select id="group1" name="group" class="form-control" >
                                        <option value="">Group</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select name="examName" id="examName1" class="form-control ">
                                        <option value="">Select Exam Name</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select name="courseCode" id="courseCode1" class="form-control ">
                                        <option value="">Select Subject</option>
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
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Info</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                        <div class="tab-pane active" id="markEntry" role="tabpanel">
                            @if(isset($returnInfo))
                                <div class="well"><center><h3 style="color:green">{{$returnInfo}}</h3></center></div>
                            @endif
                            {{ Form::open(array('url' => '/api/showStudentListForMarkEntry','method' => 'post')) }}
                                <div class="row">
                                    @include('common.studentClassInfo')
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <select name="examName" id="examName" class="form-control " required>
                                            <option value="">Select Exam Name</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <select name="courseCode" id="courseCode" class="form-control " required>
                                            <option value="">Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <button type="submit" name="marksheet" value="marksheet" id="submitClassInfo" class="form-control form-bg-primary">Generate Mark Sheet</button>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" name="search" value="search" id="submitClassInfo" class="form-control form-bg-primary">Search Info</button>
                                    </div>
                                </div>
                            {{Form::close()}}
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <a href="{{ route('xlsDownload',['download'=>'pdf']) }}"><button style="display: none;" class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_group" data-placement="top" >
                                            Generate Excel Type</button></a>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <a href="{{ route('xlsDownload',['download'=>'pdf']) }}"><button class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_group" data-placement="top" >
                                            Generate Excel Type</button></a>
                                </div>
                            </div>
                            <form id="fileUP">
                                <div class="form-group has-success row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="inputSuccess1"> Import Result Sheet(Only xlsx):</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" name="file" class="form-control " id="file" placeholder="Enter Fees Name">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Upload File</button>
                                    </div>
                                </div>
                            </form><hr>
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
                    $('#acaSession1').html(selectBody);
                }
            });
        }
        $("#acaSession1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            $.ajax({
                url: '/api/listMedium',
                type: 'POST',
                data:{selectedSession: selectedSession},
                success: function (response) {
                    data = response.data;
                    $('#medium1').find('option').remove();
                    if(data.length>0) {
                        $('#medium1').append($('<option>', {
                            value: "",
                            text: "Select Medium"
                        }));
                    }
                    else{
                        $('#medium1').append($('<option>', {
                            value: "",
                            text: "No Medium Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#medium1').append($('<option>', {
                            value: data[i].mediumName,
                            text: data[i].mediumName
                        }));
                        //$('table').append("<tr class='tr'> <td> "+data[i].name+"</td> <td> "+data[i].email+"</td> </tr>" );
                    }

                }
            });
        });
        $("#medium1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            $.ajax({
                url: '/api/listVersion',
                type: 'POST',
                data:{selectedMedium: selectedMedium, selectedSession: selectedSession},
                success: function (response) {
                    data = response.data;
                    // $('.tr').remove();
                    $('#version1').find('option').remove();
                    if(data.length>0) {
                        $('#version1').append($('<option>', {
                            value: "",
                            text: "Select Version"
                        }));
                    }
                    else{
                        $('#version1').append($('<option>', {
                            value: "",
                            text: "No Version Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#version1').append($('<option>', {
                            value: data[i].versionName,
                            text: data[i].versionName
                        }));
                        //$('table').append("<tr class='tr'> <td> "+data[i].name+"</td> <td> "+data[i].email+"</td> </tr>" );
                    }

                }
            });
        });
        $("#version1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            var selectedVersion = $('#version1').find(":selected").val();
            $.ajax({
                url: '/api/listShift',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion},
                success: function (response) {
                    data = response.data;
                    // $('.tr').remove();
                    $('#shift1').find('option').remove();
                    if(data.length>0) {
                        $('#shift1').append($('<option>', {
                            value: "",
                            text: "Select Shift"
                        }));
                    }
                    else{
                        $('#shift1').append($('<option>', {
                            value: "",
                            text: "No shift Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#shift1').append($('<option>', {
                            value: data[i].shiftName,
                            text: data[i].shiftName
                        }));
                    }

                }
            });
        });
        //get class list
        $("#shift1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            var selectedVersion = $('#version1').find(":selected").val();
            var selectedShift = $('#shift1').find(":selected").val();
            $.ajax({
                url: '/api/listClass',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion, selectedShift: selectedShift},
                success: function (response) {
                    data = response.data;
                    // $('.tr').remove();
                    $('#class1').find('option').remove();
                    if(data.length>0) {
                        $('#class1').append($('<option>', {
                            value: "",
                            text: "Select Class"
                        }));
                    }
                    else{
                        $('#class1').append($('<option>', {
                            value: "",
                            text: "No class Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#class1').append($('<option>', {
                            value: data[i].classNum,
                            text: data[i].classNum
                        }));
                    }

                }
            });
        });
        $("#class1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            var selectedVersion = $('#version1').find(":selected").val();
            var selectedShift = $('#shift1').find(":selected").val();
            var selectedClass = $('#class1').find(":selected").val();
            var needGrouping = false;
            if(selectedClass>=9) {
                $('#divGroup').show();
                needGrouping = true;
            }
            else $('#divGroup').hide();
            $.ajax({
                url: '/api/listSection',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion, selectedShift: selectedShift, selectedClass: selectedClass},
                success: function (response) {
                    data = response.data;
                    // $('.tr').remove();
                    $('#section1').find('option').remove();
                    if(data.length>0) {
                        $('#section1').append($('<option>', {
                            value: "",
                            text: "Select Section"
                        }));
                    }
                    else{
                        $('#section1').append($('<option>', {
                            value: "",
                            text: "No Section Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#section1').append($('<option>', {
                            value: data[i].sectionName,
                            text: data[i].sectionName
                        }));
                    }

                }
            });
            if(needGrouping){
                loadGroup1();
            }

        });
        $("#section1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            var selectedVersion = $('#version1').find(":selected").val();
            var selectedShift = $('#shift1').find(":selected").val();
            var selectedClass = $('#class1').find(":selected").val();
            var selectedSection = $('#section1').find(":selected").val();
            $.ajax({
                url: '/api/findClassId',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion,
                    selectedShift: selectedShift, selectedClass: selectedClass, selectedSection:selectedSection},
                success: function (response) {
                    data = response.data;

                    if($('#course').length > 0)
                        loadSubjectList();
                }
            });
        });
        function loadGroup1(){
            $.ajax({
                url: '/api/listGroup',
                type: 'POST',
                //data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion, selectedShift: selectedShift, selectedClass: selectedClass},
                success: function (response) {
                    data = response.data;
                    $('#group1').find('option').remove();
                    if(data.length>0) {
                        $('#group1').append($('<option>', {
                            value: "",
                            text: "Select Group"
                        }));
                    }
                    else{
                        $('#group1').append($('<option>', {
                            value: "",
                            text: "No Group Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#group1').append($('<option>', {
                            value: data[i].groupName,
                            text: data[i].groupName
                        }));
                    }
                }
            });
        }
        $( "#courseCode" ).click(function() {
            $.ajax({
                url: '/api/showSubjectList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Subejct Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['code'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    $('#courseCode').html(selectBody);
                    $("#courseCode").off("click");
                }
            });
        });
        $( "#examName" ).click(function() {
            var acaSession=  $('#acaSession').val();
            var className =  $('#class').val();
            $.ajax({
                url: '/api/showExamListResult',
                type: 'POST',
                data:{sessionName:acaSession,className:className},
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Exam Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['examName'] + '\">'+ data[i]['examName'] + '</option>';

                    }
                    $('#examName').html(selectBody);
                    $("#examName").off("click");
                }
            });
        });
        $( "#courseCode1" ).click(function() {
            $.ajax({
                url: '/api/showSubjectList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Subejct Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['code'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    $('#courseCode1').html(selectBody);
                    $("#courseCode1").off("click");
                }
            });
        });
        $( "#examName1" ).click(function() {
            var acaSession=  $('#acaSession1').val();
            var className =  $('#class1').val();

            console.log(acaSession);
            $.ajax({
                url: '/api/showExamListResult',
                type: 'POST',
                data:{sessionName:acaSession,className:className},
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Exam Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['examName'] + '\">'+ data[i]['examName'] + '</option>';

                    }
                    $('#examName1').html(selectBody);
                    $("#examName1").off("click");
                }
            });
        });
        $(document).ready(function(){
            getSessionist();
            $("#fileUP").validate({
                rules: {
                    file: {
                        required: true,
                        extension: "xlsx|xls|xlsm"
                    }
                },
                messages: {
                    file: {
                        file: "file .xlsx, .xlsm, .xls only.",
                        extension: "Please upload valid file formats .xlsx, .xlsm, .xls only."
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/resultFileUpload',
                        type: 'POST',
                        data: new FormData($("#fileUP")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
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



