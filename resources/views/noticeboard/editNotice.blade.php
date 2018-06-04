@extends('layout.app')
@section('title', 'Edit Notice')
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
                            <a class="nav-link active" data-toggle="tab" href="#noticeset" role="tab"><i class="icofont icofont-ui-message"></i>Update Notice </a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="noticeset" role="tabpanel">
                            <form id="formEditNotice">
                                <div class="form-radio m-b-30">
                                    <div class="form-radio m-b-30">
                                        <div  class="radio radiofill radio-success radio-inline">
                                            <label>
                                                <input type="radio" name="radio" id="student" value="student" @if(($data[0]['noticeFor'])=='student') {{'checked'}}@endif>
                                                <i class="helper"></i>Student
                                            </label>
                                        </div>
                                        <div class="radio radiofill radio-info radio-inline">
                                            <label>
                                                <input type="radio" name="radio" id="teacher"  value="teacher" @if(($data[0]['noticeFor'])=='teacher') {{'checked'}}@endif>
                                                <i class="helper"></i>Teacher
                                            </label>
                                        </div>
                                        <div class="radio radiofill radio-warning radio-inline">
                                            <label>
                                                <input type="radio" name="radio" id="officer" value="officer" @if(($data[0]['noticeFor'])== 'officer') {{'checked'}}@endif>
                                                <i class="helper"></i>Officer
                                            </label>
                                        </div>
                                        <div class="radio radiofill radio-inverse radio-inline">
                                            <label>
                                                <input type="radio" name="radio" id="stuff" value="stuff" @if(($data[0]['noticeFor'])== 'stuff') {{'checked'}}@endif>
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
                                        <input type="text" name="title" class="form-control" id="title" value="{{$data[0]['noticeTitle']}}" placeholder="Notice Title">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <textarea class="tinymce" name="notice" id="texteditor" required>{{$data[0]['notice']}}</textarea>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6>Upload File:</h6>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="file" name="file" class="form-control" id="file" >
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="publishdate" name="publishdate" value="{{$data[0]['publishdate']}}" class="form-control " placeholder="Publish Date" >
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <input type="text" id="enddate" name="enddate" class="form-control " value="{{$data[0]['enddate']}}" placeholder="End Date" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <button type="submit" id="dbid" name="dbid" value="{{$data[0]['id']}}" class="form-control form-bg-primary">Save Info</button>
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

        $(document).ready(function(){

            $("#formEditNotice").validate({
                rules: {
                    radio:"required",
                    title:"required",
                    notice:"required",
                    publishdate:"required",
                    enddate:"required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editNewNotice',
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
        });

    </script>

@endsection




