@extends('layout.app')
@section('title', 'Leave Management')
@section('content')
    <div class="page-header card">
        <div class="card-block">
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
            </div>
            <h5 class="m-b-10">Designation Management</h5>
            <hr>
            <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add Leave Type</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#deutran" role="tab"><i class="icofont icofont-ui-message"></i>Assign Leave</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="feeslog" role="tabpanel">
                        <form id="formLeaveName">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Leave Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="leaveName" name="leaveName" class="form-control form-control-success"  placeholder="Leave Name">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="addressType" class="form-control form-control-success" placeholder="col">
                                </div>
                                <div class="col">
                                    <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add New Leave</button>
                                </div><hr>
                            </div>
                        </form>
                        <hr>
                        <center> <h4>Leave List</h4></center>
                        <div class="table-responsive">
                            <table id="tableLeaveList" class="table table-bordered">

                            </table>
                            <div class="modal fade" id="managenotice" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit your leave settings</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editLeaveName">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Leave Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="leaveName1" name="leaveName" class="form-control form-control-success"  placeholder="Leave Name">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="dbid" name="dbid" class="form-control " >
                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="confirmDeleteDesignation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <center><h4 class="modal-title">Are You Sure to Delete This??</h4></center>
                                        </div>
                                        <form id="formDeleteLeave">
                                            <div class="modal-footer">
                                                <input type="hidden" id="dbiddel" name="dbiddel" class="form-control " >
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger ">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="deutran" role="tabpanel">
                        <form id="formEmployeeInfo">
                            <div class="row">
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label  class="col-form-label" for="inputSuccess1">Employee ID:</label>
                                </div>
                                <div class="col-sm-12 col-xl-6 m-b-30">
                                    <input type="text" id="employeeId" name="employeeId" class="form-control " placeholder="Employee ID" >
                                </div>
                                <div style="text-align: right;" class="col-sm-12 col-xl-3 m-b-30">
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Employee</button>
                                </div>
                            </div>
                        </form>
                        <div id="employeeInfo"></div>
                        <form id="formAssignLeave">
                            <div id="assignDiv">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Leave Type</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="leaveName2" name="leaveName" class="form-control form-control-success">
                                            <option value="">Select Leave</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">From Date</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="datepicker_start" name="startDate" class="form-control form-control-success date" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">To Date</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="datepicker_end" name="endDate" class="form-control form-control-success date" placeholder="End Date">
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Joining Date</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="datepicker_end1" name="joiningDate" class="form-control form-control-success date" placeholder="Joining Date">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="employeeId2" name="employeeId" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Assign Leave</button>
                                    </div><hr>
                                </div>
                            </div>
                        </form>

                        <hr><center> <h4>Leave Assign List</h4></center><hr>
                        <div class="table-responsive">
                            <table id="tableassignList" class="table table-bordered">

                            </table>
                            <div class="modal fade" id="editmodalLeave" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit your Leave settings</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formEditAssignList">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Leave Type</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <select id="leaveName3" name="leaveName" class="form-control form-control-success">
                                                            <option value="">Select Leave</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">From Date</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="startDate1" name="startDate" class="form-control form-control-success date" placeholder="Start Date">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">To Date</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="endDate1" name="endDate" class="form-control form-control-success date" placeholder="End Date">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Joining Date</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="joiningDate1" name="joiningDate" class="form-control form-control-success date" placeholder="Joining Date">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="dbid1" name="dbid1" class="form-control " >
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
        </div>
    </div>
@endsection
@section('footer')
    @parent
