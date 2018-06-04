@extends('layout.app')
@section('title', 'Room Management')
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
        <h5 class="m-b-10">Room Management</h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Allocate Room</a>
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
                        <center><h5 class="m-b-10">Room Allocation</h5></center><hr>
                        <form id="formRoomAllocation">
                            <div class="row">
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <select id="hostelname" name="hostelname" class="form-control ">
                                        <option value="">Hostel Name</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <select id="floor" name="floor" class="form-control ">
                                        <option value="">Select Floor</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="roomNo" name="roomNo" class="form-control " placeholder="Room No" >
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                </div>
                                <div class="col">
                                    <input type="hidden" id="studentIdFinal" name="studentId" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Allocate Room</button>
                                </div>
                            </div>
                        </form>
                        <hr>
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
        $('#hostelname').on('change', function() {
            var hostelname =  $('#hostelname').val();
            var fullJson = "{\"name\": \"" +hostelname+ "\"}";

            console.log(fullJson);
            $.ajax({
                url: '/api/getHostelFloor',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    console.log(data);
                    var selectBody= '<option value=\"\">Select Floor</option>';

                    for(var i=0; i<data[0]['floor']; i++)
                    {
                        selectBody += '<option value=\"' + i + '\">'+ i + '</option>';

                    }
                    //console.log(selectBody);
                    $('#floor').html(selectBody);
                }
            });
        });
        function getHostelName() {
            $.ajax({
                url: '/api/getHostelName',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Hostel Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['name'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    $('#hostelname').html(selectBody);
                }
            });
        }
        $(document).ready(function(){
            getHostelName();
            $("#formStudentInfo").validate({
                rules: {
                    studentId: "required",
                },
                messages: {
                    studentId: "Please give Student ID",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/searchStudentInfo',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {

                            data = response.data;
                            if(!$.trim(data)){
                                $('#studentInfo').html("No data found.Please try again.");
                            }
                            else{
                                var studentInfo = '<div class="row">\n' +
                                    '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                    '                                <input type="text" id="name" value="'+ data[0]['name'] +'" class="form-control " placeholder="Student Name" >\n' +
                                    '                            </div>\n' +
                                    '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                    '                                <input type="text" id="class" value="'+ data[0]['classNum'] +'" class="form-control " placeholder="Class" >\n' +
                                    '                            </div>\n' +
                                    '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                    '                                <input type="text" id="version" value="'+ data[0]['versionName'] +'" class="form-control " placeholder="Version" >\n' +
                                    '                            </div>\n' +
                                    '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                    '                                <input type="text" id="section" value="'+ data[0]['sectionName'] +'" class="form-control " placeholder="Section" >\n' +
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
            $("#formRoomAllocation").validate({
                //ignore: ":hidden",
                rules: {
                    hostelname: "required",
                    floor: "required",
                    roomNo: "required",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertRoomAllocation',
                        type: 'POST',
                        data: new FormData($("#formRoomAllocation")[0]),
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




