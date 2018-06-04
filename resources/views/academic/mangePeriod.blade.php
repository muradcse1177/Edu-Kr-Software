@extends('layout.app')
@section('title', 'Routine Management)
@section('header')
    @parent
    <link href="/timepicker/css/timepicki.css" rel="stylesheet">
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
            <h5 class="m-b-10">Manage Class Routine</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Add Period</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#showPeriod" role="tab"><i class="icofont icofont-ui-message"></i>Show Period List</a>
                            <div class="slide"></div>
                        </li>

                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="markEntry" role="tabpanel">
                            <form id="formAddSubjectTime">
                                <div class="row">
                                    @include('common.studentClassInfo')
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <select id="day" name="day" class="form-control ">
                                            <option value="">Select Day</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <select id="subject" name="subject" class="form-control ">
                                            <option value=""> Select Subject</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                        <input type="text" id="startTime" name="startTime" class="form-control " placeholder="Start Time" >
                                    </div>
                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                        <input type="text" id="endTime" name="endTime" class="form-control " placeholder="End Time" >
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <select id="serial" name="serial" class="form-control ">
                                            <option value="">Select Class Serial</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <select id="teacherId" name="teacherId" class="form-control ">
                                            <option value=""> Select Teacher</option>
                                        </select>
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
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Info</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane " id="showPeriod" role="tabpanel">
                            <form id="formPerodList">
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
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <select id="section1" name="section" class="form-control" >
                                            <option value="">Section</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Info</button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <hr><center><h5> Period List </h5></center><hr>
                                <table id="tablePeroidList" class="table table-bordered">

                                </table>
                                <div class="modal fade" id="editPeriodList" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit your period structure</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editPeriodLisy">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="day1" name="day" class="form-control ">
                                                                <option value="">Select Day</option>
                                                                <option value="Saturday">Saturday</option>
                                                                <option value="Sunday">Sunday</option>
                                                                <option value="Monday">Monday</option>
                                                                <option value="Tuesday">Tuesday</option>
                                                                <option value="Wednesday">Wednesday</option>
                                                                <option value="Thursday">Thursday</option>
                                                                <option value="Friday">Friday</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="subject1" name="subject" class="form-control ">
                                                                <option value=""> Select Subject</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-6 m-b-30">
                                                            <input type="text" id="startTime1" name="startTime" class="form-control " placeholder="Start Time" >
                                                        </div>
                                                        <div class="col-sm-12 col-xl-6 m-b-30">
                                                            <input type="text" id="endTime1" name="endTime" class="form-control " placeholder="End Time" >
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="serial1" name="serial" class="form-control ">
                                                                <option value="">Select Class Serial</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="teacherId1" name="teacherId" class="form-control ">
                                                                <option value=""> Select Teacher</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" id="classId1" name="classId" class="form-control">
                                                        <input type="hidden" id="dbid" name="dbid" class="form-control">
                                                        <input type="hidden" id="dbiddel" name="dbid" class="form-control">
                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                                    </div>
                                                </form>
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
                                            <form id="formdeletePeriod">
                                                <div class="modal-footer">
                                                    <input type="hidden" id="dbiddel1" name="dbiddel" value="" class="form-control " placeholder="col">
                                                    <input type="hidden" id="classId2" name="classId" value="" class="form-control " placeholder="col">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                                </div>
                                            </form>
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
    <script src="/timepicker/js/timepicki.js"></script>
    <script>
        $('#startTime').timepicki();
        $('#endTime').timepicki();
        $('#startTime1').timepicki();
        $('#endTime1').timepicki();

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
        function loadAcademicSession1(){
            $.ajax({
                url: '/api/listSession',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    for(i=0; i<data.length; i++){
                        $('#acaSession1').append($('<option>', {
                            value: data[i].sessionName,
                            text : data[i].sessionName
                        }));
                    }
                }
            });
        }

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
                loadGroup();
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
        function editPeriodList(i,j){

            $("#dbid").val(data[i]['id']);
            $("#day1").val(data[i]['day']);
            $("#classId1").val(j);
            subject = data[i]['name'];

            $("#serial1").val(data[i]['serial']);
            $("#startTime1").val(data[i]['startTime']);
            $("#endTime1").val(data[i]['endTime']);

            var fullJson = "{\"classId\": \"" +j+ "\"}";
            //console.log(fullJson);
            $.ajax({
                url: '/api/showSubListForPeriod',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data1 = response.data;
                    var selectBody= '<option value=\"\">Select Sub Name</option>';

                    for(var i=0; i<data1.length; i++)
                    {
                        selectBody += '<option value=\"' + data1[i]['code'] + '\">'+ data1[i]['name'] + '</option>';

                    }
                    $('#subject1').html(selectBody);
                    //$("#subject1").val(subject);
                    $("#editPeriodList").modal('show');
                }
            });
        }
        function deletePeriodList(i,j){
           // alert(data[i]['id']);
            $("#dbiddel1").val(data[i]['id']);
            $("#classId2").val(j);
        }
        $( "#day" ).on("change", function(evt) {
            $.ajax({
                url: '/api/findSubjectList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select subject</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['code'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    $('#subject').html(selectBody);
                }
            });
        });

        $(document).ready(function(){
            loadAcademicSession1();

            $("#formPerodList").validate({
                //ignore: ":hidden",
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/searchSubjectList',
                        type: 'POST',
                        data: new FormData($("#formPerodList")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            if(!$.trim(data)){
                                $('#tablePeroidList').html("No data found.Please try again.");
                            }
                            else{
                                var tbody= "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Action</th>" +
                                    " <th>Period SL</th>" +
                                    " <th>Sub Name</th>" +
                                    " <th>Teacher</th>" +
                                    " <th>Day</th>" +
                                    " <th>Start Time</th>" +
                                    " <th>End Time</th>" +
                                    " </tr>" +
                                    " </thead>"+
                                    "<tbody>"+
                                    "</tbody>";
                                for(var i=0; i<data.length; i++)
                                {
                                    tbody += "<tr>";
                                    tbody += "<td>"+ (i+1) +"</td>";
                                    classId = data[i]['classId'];
                                    tbody += "<td>" +"<div class='animation-model'>" +
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editPeriodList(this.id,classId);' id="+ i +" data-toggle='modal' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                        "<i class='fa fa-edit'></i> " +
                                        "</button>&nbsp;&nbsp;" +
                                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deletePeriodList(this.id,classId);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                        "<i class='fa fa-trash'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                    tbody += "<td>"+data[i]['serial']+"</td>";
                                    tbody += "<td>"+data[i]['name']+"</td>";
                                    tbody += "<td>"+data[i]['teacherId']+"</td>";
                                    tbody += "<td>"+data[i]['day']+"</td>";
                                    tbody += "<td>"+data[i]['startTime']+"</td>";
                                    tbody += "<td>"+data[i]['endTime']+"</td>";
                                    tbody += "</tr>";
                                }
                                $('#tablePeroidList').html(tbody);

                            }

                        }
                    });
                    return false;
                }
            });

            $("#editPeriodLisy").validate({
                //ignore: ":hidden",
                rules: {
                    day: "required",
                    subject: "required",
                    startTime: "required",
                    endTime: "required",
                    serial: "required",
                    //teacherId: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editPeriodList',
                        type: 'POST',
                        data: new FormData($("#editPeriodLisy")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            if (typeof data.successMsg !== 'undefined')
                            {
                                $('#editPeriodList').modal('hide');
                                notify('success', data.successMsg);
                                delete data.successMsg;
                                console.log(data);
                                if(!$.trim(data)){
                                    $('#tablePeroidList').html("No data found.Please try again.");
                                }
                                else{
                                    var tbody= "<thead> " +
                                        "<tr> " +
                                        "<th>SL. No</th>" +
                                        " <th>Action</th>" +
                                        " <th>Period SL</th>" +
                                        " <th>Sub Name</th>" +
                                        " <th>Teacher</th>" +
                                        " <th>Day</th>" +
                                        " <th>Start Time</th>" +
                                        " <th>End Time</th>" +
                                        " </tr>" +
                                        " </thead>"+
                                        "<tbody>"+
                                        "</tbody>";
                                    i=0;
                                    $.each(data, function(key,value){
                                        tbody += "<tr>";
                                        tbody += "<td>"+ (i+1) +"</td>";
                                        classId = value.classId;
                                        tbody += "<td>" +"<div class='animation-model'>" +
                                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editPeriodList(this.id,classId);' id="+ i +" data-toggle='modal' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                            "<i class='fa fa-edit'></i> " +
                                            "</button>&nbsp;&nbsp;" +
                                            "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deletePeriodList(this.id,classId);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                            "<i class='fa fa-trash'></i> " +
                                            "</button> " +
                                            "</div> " +
                                            "</td>";
                                        tbody += "<td>"+value.serial+"</td>";
                                        tbody += "<td>"+value.name+"</td>";
                                        tbody += "<td>"+value.teacherId+"</td>";
                                        tbody += "<td>"+value.day +"</td>";
                                        tbody += "<td>"+value.startTime+"</td>";
                                        tbody += "<td>"+value.endTime +"</td>";
                                        tbody += "</tr>";
                                    });

                                    $('#tablePeroidList').html(tbody);

                                }
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#editPeriodList').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formAddSubjectTime").validate({
                rules: {
                    day: "required",
                    subject: "required",
                    startTime: "required",
                    endTime: "required",
                    serial: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertClassTime',
                        type: 'POST',
                        data: new FormData($("#formAddSubjectTime")[0]),
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
            $("#formdeletePeriod").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deletePeriodList',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            data = response.data;
                            if (typeof data.successMsg !== 'undefined')
                            {
                                $('#confirm-delete').modal('hide');
                                notify('success', data.successMsg);
                                delete data.successMsg;
                                if(!$.trim(data)){
                                    $('#tablePeroidList').html("No data found.Please try again.");
                                }
                                else{
                                    var tbody= "<thead> " +
                                        "<tr> " +
                                        "<th>SL. No</th>" +
                                        " <th>Action</th>" +
                                        " <th>Period SL</th>" +
                                        " <th>Sub Name</th>" +
                                        " <th>Teacher</th>" +
                                        " <th>Day</th>" +
                                        " <th>Start Time</th>" +
                                        " <th>End Time</th>" +
                                        " </tr>" +
                                        " </thead>"+
                                        "<tbody>"+
                                        "</tbody>";
                                    i=0;
                                    $.each(data, function(key,value){
                                        tbody += "<tr>";
                                        tbody += "<td>"+ (i+1) +"</td>";
                                        classId = value.classId;
                                        tbody += "<td>" +"<div class='animation-model'>" +
                                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editPeriodList(this.id,classId);' id="+ i +" data-toggle='modal' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                            "<i class='fa fa-edit'></i> " +
                                            "</button>&nbsp;&nbsp;" +
                                            "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deletePeriodList(this.id,classId);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                            "<i class='fa fa-trash'></i> " +
                                            "</button> " +
                                            "</div> " +
                                            "</td>";
                                        tbody += "<td>"+value.serial+"</td>";
                                        tbody += "<td>"+value.name+"</td>";
                                        tbody += "<td>"+value.teacherId+"</td>";
                                        tbody += "<td>"+value.day +"</td>";
                                        tbody += "<td>"+value.startTime+"</td>";
                                        tbody += "<td>"+value.endTime +"</td>";
                                        tbody += "</tr>";
                                        i++;
                                    });

                                    $('#tablePeroidList').html(tbody);

                                }
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#confirm-delete').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

        });
    </script>
@endsection




