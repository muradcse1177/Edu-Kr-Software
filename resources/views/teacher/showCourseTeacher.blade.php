@extends('layout.app')
@section('title', 'Show Course')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header table-card-header">
                <center> <h4>Subject and Teacher Management</h4></center><hr>
            </div>
            <div class="card-block">
                <div class="row">
                    <form id="formSearchCourseTeacher">
                        <div class="row">
                            @include('common.studentClassInfo')
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="teacher" name="teacher" class="form-control " placeholder="Teacher Code">
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
                                <button id="submitClassInfo" class="form-control form-bg-primary">Search Subject</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="card-header">
                <hr><center><h4>  Subject List </h4></center><hr>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablesubTeacherList">

                    </table>
                </div>
                <div class="modal fade" id="editsublist" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Subjects and Teacher</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editSubjectTeacher">
                                    <div class="row" >
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <select id="subject" name="subject" class="form-control subject">
                                                <option value="">Select Subject</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <select id="teacher1" name="teacher" class="form-control teacher1">
                                                <option value="">Select Teacher</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="dbid" name="dbid" class="form-control " placeholder="Teacher Code">
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
                            <form id="formBookDelete">
                                <div class="modal-footer">
                                    <input type="hidden" id="dbiddel" name="dbiddel" class="form-control " value="" >
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
@endsection
@section('footer')
    @parent
    <script>

        $(document).ready(function(){
            $("#divGroup").hide();

            $("#formSearchCourseTeacher").validate({
                rules: {
                    acaSession:"required",
                    medium:"required",
                    version:"required",
                    shift:"required",
                    class:"required",
                    section:"required",
                    group:"required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/searchCourseTeacher',
                        type: 'POST',
                        data: new FormData($("#formSearchCourseTeacher")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            if (!$.trim(data)) {
                                $('#tablesubTeacherList').html("No data found.Please try again.");
                            }
                            else {
                                var tbody = "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Teacher ID</th>" +
                                    " <th>Teacher Name</th>" +
                                    " <th>Sub Code</th>" +
                                    " <th>Sub Name</th>" +
                                    " <th>Action</th>" +
                                    " </tr>" +
                                    " </thead>" +
                                    "<tbody>" +
                                    "</tbody>";
                                for (var i = 0; i < data.length; i++) {
                                    tbody += "<tr>";
                                    tbody += "<td>" + (i + 1) + "</td>";
                                    tbody += "<td>" + data[i]['teacherId'] + "</td>";
                                    tbody += "<td>" + data[i]['empName'] + "</td>";
                                    tbody += "<td>" + data[i]['subId'] + "</td>";
                                    tbody += "<td>" + data[i]['subName'] + "</td>";
                                    tbody += "<td>" + "<div class='animation-model'>" +
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editsubTeacher(this.id);' id=" + i + " data-toggle='modal' data-target='#editsublist' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                        "<i class='fa fa-edit'></i> " +
                                        "</button>&nbsp;&nbsp;" +
                                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteSubTeacher(this.id);' id=" + i + "  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                        "<i class='fa fa-trash'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                }
                                $('#tablesubTeacherList').html(tbody);
                            }
                        }
                    });
                    return false;
                }
            });

            $("#assignSubjectTeacher").validate({
                //ignore: ":hidden",
                rules: {
                    subject: "required",
                    teacher: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/assignSubTeacher',
                        type: 'POST',
                        data: new FormData($("#assignSubjectTeacher")[0]),
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
            $("#editSubjectTeacher").validate({
                //ignore: ":hidden",
                rules: {
                    subject: "required",
                    teacher: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editSubjectTeacher',
                        type: 'POST',
                        data: new FormData($("#editSubjectTeacher")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#editsublist').modal('hide');
                                data = response.data;

                                var tbody = "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Teacher ID</th>" +
                                    " <th>Teacher Name</th>" +
                                    " <th>Sub Code</th>" +
                                    " <th>Sub Name</th>" +
                                    " <th>Action</th>" +
                                    " </tr>" +
                                    " </thead>" +
                                    "<tbody>" +
                                    "</tbody>";
                                for (var i = 0; i < data.length; i++) {
                                    tbody += "<tr>";
                                    tbody += "<td>" + (i + 1) + "</td>";
                                    tbody += "<td>" + data[i]['empName'] + "</td>";
                                    tbody += "<td>" + data[i]['teacherId'] + "</td>";
                                    tbody += "<td>" + data[i]['subId'] + "</td>";
                                    tbody += "<td>" + data[i]['subName'] + "</td>";
                                    tbody += "<td>" + "<div class='animation-model'>" +
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editsubTeacher(this.id);' id=" + i + " data-toggle='modal' data-target='#editsublist' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                        "<i class='fa fa-edit'></i> " +
                                        "</button>&nbsp;&nbsp;" +
                                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteSubTeacher(this.id);' id=" + i + "  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                        "<i class='fa fa-trash'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                }
                                $('#tablesubTeacherList').html(tbody);
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#editsublist').modal('hide');
                            }
                        }
                    });
                    return false;
                }
            });
            $("#formBookDelete").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteSubTeacher',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);

                                $('#confirm-delete').modal('hide');

                                data = response.data;

                                var tbody = "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Teacher ID</th>" +
                                    " <th>Teacher Name</th>" +
                                    " <th>Sub Code</th>" +
                                    " <th>Sub Name</th>" +
                                    " <th>Action</th>" +
                                    " </tr>" +
                                    " </thead>" +
                                    "<tbody>" +
                                    "</tbody>";
                                for (var i = 0; i < data.length; i++) {
                                    tbody += "<tr>";
                                    tbody += "<td>" + (i + 1) + "</td>";
                                    tbody += "<td>" + data[i]['empName'] + "</td>";
                                    tbody += "<td>" + data[i]['teacherId'] + "</td>";
                                    tbody += "<td>" + data[i]['subId'] + "</td>";
                                    tbody += "<td>" + data[i]['subName'] + "</td>";
                                    tbody += "<td>" + "<div class='animation-model'>" +
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editsubTeacher(this.id);' id=" + i + " data-toggle='modal' data-target='#editsublist' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                        "<i class='fa fa-edit'></i> " +
                                        "</button>&nbsp;&nbsp;" +
                                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteSubTeacher(this.id);' id=" + i + "  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                        "<i class='fa fa-trash'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                }
                                $('#tablesubTeacherList').html(tbody);
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

        function editsubTeacher(i) {
            var id= data[i]['id'];
            $("#dbid").val(id);
            $.ajax({
                url: '/api/searchCourseAndTeacher',
                type: 'POST',
                data:{},
                success: function (response) {
                    subject = response.subject;
                    teacher = response.teacher;

                    var selectBody1= '<option value=\"\">Select Subject</option>';

                    for(var i=0; i<subject.length; i++)
                    {
                        selectBody1 += '<option value=\"' + subject[i]['code'] + '\">'+ subject[i]['name'] + '</option>';
                    }
                    var selectBody2= '<option value=\"\">Select Teacher</option>';

                    for(var i=0; i<teacher.length; i++)
                    {
                        selectBody2 += '<option value=\"' + teacher[i]['employeeId'] + '\">'+ teacher[i]['name'] + '</option>';
                    }
                    $('#subject').html(selectBody1);
                    $('#teacher1').html(selectBody2);
                    $('#editsublist').modal('show');


                }
            });
        }
        function deleteSubTeacher(i) {
            document.getElementById('dbiddel').value = data[i]['id'] ;
        }

    </script>

@endsection
