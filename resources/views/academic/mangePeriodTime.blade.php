@extends('layout.app')
@section('title', 'Routine Management')
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
            <h5 class="m-b-10">Manage Basic Setting</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Add Settings</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="markEntry" role="tabpanel">
                            <form id="formAddSubjectSettings">
                                <div class="row">
                                    @include('common.studentClassInfo')
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="totalperiod" name="totalperiod" class="form-control" placeholder="Total Period" >
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="afterTiffin" name="afterTiffin" class="form-control" placeholder="After Tiffin Period" >
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="afterTiffinHalfDay" name="afterTiffinHalfDay" class="form-control" placeholder="Tiffin Period After Half Day" >
                                    </div>
                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                        <input type="text" id="startTime" name="startTime" class="form-control" placeholder="Start Tiffin Time" >
                                    </div>
                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                        <input type="text" id="endTime" name="endTime" class="form-control" placeholder="End Tiffin Time" >
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
                        </div>
                        <div class="table-responsive">
                            <hr><center><h5> Tiffin List </h5></center><hr>
                            <table id="tablePeroidList" class="table table-bordered">

                            </table>
                            <div class="modal fade" id="editClassInfoModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Tiffin structure</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editTiffinList">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                                        <input type="text" id="totalperiod1" name="totalperiod" class="form-control" placeholder="Total Period" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                                        <input type="text" id="afterTiffin1" name="afterTiffin" class="form-control" placeholder="After Tiffin Period" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                                        <input type="text" id="afterTiffinHalfDay1" name="afterTiffinHalfDay" class="form-control" placeholder="Tiffin Period After Half Day" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                                        <input type="text" id="startTime1" name="startTime" class="form-control" placeholder="Start Tiffin Time" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                                        <input type="text" id="endTime1" name="endTime" class="form-control" placeholder="End Tiffin Time" >
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

        function tiffinInfoList() {
            $.ajax({
                url: '/api/tiffinInfoList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    length = data.length;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        "<th>Action</th>" +
                        " <th>Class Id</th>" +
                        " <th>Total Period</th>" +
                        " <th>Before Tiffin </th>" +
                        " <th>After Tiffin </th>" +
                        " <th>Half Day Af Tiff</th>" +
                        " <th>Start Tiffin</th>" +
                        " <th>End Tiffin</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <a href='' class='' onclick='editTiffinInfo(this.id);' id="+ i +" data-toggle='modal' data-target='#editClassInfoModal' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit' style='color: navy;'></i> " +
                            "</a>&nbsp;&nbsp;" +
                            "</div> " +
                            "</td>";
                        tbody += "<td>"+data[i]['classId']+"</td>";
                        tbody += "<td>"+data[i]['totalperiod']+"</td>";
                        tbody += "<td>"+data[i]['beforeTiffin']+"</td>";
                        tbody += "<td>"+data[i]['afterTiffin']+"</td>";
                        tbody += "<td>"+data[i]['afterTiffinHalfDay']+"</td>";
                        tbody += "<td>"+data[i]['startTime']+"</td>";
                        tbody += "<td>"+data[i]['endTime']+"</td>";
                        tbody += "</tr>";
                    }
                    $('#tablePeroidList').html(tbody);
                }
            });
        }
        function editTiffinInfo(i){

            $("#dbid").val(data[i]['id']);
            $("#totalperiod1").val(data[i]['totalperiod']);
            $("#afterTiffin1").val(data[i]['afterTiffin']);
            $("#afterTiffinHalfDay1").val(data[i]['afterTiffinHalfDay']);
            $("#startTime1").val(data[i]['startTime']);
            $("#endTime1").val(data[i]['endTime']);
        }
        $(document).ready(function(){


            tiffinInfoList();
            $("#formAddSubjectSettings").validate({
                //ignore: ":hidden",
                rules: {
                    totalperiod: {required:true,number:true},
                    afterTiffin: {required:true,number:true},
                    afterTiffinHalfDay: {required:true,number:true},
                    startTime: "required",
                    endTime: "required",
                    serial: "required",
                    //teacherId: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertSubjectSettings',
                        type: 'POST',
                        data: new FormData($("#formAddSubjectSettings")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                tiffinInfoList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                tiffinInfoList();
                            }

                        }
                    });
                    return false;
                }
            });
            $("#editTiffinList").validate({
                //ignore: ":hidden",
                rules: {
                    totalperiod: {required:true,number:true},
                    afterTiffin: {required:true,number:true},
                    afterTiffinHalfDay: {required:true,number:true},
                    startTime: "required",
                    endTime: "required",
                    serial: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editTiffinList',
                        type: 'POST',
                        data: new FormData($("#editTiffinList")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#editClassInfoModal').modal('hide');
                                tiffinInfoList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#editClassInfoModal').modal('hide');
                                tiffinInfoList();
                            }

                        }
                    });
                    return false;
                }
            });

        });
    </script>
@endsection


