@extends('layout.app')
@section('title', 'Set Course')
@section('header')
    @parent

    <style>
        #sortable1, #sortable2 {
            border: 1px solid #eee;
            width: 100%;
            min-height: 300px;
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
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
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
                <center> <h4>Course Management</h4></center><hr>
            </div>
            <div class="card-block">
                <form id="formSearchStudentId">
                    <div class="form-group has-success row">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="inputSuccess1">Student ID</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="studentId" class="form-control " id="studentId" placeholder="Enter Student Id">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Subject</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12 col-xl-4">
                        <div class="card-header">
                            <h5 class="card-header-text">Drag From total subject</h5><hr>
                        </div>
                        <div class="card-block p-b-0">
                            <div class="row">
                                <div class="col-md-12" id="draggableMultiple">
                                    <ul id="sortable1" class="connectedSortable">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="col-lg-12 col-xl-4">
                        <div class="card-header">
                            <h5 class="card-header-text">Drop Compulsory Sub field</h5><hr>
                        </div>
                        <div class="card-block p-b-0">
                            <input type="hidden" name="subType" class="form-control " id="subType" value="Compulsory">
                            <input type="hidden" name="classId" class="form-control " id="classId">
                            <input type="hidden" name="groupName" class="form-control " id="groupName">
                            <input type="hidden" name="studentId" class="form-control " id="studentId1">
                            <form id="addComSub">
                                <div class="row">
                                    <div class="col-md-12" id="draggableMultiple">
                                        <ul id="sortable2" class="connectedSortable">

                                        </ul>
                                    </div>
                                    <div class="col-sm-12">
                                        <button align="right" type="submit" id="submitClassInfo" class="form-control form-bg-primary">Save Subject</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><hr>
                    <div class="col-lg-12 col-xl-4">
                        <div class="card-header">
                            <h5 class="card-header-text">Drop Optional Sub field</h5><hr>
                        </div>
                        <div class="card-block p-b-0">
                            <input type="hidden" name="subType" class="form-control " id="subType1" value="Optional">
                            <input type="hidden" name="classId" class="form-control " id="classId1">
                            <input type="hidden" name="groupName" class="form-control " id="groupName1">
                            <input type="hidden" name="studentId" class="form-control " id="studentId1">
                            <form id="addOptionSub">
                                <div class="row">
                                    <div class="col-md-12" id="draggableMultiple">
                                        <ul id="sortable2" class="connectedSortable">

                                        </ul>
                                    </div>
                                    <div class="col-sm-12">
                                        <button align="right" type="submit" id="submitClassInfo" class="form-control form-bg-primary">Save Subject</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><br>
            </div>
        </div>

    </div>
</div>

@endsection
@section('footer')
    @parent
    <script>

        $(document).ready(function(){

            $("#addOptionSub").validate({

                submitHandler: function(form) {
                    var data = JSON.stringify( $(form).serializeArray() );
                    //console.log( data );
                    var subType = $('#subType1').val();
                    var classId = $('#classId1').val();
                    var groupName = $('#groupName1').val();
                    var studentId = $('#studentId1').val();
                    var fullJson = "{\"subType\": \"" +subType+ "\", \"classId\": \"" +classId+ "\", \"groupName\": \"" +groupName+ "\", \"studentId\": \"" +studentId+ "\", \"sublist\": " + data + "}";
                    console.log(fullJson);

                    $.ajax({
                        url: '/api/insertOptionalSub',
                        type: 'POST',
                        data: fullJson,
                        dataType:'json',
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

            $("#addComSub").validate({

                submitHandler: function(form) {
                    var data = JSON.stringify( $(form).serializeArray() );
                    //console.log( data );
                    var subType = $('#subType').val();
                    var classId = $('#classId').val();
                    var groupName = $('#groupName').val();
                    var studentId = $('#studentId').val();
                    var fullJson = "{\"subType\": \"" +subType+ "\", \"classId\": \"" +classId+ "\", \"groupName\": \"" +groupName+ "\", \"studentId\": \"" +studentId+ "\", \"sublist\": " + data + "}";
                    console.log(fullJson);

                    $.ajax({
                        url: '/api/insertCompulsorySub',
                        type: 'POST',
                        data: fullJson,
                        dataType:'json',
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
            $("#formSearchStudentId").validate({
                //ignore: ":hidden",
                rules: {
                    studentId:"required"
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/searchStudentIdForSub',
                        type: 'POST',
                        data: new FormData($("#formSearchStudentId")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            //console.log(data);
                            var subjectBody= '';

                            for(var i=0; i<data.length; i++)
                            {
                                subjectBody+=' <li class="ui-state-highlight"><input type="hidden" name=\"'+ data[i]['name']+'\" value=\"'+ data[i]['code'] +'\">'+ data[i]['name']+'</li>';
                            }
                            $('#sortable1').html(subjectBody);
                            $("#classId").val(data[0]['classId']);
                            $("#groupName").val(data[0]['groupName']);
                            $("#classId1").val(data[0]['classId']);
                            $("#groupName1").val(data[0]['groupName']);
                            $("#studentId1").val(data[0]['studentId']);
                            $("#studentId2").val(data[0]['studentId']);
                        }
                    });
                    return false;
                }
            });
        });
    </script>
    <script>
        $( function() {
            $( "#sortable1, #sortable2" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        } );
    </script>
    <script src="/files/assets/pages/nestable/jquery.nestable.js"></script>
    <script src="/files/assets/pages/nestable/custom-nestable.js"></script>
@endsection