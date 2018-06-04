@extends('layout.app')
@section('title', 'Termination of Student')
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
            <h5 class="m-b-10">Terminate Student</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Termiate Student</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="markEntry" role="tabpanel">
                            <center><h5 class="m-b-10">Student Information</h5></center><hr>
                            <form id="formStudentInfo">
                                <div class="row">
                                    <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                        <label  class="col-form-label" for="inputSuccess1">Student ID</label>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input type="text" id="studentId" name="studentId" class="form-control " placeholder="Student ID" >
                                    </div>
                                    <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Student</button>
                                    </div>
                                </div>
                            </form>
                            <div id="studentInfo"></div><hr>
                            <form id="formTerminateStd">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentIdFinal" name="studentId" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button id="submitClassInfo" class="form-control form-bg-primary">Terminate</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
@section('footer')
    @parent
    <script>
        $(document).ready(function(){
            $("#formStudentInfo").validate({
                rules: {
                    studentId: "required",
                },
                messages: {
                    studentId: "Please give Student ID",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/searchHostelStudentInfo',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {

                            data = response.data;
                            if(!$.trim(data)){
                                $('#studentInfo').html("No data found.Please try again.");
                            }
                            else{
                                var studentInfo = '<div class="row">\n' +
                                    '                            <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                    '                                <input type="text" id="name" value="'+ data[0]['hostelName'] +'" class="form-control " placeholder="Hostel Name" >\n' +
                                    '                            </div>\n' +
                                    '                            <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                    '                                <input type="text" id="class" value="'+ data[0]['floor'] +'" class="form-control " placeholder="Floor" >\n' +
                                    '                            </div>\n' +
                                    '                            <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                    '                                <input type="text" id="version" value="'+ data[0]['roomNo'] +'" class="form-control " placeholder="Room No" >\n' +
                                    '                            </div>\n' +
                                    '                        </div>';

                                $('#studentInfo').html(studentInfo);
                                $('#studentIdFinal').val(data[0]['studentId']);
                            }
                        }
                    });
                    return false;
                }
            });
            $("#formTerminateStd").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/terminateHostelStudent',
                        type: 'POST',
                        data: new FormData($("#formTerminateStd")[0]),
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



