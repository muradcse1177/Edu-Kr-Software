@extends('layout.app')
@section('title', 'Routine Management')
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
                        <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Add Day</a>
                        <div class="slide"></div>
                    </li>

                </ul>
                <div class="tab-content card-block">

                    <div class="tab-pane active" id="markEntry" role="tabpanel">
                        <form id="formDayType">
                            <div class="row">
                                <div class="col-sm-12 col-xl-6 m-b-30">
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
                                <div class="col-sm-12 col-xl-6 m-b-30">
                                    <select id="dayType" name="dayType" class="form-control ">
                                        <option value="">Select DayType</option>
                                        <option value="weekend">Weekend</option>
                                        <option value="halfday">Half day</option>
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
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <hr><center><h6>Day List of Your School</h6></center><hr>
                            <table id="showDayList" class="table table-bordered">

                            </table>
                            <div class="modal fade" id="modalEditDays" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit your day structure</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formEditDayType">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-6 m-b-30">
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
                                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                                        <select id="dayType1" name="dayType" class="form-control ">
                                                            <option value="">Select DayType</option>
                                                            <option value="weekend">Weekend</option>
                                                            <option value="halfday">Half day</option>
                                                        </select>
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
                            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <center><h4 class="modal-title">Are You Sure to Delete This??</h4></center>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger btn-ok" data-dismiss="modal">Delete</a>
                                        </div>
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
    <script>
        function dayList() {
            $.ajax({
                url: '/api/showDayList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var length=data.length;
                    console.log(data);
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Day Name</th>" +
                        " <th>Day Type</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['day']+"</td>";
                        tbody += "<td>"+data[i]['dayType']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editDayName(this.id);' id="+ i +" data-toggle='modal' data-target='#modalEditDays' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit'></i> " +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";
                    }
                    $('#showDayList').html(tbody);
                }
            });


        }
        function editDayName(i){
            $("#dbid").val(data[i]['id']);
            $("#day1").val(data[i]['day']);
            $("#dayType1").val(data[i]['dayType']);
        }
        $(document).ready(function(){
            dayList();
            $("#formEditDayType").validate({
                //ignore: ":hidden",
                rules: {
                    day: "required",
                    dayType: "required",
                },
                messages: {
                    day: "Please give Day Name",
                    dayType: "Please give Day Type",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/updateDayTypeSetup',
                        type: 'POST',
                        data: new FormData($("#formEditDayType")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                dayList();
                                $('#modalEditDays').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                dayList();
                                $('#modalEditDays').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formDayType").validate({
                //ignore: ":hidden",
                rules: {
                    day: "required",
                    dayType: "required",
                },
                messages: {
                    day: "Please give Day Name",
                    dayType: "Please give Day Type",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertDayTypeSetup',
                        type: 'POST',
                        data: new FormData($("#formDayType")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                dayList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                dayList();
                            }

                        }
                    });
                    return false;
                }
            });

        });
    </script>
@endsection




