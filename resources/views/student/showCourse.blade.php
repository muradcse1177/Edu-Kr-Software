@extends('layout.app')
@section('title', 'Show Course')
@section('header')
    @parent
    <link rel="stylesheet" type="text/css" href="/files/bower_components/switchery/css/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="/files/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css" />
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header table-card-header">
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

                <div class="card-block table-border-style">
                    <hr><center> <h5>Student Course Details</h5></center><hr>
                    <div class="table-responsive">
                        <table id="tablePeroidList" class="table table-bordered">

                        </table>
                    </div>
                    <div class="modal fade" id="student-update" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Students Subjects</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="sub-title">Compulsory Subject</h4>
                                            <div class="tags_add_multiple">
                                                <input class="" type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="sub-title">Optional Subject</h4>
                                            <div class="tags_add_multiple">
                                                <input class="" type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput">
                                            </div>
                                        </div>
                                    </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
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
    <script src="/files/bower_components/switchery/js/switchery.min.js"></script>
    <script src="/files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
    <script src="/files/assets/pages/advance-elements/swithces.js"></script>
    <script>

        $("#formSearchStudentId").validate({
            //ignore: ":hidden",
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/showAllSubjectList',
                    type: 'POST',
                    data: new FormData($("#formSearchStudentId")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        data = response.data;
                        console.log(data);
                        length = data.length;
                        if ($.trim(data))  {
                            var tbody = "<thead> " +
                                "<tr> " +
                                "<th>SL. No</th>" +
                                " <th>Sub Name</th>" +
                                " <th>Sub Code</th>" +
                                " <th>Sub Type</th>" +
                                " <th style='display:none;'>Class Name</th>" +
                                " </tr>" +
                                " </thead>" +
                                "<tbody>" +
                                "</tbody>";
                            for (var i = 0; i < data.length; i++) {
                                tbody += "<tr>";
                                tbody += "<td >" + (i + 1) + "</td>";
                                tbody += "<td>" + data[i]['name'] + "</td>";
                                tbody += "<td>" + data[i]['code'] + "</td>";
                                tbody += "<td>" + data[i]['subType'] + "</td>";
                                tbody += "<td style=\"display:none;\">" + data[i]['id'] + "</td>";
                                tbody += "</tr>";
                            }
                            $('#tablePeroidList').html(tbody);

                            $('#tablePeroidList').Tabledit({
                                url: '/api/updateSubjectType',
                                deleteButton: false,
                                columns: {
                                    identifier: [4, 'id'],
                                    editable: [[3, 'subType']]
                                },
                                onSuccess: function (data, textStatus, jqXHR) {
                                    if (typeof data.successMsg !== 'undefined') {
                                        notify('success', data.successMsg);
                                    }
                                    if (typeof data.errorMsg !== 'undefined') {
                                        notify('danger', data.errorMsg);
                                    }
                                },
                            });
                        }
                        else{
                            $('#tablePeroidList').html("No data found.Please try again.");
                        }

                    }
                });
                return false;
            }
        });
    </script>
    <script src="/files/assets/pages/edit-table/jquery.tabledit.js"></script>
@endsection