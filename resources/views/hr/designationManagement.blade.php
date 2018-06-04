@extends('layout.app')
@section('title', 'Designation Management')
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
            <h5 class="m-b-10">Designation Management</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add New Designation</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#deutran" role="tab"><i class="icofont icofont-ui-message"></i>Upgrade Designation</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="feeslog" role="tabpanel">
                            <form id="formAddDesignation">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Designation Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="designationName" name="designationName" class="form-control " placeholder="Designation Name" >
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Designations</button>
                                    </div><hr>
                                </div>
                            </form>
                            <hr>
                            <center> <h4>Designation List</h4></center>
                            <div class="table-responsive">
                                <table id="designationListTable" class="table table-bordered">

                                </table>
                                <div class="modal fade" id="modalEditDesig" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit designation settings</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formEditDesignation">
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Designation Name</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" id="newDesName" name="newDesName" class="form-control " value="" placeholder="Designation Name">
                                                            <input type="hidden" id="oldDesName" name="oldDesName" class="form-control " value="" placeholder="Designation Name">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" >Close</button>
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
                                            <div class="modal-footer">
                                                <form id="formDeleteDesignation">
                                                    <input type="hidden" id="deleteDesignation" name="deleteDesignation" class="form-control " value="" >
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                                </form>
                                            </div>
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

                            <form id="formEmployeeEditDesig">
                                <div id="designationlist" class="row" style="display:none;">
                                    <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                        <label  class="col-form-label" for="inputSuccess1">Designation :</label>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select id="designation" name="designation"  class="form-control ">
                                            <option value="">Select Designation</option>
                                        </select>
                                    </div>
                                    <input type="hidden" id="employeeId1" name="employeeId" class="form-control " placeholder="Employee ID" >
                                    <div style="text-align: right;" class="col-sm-12 col-xl-3 m-b-30">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Upgrade Designation</button>
                                    </div>
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
        function loadDesignationList() {
            $.ajax({
                url: '/api/showDesignationList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Designation Name</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['designationName']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editDesig(this.id);' id="+ i +" data-toggle='modal' data-target='#modalEditDesig' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit'></i> " +
                            "</button>&nbsp;&nbsp;" +
                            "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteDesig(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirmDeleteDesignation' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                            "<i class='fa fa-trash'></i> " +
                            "</button> " +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";
                    }
                    $('#designationListTable').html(tbody);
                }
            });
        }
        function loadDesignation() {
            $.ajax({
                url: '/api/listDesignationNames',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    for (i = 0; i < data.length; i++) {
                        $('#designation').append($('<option>', {
                            value: data[i].designationName,
                            text: data[i].designationName
                        }));
                    }
                }
            });
        }
        $(document).ready(function(){
            loadDesignationList();
            loadDesignation();
            $("#formAddDesignation").validate({
                //ignore: ":hidden",
                rules: {
                    designationName: "required",
                },
                messages: {
                    designationName: "Please give designation",
                },
                submitHandler: function(form) {
                    // var myform = document.getElementById("formStdBasicInfo");
                    // var formData = new FormData(myform );
                    $.ajax({
                        url: '/api/insertDesignationName',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                loadDesignationList();
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
            $("#formEditDesignation").validate({
                rules: {
                    editDesName: "required",
                },
                messages: {
                    designationName: "Please give designation",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editDesignationName',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                loadDesignationList();
                                $('#modalEditDesig').modal('hide');
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
            $("#formDeleteDesignation").validate({

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteDesignationName',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                loadDesignationList();
                                $('#confirmDeleteDesignation').modal('hide');
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
                                $('#designationlist').show();
                                $('#employeeId1').val(data[0]['employeeId']);
                            }
                        }
                    });
                    return false;
                }
            });
            $("#formEmployeeEditDesig").validate({
                rules: {
                    designation: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/upgradeEmployeeDesig',
                        type: 'POST',
                        data: $(form).serialize(),
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

        function editDesig(i) {
            document.getElementById('newDesName').value = data[i]['designationName'];
            document.getElementById('oldDesName').value = data[i]['designationName'];
        }
        function deleteDesig(i) {
            //console.log(data[i]['designationName']);
            document.getElementById('deleteDesignation').value = data[i]['designationName'];
        }
    </script>
@endsection
