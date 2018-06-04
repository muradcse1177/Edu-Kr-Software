@extends('layout.app')
@section('title', 'Class Management')
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
                <h5 class="m-b-10">Class Management</h5>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalAddSession" data-toggle="tooltip"   data-placement="top" title="Edit">
                            <i class="fa fa-plus-square"></i>Add academic session</button>
                    </div>
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_class" data-toggle="tooltip"   data-placement="top" title="Edit">
                            <i class="fa fa-plus-square"></i>Create a new Class</button>
                    </div>
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_shift" data-toggle="tooltip"   data-placement="top" title="Edit">
                            <i class="fa fa-plus-square"></i>Create a new Shift</button>
                    </div>
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_group" data-toggle="tooltip"   data-placement="top" title="Edit">
                            <i class="fa fa-plus-square"></i>Create a new Group</button>
                    </div>
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_medium" data-toggle="tooltip"   data-placement="top" title="Edit">
                            <i class="fa fa-plus-square"></i>Create a new Medium</button>
                    </div>
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_version" data-toggle="tooltip"   data-placement="top" title="Edit">
                            <i class="fa fa-plus-square"></i>Create a new Version</button>
                    </div>
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_section" data-toggle="tooltip"   data-placement="top" title="Edit">
                            <i class="fa fa-plus-square"></i>Create a new Section</button>
                    </div>
                </div><hr>
                <div class="row">
                    <div  class="col-sm-3">
                        <input type="hidden" id="examName" name="examName" class="form-control " placeholder="Exam Name">
                    </div>
                    <div class="col-sm-6">
                        <center> <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalAddClassManagement" data-toggle="tooltip"   data-placement="top" title="">
                                <i class="fa fa-plus-square"></i>Class Management</button> </center>
                    </div>
                </div><hr>
                <div class="card-block table-border-style">
                    <center><h5>Class List of your School</h5></center><hr>
                    <div class="table-responsive">
                        <table id="tableClassInfo" class="table table-bordered">

                        </table>
                    </div>
                    <div class="modal fade" id="modalAddSession" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Academic Session</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAccademicSession">
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Session Name</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="sessionName" class="form-control" id="sessionName" placeholder="Enter Session ">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="create_a_new_class" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Class</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAccademicClass">
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Class Number</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="classNum" class="form-control" id="classNum" placeholder="Enter Class Number">
                                            </div>
                                        </div>
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Class Name</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="className" class="form-control" id="className" placeholder="Enter Class Name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="create_a_new_shift" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create your Shift</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAccademicShift">
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Shift Name</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="shiftName" class="form-control" id="shiftName" placeholder="Enter Shift Name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="create_a_new_group" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create your Group</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAccademicGroup">
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Group Name</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="groupName" class="form-control" id="groupName" placeholder="Enter Group Name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="create_a_new_medium" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create your Medium</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAccademicMedium">
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Medium Name</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="mediumName" class="form-control" id="mediumName" placeholder="Enter Medium Name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="create_a_new_section" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create your Version</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAccademicSection">
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Section Name</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="sectionName" class="form-control" id="sectionName" placeholder="Enter Section Name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="create_a_new_version" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create your Version</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAccademicVersion">
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Version Name</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="versionName" class="form-control" id="versionName" placeholder="Enter Version Name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalAddClassManagement" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Class Info</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAccademic">
                                        <div class="row">
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="sessionNameMain" name="sessionName" class="form-control" >
                                                    <option value="">Select Session</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="mediumNameMain" name="mediumName" class="form-control" >
                                                    <option value="">Medium</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="versionNameMain" name="versionName" class="form-control" >
                                                    <option value="">Version</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="shiftNameMain" name="shiftName" class="form-control" >
                                                    <option value="">Shift</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="classNameMain" name="className" class="form-control" >
                                                    <option value="">Class</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="sectionNameMain" name="sectionName" class="form-control" >
                                                    <option value="">Section</option>
                                                </select>
                                            </div>
                                            {{--<div id="divGroup" class="col-sm-12 col-xl-3 m-b-30" style="display: block;">--}}
                                                {{--<select id="groupNameMain" name="groupName" class="form-control" >--}}
                                                    {{--<option value="">Group</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editClassInfoModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit your class structure</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editformAccademic">
                                        <div class="row">
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="sessionNameMain1" name="sessionName" class="form-control" >
                                                    <option value="">Select Session</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="mediumNameMain1" name="mediumName" class="form-control" >
                                                    <option value="">Medium</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="versionNameMain1" name="versionName" class="form-control" >
                                                    <option value="">Version</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="shiftNameMain1" name="shiftName" class="form-control" >
                                                    <option value="">Shift</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="classNameMain1" name="className" class="form-control" >
                                                    <option value="">Class</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="sectionNameMain1" name="sectionName" class="form-control" >
                                                    <option value="">Section</option>
                                                </select>
                                            </div>
                                            {{--<div id="divGroup" class="col-sm-12 col-xl-3 m-b-30" style="display: block;">--}}
                                                {{--<select id="groupNameMain1" name="groupName" class="form-control" >--}}
                                                    {{--<option value="">Group</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" id="dbid" name="dbid" value="" class="form-control " placeholder="col">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
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
    <script>
        var data;
        function getSession() {
            $.ajax({
                url: '/api/getSession',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Session</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['sessionName'] + '\">'+ data[i]['sessionName'] + '</option>';

                    }
                    $('#sessionNameMain,#sessionNameMain1').html(selectBody);
                }
            });
        }
        function getMedium() {
            $.ajax({
                url: '/api/getMedium',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Medium</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['mediumName'] + '\">'+ data[i]['mediumName'] + '</option>';

                    }
                    $('#mediumNameMain,#mediumNameMain1').html(selectBody);
                }
            });
        }
        function getVersion() {
            $.ajax({
                url: '/api/getVersion',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Version</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['versionName'] + '\">'+ data[i]['versionName'] + '</option>';

                    }
                    $('#versionNameMain,#versionNameMain1').html(selectBody);
                }
            });
        }
        function getShift() {
            $.ajax({
                url: '/api/getShift',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Shift</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['shiftName'] + '\">'+ data[i]['shiftName'] + '</option>';

                    }
                    $('#shiftNameMain,#shiftNameMain1').html(selectBody);
                }
            });
        }
        function getSections() {
            $.ajax({
                url: '/api/getSections',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Section</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['sectionName'] + '\">'+ data[i]['sectionName'] + '</option>';

                    }
                    $('#sectionNameMain,#sectionNameMain1').html(selectBody);
                }
            });
        }
        function getClass() {
            $.ajax({
                url: '/api/getClass',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Class</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['classNum'] + '\">'+ data[i]['className'] + '</option>';

                    }
                    $('#classNameMain,#classNameMain1').html(selectBody);
                }
            });
        }

        function getGroup() {
            $.ajax({
                url: '/api/getGroup',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Group</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['groupName'] + '\">'+ data[i]['groupName'] + '</option>';

                    }
                    $('#groupNameMain,#groupNameMain1').html(selectBody);
                }
            });
        }
        // $('#classNameMain').on('change', function() {
        //     var classNum =  $('#classNameMain').val();
        //     if(classNum<13)
        //         $("#divGroup").css("display", "none");
        //     else
        //         $("#divGroup").css("display", "block");
        // });

        function classInfoList() {
            $.ajax({
                url: '/api/showClassInfoList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    length = data.length;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Class Code</th>" +
                        " <th>Session</th>" +
                        " <th>Medium </th>" +
                        " <th>Version</th>" +
                        " <th>Shift</th>" +
                        " <th>Class</th>" +
                        " <th>Section</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['classId']+"</td>";
                        tbody += "<td>"+data[i]['sessionName']+"</td>";
                        tbody += "<td>"+data[i]['mediumName']+"</td>";
                        tbody += "<td>"+data[i]['versionName']+"</td>";
                        tbody += "<td>"+data[i]['shiftName']+"</td>";
                        tbody += "<td>"+data[i]['classNum']+"</td>";
                        tbody += "<td>"+data[i]['sectionName']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <a href='' class='' onclick='editClassInfo(this.id);' id="+ i +" data-toggle='modal' data-target='#editClassInfoModal' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit' style='color: navy;'></i> " +
                            "</a>&nbsp;&nbsp;" +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";
                    }
                    $('#tableClassInfo').html(tbody);
                }
            });
        }

        function editClassInfo(i){
            console.log(data[i]['classId']);
            $("#dbid").val(data[i]['classId']);
            $("#sessionNameMain1").val(data[i]['sessionName']);
            $("#mediumNameMain1").val(data[i]['mediumName']);
            $("#versionNameMain1").val(data[i]['versionName']);
            $("#shiftNameMain1").val(data[i]['shiftName']);
            $("#classNameMain1").val(data[i]['classNum']);
            $("#sectionNameMain1").val(data[i]['sectionName']);
        }
        $(document).ready(function(){
            getSession();
            getMedium();
            getVersion();
            getShift();
            getSections();
            getClass();
            getGroup();
            classInfoList();

            $("#editformAccademic").validate({
                //ignore: ":hidden",
                rules: {
                    sessionName:"required",
                    mediumName:"required",
                    versionName:"required",
                    shiftName:"required",
                    className:"required",
                    sectionName:"required",
                    groupName:"required",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editAcademicInfo',
                        type: 'POST',
                        data: new FormData($("#editformAccademic")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#editClassInfoModal').modal('hide');
                                classInfoList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#editClassInfoModal').modal('hide');
                                classInfoList();
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formAccademic").validate({
                //ignore: ":hidden",
                rules: {
                    sessionName:"required",
                    mediumName:"required",
                    versionName:"required",
                    shiftName:"required",
                    className:"required",
                    sectionName:"required",
                    groupName:"required",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertAcademicInfo',
                        type: 'POST',
                        data: new FormData($("#formAccademic")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#modalAddClassManagement').modal('hide');
                                classInfoList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#modalAddClassManagement').modal('hide');
                                classInfoList();
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formAccademicVersion").validate({
                //ignore: ":hidden",
                rules: {
                    versionName:"required"
                },
                messages: {
                    versionName: "Please give Version Name",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertAcademicVersion',
                        type: 'POST',
                        data: new FormData($("#formAccademicVersion")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#create_a_new_version').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#create_a_new_version').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formAccademicSection").validate({
                //ignore: ":hidden",
                rules: {
                    sectionName:"required"
                },
                messages: {
                    sectionName: "Please give Section Name",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertAcademicSection',
                        type: 'POST',
                        data: new FormData($("#formAccademicSection")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#create_a_new_section').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#create_a_new_section').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formAccademicMedium").validate({
                //ignore: ":hidden",
                rules: {
                    mediumName:"required"
                },
                messages: {
                    mediumName: "Please give Medium Name",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertAcademicMedium',
                        type: 'POST',
                        data: new FormData($("#formAccademicMedium")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#create_a_new_medium').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#create_a_new_medium').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formAccademicGroup").validate({
                //ignore: ":hidden",
                rules: {
                    groupName:"required"
                },
                messages: {
                    groupName: "Please give Group Name",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertAcademicGroup',
                        type: 'POST',
                        data: new FormData($("#formAccademicGroup")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#create_a_new_group').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#create_a_new_group').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formAccademicShift").validate({
                //ignore: ":hidden",
                rules: {
                    shiftName:"required"
                },
                messages: {
                    shiftName: "Please give Shift Name",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertAcademicShift',
                        type: 'POST',
                        data: new FormData($("#formAccademicShift")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#create_a_new_shift').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#create_a_new_shift').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formAccademicClass").validate({
                //ignore: ":hidden",
                rules: {
                    classNum: {required: true, number: true},
                    className:"required"
                },
                messages: {
                    classNum: "Please give Class Number",
                    className: "Please give Class Name",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertAcademicClass',
                        type: 'POST',
                        data: new FormData($("#formAccademicClass")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#create_a_new_class').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#create_a_new_class').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formAccademicSession").validate({
                //ignore: ":hidden",
                rules: {
                    sessionName: "required",
                },
                messages: {
                    sessionName: "Please give Session Name",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertAcademicSession',
                        type: 'POST',
                        data: new FormData($("#formAccademicSession")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#modalAddSession').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#modalAddSession').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });


        });

    </script>
@endsection