<script>
    $( ".date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",

    });

    function loadLeaveList() {
        $.ajax({
            url: '/api/showLeaveList',
            type: 'POST',
            success: function (response) {
                data = response.data;
                var tbody= "<thead> " +
                    "<tr> " +
                    "<th>SL. No</th>" +
                    " <th>Leave Name</th>" +
                    " <th>Action</th>" +
                    " </tr>" +
                    " </thead>"+
                    "<tbody>"+
                    "</tbody>";
                for(var i=0; i<data.length; i++)
                {
                    tbody += "<tr>";
                    tbody += "<td>"+ (i+1) +"</td>";
                    tbody += "<td>"+data[i]['leaveName']+"</td>";
                    tbody += "<td>" +"<div class='animation-model'>" +
                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editLeave(this.id);' id="+ i +" data-toggle='modal' data-target='#managenotice' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                        "<i class='fa fa-edit'></i> " +
                        "</button>&nbsp;&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteLeave(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirmDeleteDesignation' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                        "<i class='fa fa-trash'></i> " +
                        "</button> " +
                        "</div> " +
                        "</td>";
                    tbody += "</tr>";
                    $('#leaveName2').append($('<option>', {
                        value: data[i].leaveName,
                        text: data[i].leaveName
                    }))
                    ;$('#leaveName3').append($('<option>', {
                        value: data[i].leaveName,
                        text: data[i].leaveName
                    }));
                }
                $('#tableLeaveList').html(tbody);
                $('#assignDiv').hide();
            }
        });
    }
    function loadLeaveAssignList() {
        $.ajax({
            url: '/api/showLeaveAssignList',
            type: 'POST',
            success: function (response) {
                data = response.data;
                var tbody= "<thead> " +
                    "<tr> " +
                    "<th>SL. No</th>" +
                    " <th>Employee Id</th>" +
                    " <th>Name</th>" +
                    " <th>Leave Name</th>" +
                    " <th>Start date</th>" +
                    " <th>End Date</th>" +
                    " <th>Joining Date</th>" +
                    " <th>Action</th>" +
                    " </tr>" +
                    " </thead>"+
                    "<tbody>"+
                    "</tbody>";
                for(var i=0; i<data.length; i++)
                {
                    tbody += "<tr>";
                    tbody += "<td>"+ (i+1) +"</td>";
                    tbody += "<td>"+data[i]['employeeId']+"</td>";
                    tbody += "<td>"+data[i]['name']+"</td>";
                    tbody += "<td>"+data[i]['leaveType']+"</td>";
                    tbody += "<td>"+data[i]['startDate']+"</td>";
                    tbody += "<td>"+data[i]['endDate']+"</td>";
                    tbody += "<td>"+data[i]['joiningDate']+"</td>";
                    tbody += "<td>" +"<div class='animation-model'>" +
                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editLeaveList(this.id);' id="+ i +" data-toggle='modal' data-target='#editmodalLeave' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                        "<i class='fa fa-edit'></i> " +
                        "</button>&nbsp;&nbsp;" +
                        "</div> " +
                        "</td>";
                    tbody += "</tr>";

                }
                $('#tableassignList').html(tbody);
            }
        });
    }
    $(document).ready(function(){

        loadLeaveList();
        loadLeaveAssignList();

        $("#formEditAssignList").validate({
            rules: {
                leaveName: "required",
                startDate: "required",
                endDate: "required",
                joiningDate: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/editEmployeeLeave',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            loadLeaveAssignList();
                            $('#editmodalLeave').modal('hide');
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            loadLeaveAssignList();
                            $('#editmodalLeave').modal('hide');

                        }

                    }
                });
                return false;
            }
        });
        $("#formAssignLeave").validate({
            rules: {
                leaveName: "required",
                startDate: "required",
                endDate: "required",
                joiningDate: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/assignEmployeeLeave',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            $('#assignDiv').hide();
                            loadLeaveAssignList();
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            loadLeaveAssignList();

                        }

                    }
                });
                return false;
            }
        });
        $("#formEmployeeInfo").validate({
            rules: {
                employeeId: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/searchEmployeeInfo',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {

                        data = response.data;
                        if(!$.trim(data)){
                            $('#employeeInfo').html("No data found.Please try again.");
                        }
                        else{
                            var studentInfo = '<div class="row">\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="name" value="'+ data[0]['name'] +'" class="form-control " placeholder="Employee Name" readonly>\n' +
                                '                            </div>\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="designation" value="'+ data[0]['designation'] +'" class="form-control " placeholder="Designation" readonly>\n' +
                                '                            </div>\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="dateOfBirth" value="'+ data[0]['dateOfBirth'] +'" class="form-control " placeholder="Date of Birth" readonly>\n' +
                                '                            </div>\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="mobile" value="'+ data[0]['mobile'] +'" class="form-control " placeholder="Mobile" readonly>\n' +
                                '                            </div>\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="gender" value="'+ data[0]['gender'] +'" class="form-control " placeholder="Gender" readonly>\n' +
                                '                            </div>\n' +
                                '                        </div><hr>';

                            $('#employeeInfo').html(studentInfo);
                            $('#assignDiv').show();
                            $('#employeeId1').val(data[0]['employeeId']);
                            $('#employeeId2').val(data[0]['employeeId']);
                        }
                    }
                });
                return false;
            }
        });
        $("#formLeaveName").validate({
            rules: {
                leaveName: "required",
            },
            messages: {
                leaveName: "Please give designation",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/insertleaveName',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            loadLeaveList();
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            loadLeaveList();
                        }

                    }
                });
                return false;
            }
        });
        $("#editLeaveName").validate({
            rules: {
                leaveName: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/editLeaveName',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            loadLeaveList();
                            $('#managenotice').modal('hide');
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            loadLeaveList();
                        }

                    }
                });
                return false;
            }
        });
        $("#formDeleteLeave").validate({

            submitHandler: function(form) {
                $.ajax({
                    url: '/api/deleteLeaveName',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            loadLeaveList();
                            $('#confirmDeleteDesignation').modal('hide');
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            loadLeaveList();
                        }

                    }
                });
                return false;
            }
        });
    });
    function editLeave(i) {
        document.getElementById('dbid').value = data[i]['id'];
        document.getElementById('leaveName1').value = data[i]['leaveName'];
    }
    function deleteLeave(i) {
        document.getElementById('dbiddel').value = data[i]['id'];
    }
    function editLeaveList(i) {
        document.getElementById('dbid1').value = data[i]['id'];
        document.getElementById('leaveName3').value = data[i]['leaveType'];
        document.getElementById('startDate1').value = data[i]['startDate'];
        document.getElementById('endDate1').value = data[i]['endDate'];
        document.getElementById('joiningDate1').value = data[i]['joiningDate'];
    }

</script>
@endsection



