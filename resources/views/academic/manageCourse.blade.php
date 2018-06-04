@extends('layout.app')
@section('title', 'Course Management')
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
            <h5 class="m-b-10">Course Management</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Create New Course</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#markEntry1" role="tab"><i class="icofont icofont-ui-message"></i>Edit/Show Course</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="markEntry" role="tabpanel">
                            <form id="formAddCourse">
                                <div class="row">
                                    @include('common.studentClassInfo')
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="courseName" name="name" class="form-control " placeholder="Course Name">
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="courseCode" name="code" class="form-control " placeholder="Course Code">
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
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                    </div>
                                </div>
                            </form>
                        </div><hr>
                        <div class="tab-pane" id="markEntry1" role="tabpanel">
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
                                {{--<div id="divGroup" class="col-sm-12 col-xl-3 m-b-30" style="display: block;">--}}
                                    {{--<select id="group1" name="group" class="form-control" >--}}
                                        {{--<option value="">Group</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<div  class="col-sm-12 col-xl-3 m-b-30" style="display: block;">--}}
                                    {{--<select id="subjectlist" name="group" class="form-control" >--}}
                                        {{--<option value="">Subject</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}

                            </div>

                            <div class="table-responsive">
                                <hr><center><h5>Course List of your School</h5></center><hr>
                                <table id="tableCourseList" class="table table-bordered">

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Your Course</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditCourse">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-6 m-b-30">
                                                    <input type="text" id="subjectNameMain1" name="name" class="form-control " placeholder="Course Name">
                                                </div>
                                                <div class="col-sm-12 col-xl-6 m-b-30">
                                                    <input type="text" id="courseCodeMain1" name="code" class="form-control " placeholder="Course Code">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="dbid" name="dbid" class="form-control">
                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
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
    </div>
@endsection
@section('footer')
    @parent
    <script>
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
                url: '/api/findSubjectList',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion,
                    selectedShift: selectedShift, selectedClass: selectedClass, selectedSection:selectedSection},
                success: function (response) {
                    data = response.data;
                    if(!$.trim(data)){
                        $('#tableCourseList').html("No data found.Please try again.");
                    }
                    else{
                        var tbody= "<thead> " +
                            "<tr> " +
                            "<th>SL. No</th>" +
                            " <th>Class</th>" +
                            " <th>Subject Name</th>" +
                            " <th>Subject Code</th>" +
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
                            tbody += "<td>"+data[i]['name']+"</td>";
                            tbody += "<td>"+data[i]['code']+"</td>";
                            tbody += "<td>" +"<div class='animation-model'>" +
                                " <a href='' class='' onclick='editSubjectInfo(this.id);' id="+ i +" data-toggle='modal' data-target='#editCourseModal' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                "<i class='fa fa-edit' style='color: navy;'></i> " +
                                "</div> " +
                                "</td>";
                            tbody += "</tr>";
                        }
                        $('#tableCourseList').html(tbody);
                    }

                }
            });
        });
        function editSubjectInfo(i){
            $("#dbid").val(data[i]['id']);
            $("#classNameMain1").val(data[i]['class']);
            $("#subjectNameMain1").val(data[i]['name']);
            $("#courseCodeMain1").val(data[i]['code']);
        }
        $(document).ready(function(){
            loadAcademicSession1();

            $("#formEditCourse").validate({
                //ignore: ":hidden",
                rules: {
                    subjectNameMain: "required",
                    courseCodeMain: "required",
                },
                messages: {
                    subjectNameMain: "Please give Valid Subject Name",
                    courseCodeMain: "Please give Valid Subject Code",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/updateNewCourse',
                        type: 'POST',
                        data: new FormData($("#formEditCourse")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#editCourseModal').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#editCourseModal').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formAddCourse").validate({
                //ignore: ":hidden",
                rules: {
                    name: "required",
                    code: "required",
                    subjectType: "required",
                },
                messages: {
                    name: "Please give Valid Subject Name",
                    code: "Please give Valid Subject Code",
                    subjectType: "Please give Valid Subject Type",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertNewCourse',
                        type: 'POST',
                        data: new FormData($("#formAddCourse")[0]),
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
