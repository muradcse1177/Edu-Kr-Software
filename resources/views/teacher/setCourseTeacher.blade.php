@extends('layout.app')
@section('title', 'Set Course')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header ">
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
                <center> <h4>Course Management</h4></center><hr>
            </div>
            <div class="card-block">
                <form id="formSearchCourseMan">
                    <div class="row">
                        @include('common.studentClassInfo')
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

            <div class="card-header">
                <hr><center> <h4>Subject list for required class</h4></center><hr>
            </div>
            <div class="card-block" id="subteacherList" style="display:none;">
                <form id="assignSubjectTeacher">
                    <div class="row" >
                        <div class="col-sm-12 col-xl-4 m-b-30">
                            <select id="subject" name="subject" class="form-control ">
                                <option value="">Select Subject</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xl-4 m-b-30">
                            <select id="teacher" name="teacher" class="form-control ">
                                <option value="">Select Teacher</option>
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
                            <button id="submitClassInfo" class="form-control form-bg-primary">Assign Subject</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    @parent
    <script>

        $(document).ready(function(){


            $("#formSearchCourseMan").validate({
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
                        url: '/api/searchCourseAndTeacher',
                        type: 'POST',
                        data: new FormData($("#formSearchCourseMan")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
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
                            $('#teacher').html(selectBody2);
                            $("#subteacherList").css("display", "block");

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

        });

    </script>

@endsection