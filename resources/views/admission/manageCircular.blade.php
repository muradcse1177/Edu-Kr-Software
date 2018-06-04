@extends('layout.app')
@section('title', 'Circular Management')
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
        <h5 class="m-b-10">Circular Management </h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#noticeset" role="tab"><i class="icofont icofont-ui-message"></i>New Circular Set</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#allnotice" role="tab"><i class="icofont icofont-ui-message"></i>All Circular</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="noticeset" role="tabpanel">
                        <form id="formAddNotice">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="sessionName" name="sessionName" class="form-control ">
                                        <option value="">Academic Year</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="publishdate" name="publishdate" class="form-control " placeholder="Publish Date" >
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="enddate" name="enddate" class="form-control " placeholder="End Date" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6>Upload File:</h6>
                                </div>
                                <div class="col-sm-10">
                                    <input type="file" name="file" class="form-control" id="file" >
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6>Circular Title:</h6>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="title" name="title" class="form-control " placeholder="Circular Title">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-12 ">
                            <textarea id="notice" name="notice" class="form-control ">

                            </textarea>
                                </div>
                            </div><br>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="hidden" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="hidden" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="hidden" class="form-control " placeholder="col">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="allnotice" role="tabpanel">

                        <form id="showAllNotice">
                            <div class="row">
                                <div class="col-sm-12 col-xl-6 m-b-30">
                                    <input type="text" id="publishdate1" name="publishdate" class="form-control " placeholder="Publish Date" >
                                </div>
                                <div class="col-sm-12 col-xl-6 m-b-30">
                                    <input type="text" id="enddate1" name="enddate" class="form-control " placeholder="End Date" >
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
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Notice</button>
                                </div><hr>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="tableForNotice" class="table table-bordered">

                            </table>
                            <div class="modal fade" id="managenotice" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit your curcular structure</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formEditNotice">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="sessionName1" name="sessionName" class="form-control ">
                                                            <option value="">Academic Year</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="publishdate2" name="publishdate" class="form-control " placeholder="Publish Date" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="enddate2" name="enddate" class="form-control " placeholder="End Date" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <h6>Upload File:</h6>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="file" class="form-control" id="file" >
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <h6>Circular Title:</h6>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="title1" name="title" class="form-control " placeholder="Circular Title">
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                    <textarea id="notice1" name="notice" class="form-control ">

                                                    </textarea>
                                                    </div>
                                                </div><br>
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
                            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <center><h4 class="modal-title">Are You Sure to Delete This??</h4></center>

                                        </div>
                                        <form id="formdeleteExam">
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
    </div>

</div>
@endsection
@section('footer')
    @parent
    <script src="/files/assets/pages/wysiwyg-editor/js/tinymce.min.js"></script>
    <script src="/files/assets/pages/wysiwyg-editor/wysiwyg-editor.js"></script>
    <script>
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });
        $( function() {
            $( "#publishdate" ).datepicker({
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
            $( "#publishdate1" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
        $( function() {
            $( "#enddate1" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
        $( function() {
            $( "#publishdate2" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
        $( function() {
            $( "#enddate2" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
        function getSessionist() {
            $.ajax({
                url: '/api/listSession',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Session</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['sessionName'] + '\">'+ data[i]['sessionName'] + '</option>';

                    }
                    $('#sessionName,#sessionName1').html(selectBody);
                }
            });
        }

        $(document).ready(function(){
            getSessionist();

            $("#formAddNotice").validate({
                rules: {
                    sessionName:"required",
                    title:"required",
                    notice:"required",
                    publishdate:"required",
                    enddate:"required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertNewAdCircular',
                        type: 'POST',
                        data: new FormData($("#formAddNotice")[0]),
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
            $("#showAllNotice").validate({
                rules: {
                    publishdate:"required",
                    enddate:"required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/showAllCircular',
                        type: 'POST',
                        data: new FormData($("#showAllNotice")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            if(!$.trim(data)){
                                $('#tableForNotice').html("No data found.Please try again.");
                            }
                            else{
                                var tbody= "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Action</th>" +
                                    " <th>Session</th>" +
                                    " <th>Title</th>" +
                                    " <th>Description</th>" +
                                    " <th>File</th>" +
                                    " <th>Publish Date</th>" +
                                    " <th>End Date</th>" +
                                    " </tr>" +
                                    " </thead>"+
                                    "<tbody>"+
                                    "</tbody>";
                                for(var i=0; i<data.length; i++)
                                {
                                    tbody += "<tr>";
                                    tbody += "<td>"+ (i+1) +"</td>";
                                    tbody += "<td>" +"<div class='animation-model'>" +
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editNoticeList(this.id);' id="+ i +" data-toggle='modal' data-target='#managenotice' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                        "<i class='fa fa-edit'></i> " +
                                        "</button>&nbsp;&nbsp;" +
                                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteNoticeList(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                        "<i class='fa fa-trash'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                    tbody += "<td>"+data[i]['sessionName']+"</td>";
                                    tbody += "<td>"+data[i]['title']+"</td>";
                                    tbody += "<td>"+data[i]['notice']+"</td>";
                                    tbody += '<td><img height=\"40px\" width=\"60px\" src=\"'+data[i]['file']+'\"></td>';
                                    tbody += "<td>"+data[i]['publishdate']+"</td>";
                                    tbody += "<td>"+data[i]['enddate']+"</td>";
                                    tbody += "</tr>";
                                }
                                $('#tableForNotice').html(tbody);

                            }

                        }
                    });
                    return false;
                }
            });

            $("#formEditNotice").validate({
                rules: {
                    sessionName:"required",
                    title:"required",
                    notice:"required",
                    publishdate:"required",
                    enddate:"required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editNewCircular',
                        type: 'POST',
                        data: new FormData($("#formEditNotice")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#managenotice').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#managenotice').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formdeleteExam").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteCircularList',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);

                                $('#confirm-delete').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#confirm-delete').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

        });
        function editNoticeList(i) {
            document.getElementById('dbid').value = data[i]['id'];
            document.getElementById('sessionName1').value = data[i]['sessionName'];
            document.getElementById('title1').value = data[i]['title'];
            tinymce.editors[1].setContent(data[i]['notice']);
            document.getElementById('publishdate2').value = data[i]['publishdate'];
            document.getElementById('enddate2').value = data[i]['enddate'];
        }
        function deleteNoticeList(i) {
            document.getElementById('dniddel').value = data[i]['id'] ;
        }

    </script>

@endsection




