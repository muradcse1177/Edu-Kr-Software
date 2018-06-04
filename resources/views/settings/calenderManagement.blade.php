@extends('layout.app')
@section('title', 'Academic Calander')
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
                <h5 class="m-b-10">Holyday/Event Management</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-xl-12s">
                        <ul class="nav nav-tabs md-tabs " role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add New Holyday/Event</a>
                                <div class="slide"></div>
                            </li>

                        </ul>
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="feeslog" role="tabpanel">
                                <form id="formAddSliderImage">
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Select Type</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <select id="eventType" name="eventType" class="form-control ">
                                                <option value="">Select Type</option>
                                                <option value="holyday">Holyday</option>
                                                <option value="event">Event</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Title</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="title" name="title" class="form-control " placeholder="Title" >
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Start Date</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="startdate" name="startdate" class="form-control " placeholder="Start Date" >
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">End Date</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="enddate" name="enddate" class="form-control " placeholder="End Date" >
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
                                            <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Holyday/Event</button>
                                        </div><hr>
                                    </div>
                                </form>
                                <hr>
                                <center> <h4>Notice List</h4></center>
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
                                                    <form id="formEditSlideImg">
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Select Type</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select id="editeventType" name="editeventType" class="form-control ">
                                                                    <option value="">Select Type</option>
                                                                    <option value="holyday">Holyday</option>
                                                                    <option value="event">Event</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Title</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="edittitle" name="edittitle" class="form-control " placeholder="Title" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Start Date</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="editstartdate" name="editstartdate" class="form-control " placeholder="Start Date" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">End Date</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="editenddate" name="editenddate" class="form-control " placeholder="End Date" >
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="dbid" class="form-control " id="dbid" placeholder="">
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
                                                    <form id="formDeleteSliderImage">
                                                        <input type="hidden" id="dbidmain" name="dbidmain" class="form-control " value="" >
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger ">Delete</button>
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
    </div>
@endsection
@section('footer')
    @parent
    <script>


        $( function() {
            $( "#startdate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
        $( function() {
            $( "#enddate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
        $( function() {
            $( "#editstartdate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
        $( function() {
            $( "#editenddate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );


        function eventList() {
            $.ajax({
                url: '/api/showEvent',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Event/Holyday Type</th>" +
                        " <th>Title</th>" +
                        " <th>Start Ddate</th>" +
                        " <th>End Date</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['eventType']+"</td>";
                        tbody += "<td>"+data[i]['title']+"</td>";
                        tbody += "<td>"+data[i]['startdate']+"</td>";
                        tbody += "<td>"+data[i]['enddate']+"</td>";
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
        $(document).ready(function(){
            eventList();

            $("#formAddSliderImage").validate({
                //ignore: ":hidden",
                rules: {
                    eventType	: "required",
                    title: "required",
                    startdate: "required",
                    enddate: "required"
                },
                messages: {
                    eventType: "Please give Event/Holyday Name",
                    title: "Please give Title",
                    startdate: "Please give Start Date",
                    enddate: "Please give End Date"
                },

                submitHandler: function(form) {
                    // var myform = document.getElementById("formStdBasicInfo");
                    // var formData = new FormData(myform );
                    $.ajax({
                        url: '/api/insertEventDay',
                        type: 'POST',
                        data: new FormData($("#formAddSliderImage")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                eventList();
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


            $("#formEditSlideImg").validate({
                rules: {
                    eventType	: "required",
                    title: "required",
                    startdate: "required",
                    enddate: "required"
                },
                messages: {
                    eventType: "Please give Event/Holyday Name",
                    title: "Please give Title",
                    startdate: "Please give Start Date",
                    enddate: "Please give End Date"
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editEvent',
                        type: 'POST',
                        data: new FormData($("#formEditSlideImg")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                eventList();
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
            $("#formDeleteSliderImage").validate({

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteEvent',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                eventList();
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

        });

        function editDesig(i) {
            document.getElementById('dbid').value = data[i]['id'];

            console.log( data[i]['eventType']);
            document.getElementById('editeventType').value = data[i]['eventType'];
            document.getElementById('edittitle').value = data[i]['title'];
            document.getElementById('editstartdate').value = data[i]['startdate'];
            document.getElementById('editenddate').value = data[i]['enddate'];
        }

        function deleteDesig(i) {
            console.log( data[i]['id']);
            document.getElementById('dbidmain').value = data[i]['id'];
        }

    </script>
@endsection



