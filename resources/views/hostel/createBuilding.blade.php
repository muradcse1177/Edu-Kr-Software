@extends('layout.app')
@section('title', 'Add Hostel')
@section('header')
    @parent
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
        <h5 class="m-b-10">Hostel Management</h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Add Hostel</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="markEntry" role="tabpanel">
                        <form id="formAddHostel">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="name" name="name" class="form-control " placeholder="Hostel Name" >
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="address" name="address" class="form-control " placeholder="Hostel Address" >
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="floor" name="floor" class="form-control " placeholder="Floor Number" >
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="room" name="room" class="form-control " placeholder="Total Room" >
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="studentPerRoom" name="studentPerRoom" class="form-control " placeholder="Student Per Room" >
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
                                    <button tupe="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Hostel</button>
                                </div>
                            </div><hr>
                        </form>
                        <center> <h4>Hostel List.</h4></center>
                        <div class="table-responsive">
                            <table id="tableHostelList" class="table table-bordered">

                            </table>
                            <div class="modal fade" id="modalEditHostel" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hostel Management</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formEditHostel">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="name1" name="name" class="form-control " placeholder="Hostel Name" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="address1" name="address" class="form-control " placeholder="Hostel Address" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="floor1" name="floor" class="form-control " placeholder="Floor Number" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="room1" name="room" class="form-control " placeholder="Total Room" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="studentPerRoom1" name="studentPerRoom" class="form-control " placeholder="Student Per Room" >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="dbid" name="dbid" value="" class="form-control " placeholder="col">
                                                    <button type="button" class="btn btn-default waves-effect ">Close</button>
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
                                        <form id="formdeleteHostel">
                                            <div class="modal-footer">
                                                <input type="hidden" id="dniddel" name="dbiddel" value="" class="form-control " placeholder="col">
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
        </div>
        <!-- </div> -->
    </div>
</div>
@endsection
@section('footer')
    @parent
    <script>
        function hostelList() {
            $.ajax({
                url: '/api/showHostelList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Hostel Name</th>" +
                        " <th>Adress</th>" +
                        " <th>Floor</th>" +
                        " <th>Room</th>" +
                        " <th>Student/Room</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['name']+"</td>";
                        tbody += "<td>"+data[i]['address']+"</td>";
                        tbody += "<td>"+data[i]['floor']+"</td>";
                        tbody += "<td>"+data[i]['room']+"</td>";
                        tbody += "<td>"+data[i]['roomPerStudent']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editHostel(this.id);' id="+ i +" data-toggle='modal' data-target='#modalEditHostel' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit'></i> " +
                            "</button>&nbsp;&nbsp;" +
                            "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteHostel(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                            "<i class='fa fa-trash'></i> " +
                            "</button> " +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";
                    }
                    $('#tableHostelList').html(tbody);
                }
            });
        }

        $(document).ready(function(){
            hostelList();
            $("#formAddHostel").validate({
                //ignore: ":hidden",
                rules: {
                    name: "required",
                    address: "required",
                    floor: "required",
                    room: "required",
                    studentPerRoom: "required",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertNewHostel',
                        type: 'POST',
                        data: new FormData($("#formAddHostel")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                hostelList();
                                $('#modalEditHostel').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                hostelList();
                                $('#modalEditHostel').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formEditHostel").validate({
                rules: {
                    name: "required",
                    address: "required",
                    floor: "required",
                    room: "required",
                    studentPerRoom: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editHostelList',
                        type: 'POST',
                        data: new FormData($("#formEditHostel")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                hostelList();
                                $('#modalEditHostel').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                hostelList();
                                $('#modalEditHostel').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formdeleteHostel").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteHostelList',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);

                                hostelList();
                                $('#confirm-delete').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#confirm-delete').modal('hide');
                                hostelList();
                            }

                        }
                    });
                    return false;
                }
            });

        });
        function editHostel(i) {
            document.getElementById('dbid').value = data[i]['id'];
            document.getElementById('name1').value = data[i]['name'];
            document.getElementById('address1').value = data[i]['address'];
            document.getElementById('floor1').value = data[i]['floor'];
            document.getElementById('room1').value = data[i]['room'];
            document.getElementById('studentPerRoom1').value = data[i]['roomPerStudent'];
        }
        function deleteHostel(i) {
            document.getElementById('dniddel').value = data[i]['id'] ;
        }

    </script>
@endsection




