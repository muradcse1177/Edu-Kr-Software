@extends('layout.app')
@section('title', 'Student List')
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
        <h5 class="m-b-10">Hostel Student Management </h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#noticeset" role="tab"><i class="icofont icofont-ui-message"></i>Student List</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="noticeset" role="tabpanel">
                        <form id="formstudentList">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <div class="checkbox-color checkbox-success">
                                        <input id="checkbox11" name="forAll" type="checkbox" value="forAll">
                                        <label for="checkbox11">
                                            For All
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="anotheroInfo">
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <select id="hostelName" name="hostelName" class="form-control ">
                                        <option value="">Hostel Name</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <select id="floor" name="floor" class="form-control ">
                                        <option value="">Select Floor</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <select id="room" name="room" class="form-control ">
                                        <option value="">Select Room</option>
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
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Student</button>
                                </div><hr>
                            </div><hr>
                        </form>
                    <center><h5 class="m-b-10">Student List</h5></center>
                    <div class="table-responsive">
                        <table id="showStudentList" class="table table-bordered">

                        </table>
                        <div class="modal fade" id="modalEditHostelInfo" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Allocation settings</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <center><h5 class="m-b-10">Room Allocation</h5></center>
                                        <form id="formEditHostelStdInfo">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <select id="hostelName1" name="hostelName" class="form-control ">
                                                        <option value="">Hostel Name</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="floor1" name="floor" class="form-control " placeholder="Floor">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="room1" name="room" class="form-control " placeholder="Room No">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="dbid" name="dbid" class="form-control ">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
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
    </div>

</div>
@endsection
@section('footer')
    @parent
    <script>
        $('#checkbox11').click(function() {
            if($('#checkbox11').not(':checked').length){
                $("#anotheroInfo").show();
            }else{
                $("#anotheroInfo").hide();
            }
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
                    $('#hostelName,#hostelName1').html(selectBody);
                }
            });
        }
        $('#hostelName').on('change', function() {
            var hostelname =  $('#hostelName').val();
            var fullJson = "{\"name\": \"" +hostelname+ "\"}";

            console.log(fullJson);
            $.ajax({
                url: '/api/getHostelFloorList',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    console.log(data);
                    var selectBody= '<option value=\"\">Select Floor</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['floor'] + '\">'+ data[i]['floor'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#floor').html(selectBody);
                }
            });
        });
        $('#floor').on('change', function() {
            var hostelName =  $('#hostelName').val();
            var fullJson = "{\"name\": \"" +hostelName+ "\"}";

            console.log(fullJson);
            $.ajax({
                url: '/api/getHostelRoom',
                type: 'POST',
                data: fullJson,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    console.log(data);
                    var selectBody= '<option value=\"\">Select Floor</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['roomNo'] + '\">'+ data[i]['roomNo'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#room').html(selectBody);
                }
            });
        });

        $(document).ready(function(){
            getHostelName();

            $("#formstudentList").validate({
                //ignore: ":hidden",
                rules: {
                    hostelNmae: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/showHostelStudentList',
                        type: 'POST',
                        data: new FormData($("#formstudentList")[0]),
                        dataType: 'json',
                        async: false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            var length = data.length;
                            if(!$.trim(data)){
                                $('#showStudentList').html("No data found.Please try again.");
                            }
                            else{
                                var tbody = "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>StdId</th>" +
                                    " <th>Name</th>" +
                                    " <th>Session</th>" +
                                    " <th>Class</th>" +
                                    " <th>Medium</th>" +
                                    " <th>Version</th>" +
                                    " <th>Shift</th>" +
                                    " <th>Roll No.</th>" +
                                    " <th>Hostel Name</th>" +
                                    " <th>Floor</th>" +
                                    " <th>Room</th>" +
                                    " <th>Action</th>" +
                                    " </tr>" +
                                    " </thead>" +
                                    "<tbody>" +
                                    "</tbody>";
                                for (var i = 0; i < length; i++) {
                                    tbody += "<tr>";
                                    tbody += "<td>" + (i + 1) + "</td>";
                                    tbody += "<td>" + data[i]['studentId'] + "</td>";
                                    tbody += "<td>" + data[i]['name'] + "</td>";
                                    tbody += "<td>" + data[i]['sessionName'] + "</td>";
                                    tbody += "<td>" + data[i]['classNum'] + "</td>";
                                    tbody += "<td>" + data[i]['mediumName'] + "</td>";
                                    tbody += "<td>" + data[i]['versionName'] + "</td>";
                                    tbody += "<td>" + data[i]['shiftName'] + "</td>";
                                    tbody += "<td>" + data[i]['rollNo'] + "</td>";
                                    tbody += "<td>" + data[i]['hostelName'] + "</td>";
                                    tbody += "<td>" + data[i]['floor'] + "</td>";
                                    tbody += "<td>" + data[i]['roomNo'] + "</td>";
                                    tbody += "<td>" + "<div class='animation-model'>" +
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editHostelInfo(this.id);' id=" + i + " data-toggle='modal' data-target='#modalEditHostelInfo' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                        "<i class='fa fa-edit'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                    tbody += "</tr>";
                                }
                                $('#showStudentList').html(tbody);

                            }
                        }
                    });
                    return false;
                }
            });

        });
        $("#formEditHostelStdInfo").validate({
            rules: {
                hostelName: "required",
                room: "required",
                floor: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/editHosteStdInfo',
                    type: 'POST',
                    data: new FormData($("#formEditHostelStdInfo")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            $('#modalEditHostelInfo').modal('hide');
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            $('#modalEditHostelInfo').modal('hide');
                        }

                    }
                });
                return false;
            }
        });

        function editHostelInfo(i) {
            document.getElementById('dbid').value = data[i]['id'];
            document.getElementById('hostelName1').value = data[i]['hostelName'];
            document.getElementById('floor1').value = data[i]['floor'];
            document.getElementById('room1').value = data[i]['roomNo'];
        }
        function deleteHostel(i) {
            document.getElementById('dniddel').value = data[i]['id'] ;
        }
    </script>


@endsection




