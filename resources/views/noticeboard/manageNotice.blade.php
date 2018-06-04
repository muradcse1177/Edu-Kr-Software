@extends('layout.app')
@section('title', 'Notice Management')
@section('header')
    @parent

    <style>
        #sortable1, #sortable2 {
            border: 1px solid #eee;
            width: 100%;
            min-height: 20px;
            list-style-type: none;
            margin: 0;
            padding: 5px 0 0 0;
            float: left;
            margin-right: 10px;
        }
        #sortable1 li, #sortable2 li {
            margin: 0 50px 5px 5px;
            padding: 5px;
            font-size: 1.2em;
            width: 97%;
        }
    </style>
    <script src="/files/assets/pages/wysiwyg-editor/js/tinymce.min.js"></script>
    <script src="/files/assets/pages/wysiwyg-editor/wysiwyg-editor.js"></script>
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
    <div class="row">
        <div class="col-lg-12 col-xl-12s">
            <ul class="nav nav-tabs md-tabs " role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#noticeset" role="tab"><i class="icofont icofont-ui-message"></i>New Notice Set</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#allnotice" role="tab"><i class="icofont icofont-ui-message"></i>Show Notice</a>
                    <div class="slide"></div>
                </li>
            </ul>
            <div class="tab-content card-block">
                <div class="tab-pane active" id="noticeset" role="tabpanel">
                    <form id="formAddNotice">
                        <div class="form-radio m-b-30">
                            <div class="form-radio m-b-30">
                                <div  class="radio radiofill radio-success radio-inline">
                                    <label>
                                        <input type="radio" name="radio" id="student" value="student">
                                        <i class="helper"></i>Student
                                    </label>
                                </div>
                                <div class="radio radiofill radio-info radio-inline">
                                    <label>
                                        <input type="radio" name="radio" id="teacher"  value="teacher">
                                        <i class="helper"></i>Teacher
                                    </label>
                                </div>
                                <div class="radio radiofill radio-warning radio-inline">
                                    <label>
                                        <input type="radio" name="radio" id="officer" value="officer">
                                        <i class="helper"></i>Officer
                                    </label>
                                </div>
                                <div class="radio radiofill radio-inverse radio-inline">
                                    <label>
                                        <input type="radio" name="radio" id="stuff" value="stuff">
                                        <i class="helper"></i>Stuff
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group  row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inputSuccess1">Select Type</label>
                            </div>
                            <div class="col-sm-10">
                                <select id="noticeType" name="noticeType" class="form-control ">
                                    <option value="">Select Type</option>
                                    <option value="featured">Featured News</option>
                                    <option value="upcoming">Upcoming Events</option>
                                    <option value="noticeboard">Notice Board</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6>Notice Title:</h6>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Notice Title">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12 ">
                                    <textarea class="tinymce" name="notice" id="texteditor" required></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6>Upload File/Image:</h6>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="file" class="form-control" id="file" >
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="publishdate" name="publishdate" class="form-control " placeholder="Publish Date" >
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="enddate" name="enddate" class="form-control " placeholder="End Date" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <button id="submitClassInfo" class="form-control form-bg-primary">Send SMS</button>
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
                        <hr><center><h5>NoticeList List of your School</h5></center><hr>
                        <table id ="tableForNotice" class="table table-bordered">

                        </table>
                        <div class="modal fade" id="managenotice" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit your notice structure</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditNotice">
                                            <div class="form-radio m-b-30">
                                                <div class="form-radio m-b-30">
                                                    <div  class="radio radiofill radio-success radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio" id="student1" value="student">
                                                            <i class="helper"></i>Student
                                                        </label>
                                                    </div>
                                                    <div class="radio radiofill radio-info radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio" id="teacher1"  value="teacher">
                                                            <i class="helper"></i>Teacher
                                                        </label>
                                                    </div>
                                                    <div class="radio radiofill radio-warning radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio" id="officer1" value="officer">
                                                            <i class="helper"></i>Officer
                                                        </label>
                                                    </div>
                                                    <div class="radio radiofill radio-inverse radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio" id="stuff1" value="stuff">
                                                            <i class="helper"></i>Stuff
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <h6>Notice Title:</h6>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control" id="title1" placeholder="Notice Title">
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    <textarea class="tinymce" name="notice" id="texteditor1" required></textarea>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <h6>Upload File:</h6>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="file" name="file" class="form-control" id="file1" >
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="publishdate2" name="publishdate" class="form-control " placeholder="Publish Date" >
                                                </div>
                                                <div class="col-sm-12 col-xl-3 m-b-30">
                                                    <input type="text" id="enddate2" name="enddate" class="form-control " placeholder="End Date" >
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="dbid" name="dbid" class="form-control ">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Send Sms</button>
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
        $(document).ready(function(){

            $("#formAddNotice").validate({
                rules: {
                    radio:"required",
                    title:"required",
                    notice:"required",
                    publishdate:"required",
                    enddate:"required",
                    noticeType:"required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertNewNotice',
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
                        url: '/api/showAllNotice',
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
                                    " <th>Notice For</th>" +
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
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editNoticeList(this.id);' id="+ i +" data-toggle='' data-target='' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                        "<i class='fa fa-edit'></i> " +
                                        "</button>&nbsp;&nbsp;" +
                                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteNoticeList(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                        "<i class='fa fa-trash'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                    tbody += "<td>"+data[i]['noticeFor']+"</td>";
                                    tbody += "<td>"+data[i]['noticeTitle']+"</td>";
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

            $("#formdeleteExam").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteNoticeList',
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
            window.location.href = "/api/editNotice1stStep?id="+data[i]['id'];
        }
        function deleteNoticeList(i) {
            document.getElementById('dniddel').value = data[i]['id'] ;
        }

    </script>

@endsection




