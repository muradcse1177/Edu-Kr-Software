@extends('layout.app')
@section('title', 'Exam Type Management')
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
            <h5 class="m-b-10">Examination Management</h5>
            <hr>
                <div class="row">
                    <div  class="col-sm-3">
                        <input type="hidden" id="examName" name="examName" class="form-control " placeholder="Exam Name">
                    </div>
                    <div class="col-sm-6">
                        <center> <button class="form-control btn btn-primary" data-toggle="modal" data-target="#create_a_new_exam_type" data-toggle="tooltip"   data-placement="top" title="Edit">
                                click here to add exam.</button></center>
                    </div>
                    <div class="col-sm-3">
                        <input type="hidden" id="examName" name="examName" class="form-control " placeholder="Exam Name">
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <hr><center><h5>Examination Name List</h5></center><hr>
                    <div class="table-responsive">
                    <table id="examList" class="table table-bordered">

                    </table>
                </div>
                <div class="modal fade" id="create_a_new_exam_type" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add A New Examination</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formExamSet">
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Exam Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" name="examName" class="form-control " id="examName" placeholder="Enter Exam Name">
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Class Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select name="status" id="status" class="form-control ">
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Add Exam</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editExam" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Exam type</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editformExamSet">
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Exam Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" name="examName" class="form-control " id="examName1" placeholder="Enter Exam Name">
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Class Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select name="status" id="status1" class="form-control ">
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="dbid" name="dbid" value="" class="form-control " placeholder="col">
                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Edit Exam</button>
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
@endsection
@section('footer')
    @parent
    <script>
        var data;
        function getClassName() {
            $.ajax({
                url: '/api/getClassNameExam',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Class</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        var classValue = data[i]['classNum'];
                        switch (classValue) {
                            case 1:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">One</option>';
                                break;
                            case 2:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Two</option>';
                                break;
                            case 3:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Three</option>';
                                break;
                            case 4:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Four</option>';
                                break;
                            case 5:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Five</option>';
                                break;
                            case 6:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Six</option>';
                                break;
                            case 7:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Seven</option>';
                                break;
                            case 8:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Eight</option>';
                                break;
                            case 9:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Nine</option>';
                                break;
                            case 10:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Ten</option>';
                                break;
                            case 11:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Eleven</option>';
                                break;
                            case 12:
                                selectBody += '<option value=\"' + data[i]['classNum'] + '\">Twelve</option>';
                                break;
                        }

                    }
                    $('#className,#className1,#class1').html(selectBody);
                }
            });
        }
        function examList() {
            $.ajax({
                url: '/api/showExamList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Class Name</th>" +
                        " <th>Status</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['examName']+"</td>";
                        tbody += "<td>"+data[i]['status']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editDesig(this.id);' id="+ i +" data-toggle='modal' data-target='#editExam' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit'></i> " +
                            "</button>&nbsp;&nbsp;" +
                            "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteDesig(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                            "<i class='fa fa-trash'></i> " +
                            "</button> " +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";
                    }
                    $('#examList').html(tbody);
                }
            });
        }

        $(document).ready(function(){
            getClassName();
            examList();

            $("#formExamSet").validate({
                //ignore: ":hidden",
                rules: {
                    amount: "required",
                    className: "required",
                    status: "required",
                },
                messages: {
                    amount: "Please give Valid Examination Name",
                    className: "Please give Valid Class Name",
                    status: "Please give Exam status",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertExamSetup',
                        type: 'POST',
                        data: new FormData($("#formExamSet")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                examList();
                                $('#create_a_new_exam_type').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                examList();
                                $('#create_a_new_exam_type').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#editformExamSet").validate({
                rules: {
                    amount: "required",
                    className: "required",
                    status: "required",
                },
                messages: {
                    amount: "Please give Valid Examination Name",
                    className: "Please give Valid Class Name",
                    status: "Please give Exam status",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editExamSetup',
                        type: 'POST',
                        data: new FormData($("#editformExamSet")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                examList();
                                $('#editExam').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                examList();
                                $('#editExam').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formdeleteExam").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteExamNameSet',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);

                                $('#confirm-delete').modal('hide');
                                examList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#confirm-delete').modal('hide');
                                examList();
                            }

                        }
                    });
                    return false;
                }
            });

        });

        function editDesig(i) {
            document.getElementById('dbid').value = data[i]['id'];
            document.getElementById('examName1').value = data[i]['examName'];
            document.getElementById('className1').value = data[i]['className'];
            document.getElementById('status1').value = data[i]['status'];
        }
        function deleteDesig(i) {
            document.getElementById('dniddel').value = data[i]['id'] ;
        }
    </script>
@endsection
