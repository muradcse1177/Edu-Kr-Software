@extends('layout.app')
@section('title', 'Grade Management')
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
            <center><h5 class="m-b-10">Manage Examination Grade. </h5></center>
            <hr>
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12 col-xl-6 m-b-30">
                        <select name="className" id="className" class="form-control ">

                        </select>
                    </div>
                </div><hr>
                <div class="row">
                    <div  class="col-sm-3">
                        <input type="hidden" id="examName" name="examName" class="form-control " placeholder="Exam Name">
                    </div>
                    <div class="col-sm-4">
                        <center> <button class="form-control btn btn-primary" data-toggle="modal" data-target="#addNewGrade" data-toggle="tooltip"   data-placement="top" >
                                Add New grade</button></center>
                    </div>
                    <div class="col-sm-5">
                        <input type="hidden" id="examName" name="examName" class="form-control " placeholder="Exam Name">
                    </div>
                </div>
            </div>
                <div class="table-responsive">
                    <hr><center><h5>Grade List</h5></center><br>
                    <table id="gradeList" class="table table-bordered">

                    </table>
                </div>
                <div class="modal fade" id="addNewGrade" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add examination grade.</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addGrade">
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <select name="class" id="className1" class="form-control ">

                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <input type="text" id="lowerMark" name="lowerMark" class="form-control " placeholder="Lower Mark">
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <input type="text" id="upperMark" name="upperMark" class="form-control " placeholder="Upper Mark">
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <select name="courseCode" id="courseCode" class="form-control">

                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <input type="text" id="grade" name="grade" class="form-control " placeholder="Grade">
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <input type="text" id="gpa" name="gpa" class="form-control " placeholder="GPA">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Add New</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editGradeModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Manage examination grade.</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editGrade">
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <select id="class1" name="class" class="form-control ">

                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <input type="text" id="lowerMark1" name="lowerMark" class="form-control " placeholder="Lower Mark">
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <input type="text" id="upperMark1" name="upperMark" class="form-control " placeholder="Upper Mark">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <select id="courseCode1" name="courseCode" class="form-control">

                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <input type="text" id="grade1" name="grade" class="form-control " placeholder="Grade">
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <input type="text" id="gpa1" name="gpa" class="form-control " placeholder="GPA">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="dbid" name="dbid" value="" class="form-control " placeholder="col">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save Change</button>
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
                            <form id="formdeleteGrade">
                                <div class="modal-footer">
                                    <input type="hidden" id="dbiddel" name="dbiddel" value="" class="form-control " placeholder="col">
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
        $('#className').on('change', function() {
            var className= this.value ;
            $.ajax({
                url: '/api/gradeListSelect',
                type: 'POST',
                data: className,
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    if(!$.trim(data)){
                        $('#gradeList').html("No data found.Please try again.");
                    }
                    else{
                        var tbody= "<thead> " +
                            "<tr> " +
                            "<th>SL. No</th>" +
                            " <th>Class</th>" +
                            " <th>Subject Code</th>" +
                            " <th>Lower Mark</th>" +
                            " <th>Upper Mark</th>" +
                            " <th>GPA</th>" +
                            " <th>Grade</th>" +
                            " <th>Action</th>" +
                            " </tr>" +
                            " </thead>"+
                            "<tbody>"+
                            "</tbody>";
                        for(var i=0; i<data.length; i++)
                        {
                            tbody += "<tr>";
                            tbody += "<td>"+ (i+1) +"</td>";
                            tbody += "<td>"+data[i]['class']+"</td>";
                            tbody += "<td>"+data[i]['courseCode']+"</td>";
                            tbody += "<td>"+data[i]['lowerMark']+"</td>";
                            tbody += "<td>"+data[i]['upperMark']+"</td>";
                            tbody += "<td>"+data[i]['gpa']+"</td>";
                            tbody += "<td>"+data[i]['grade']+"</td>";
                            tbody += "<td>" +"<div class='animation-model'>" +
                                " <a href='' class='' onclick='editDesig(this.id);' id="+ i +" data-toggle='modal' data-target='#editGradeModal' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                "<i class='fa fa-edit' style='color: navy;'></i> " +
                                "</a>&nbsp;&nbsp;" +
                                "<a  href=''  class='' onclick ='deleteDesig(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                "<i class='fa fa-trash' style='color: red;'></i> " +
                                "</a> " +
                                "</div> " +
                                "</td>";
                            tbody += "</tr>";
                        }
                        $('#gradeList').html(tbody);
                    }
                }
            });
        });
        $('#className1').on('change', function() {
            var className= this.value ;
            $.ajax({
                url: '/api/subjectListSelect',
                type: 'POST',
                data: className,
                dataType:'json',
                success: function (response) {
                    data = response.data;

                    var selectBody= '<option value=\"\">Select Subject</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['code'] + '\">'+data[i]['name']+"("+data[i]['code']+")"+ '</option>';

                    }
                    // console.log(selectBody);
                    $('#courseCode').html(selectBody);
                }

            });
        });

        var data;
        function gradeList() {
            $.ajax({
                url: '/api/showGradeList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    length = data.length;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Class</th>" +
                        " <th>Subject Name</th>" +
                        " <th>Lower Mark</th>" +
                        " <th>Upper Mark</th>" +
                        " <th>GPA</th>" +
                        " <th>Grade</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['class']+"</td>";
                        tbody += "<td>"+data[i]['name']+'('+data[i]['courseCode']+')'+"</td>";
                        tbody += "<td>"+data[i]['lowerMark']+"</td>";
                        tbody += "<td>"+data[i]['upperMark']+"</td>";
                        tbody += "<td>"+data[i]['gpa']+"</td>";
                        tbody += "<td>"+data[i]['grade']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <a href='' class='' onclick='editDesig(this.id,length);' id="+ i +" data-toggle='modal' data-target='#editGradeModal' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit' style='color: navy;'></i> " +
                            "</a>&nbsp;&nbsp;" +
                            "<a  href=''  class='' onclick ='deleteDesig(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                            "<i class='fa fa-trash' style='color: red;'></i> " +
                            "</a> " +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";
                    }
                    $('#gradeList').html(tbody);
                }
            });
        }

        $(document).ready(function(){
            getClassName();
            gradeList();
            $("#addGrade").validate({
                //ignore: ":hidden",
                rules: {
                    class: {required: true, number: true},
                    courseCode: {required: true, number: true},
                    lowerMark: {required: true, number: true},
                    upperMark: {required: true, number: true},
                    gpa: {required: true, number: true},
                    grade: "required",
                },
                messages: {
                    class: "Please give Valid Class",
                    courseCode: "Please give Valid Course Code",
                    lowerMark: "Please give Valid Lower Bound",
                    upperMark: "Please give Valid Upper Bound",
                    gpa: "Please give Valid GPA",
                    grade: "Please give Valid Grade",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertGradesetup',
                        type: 'POST',
                        data: new FormData($("#addGrade")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#addNewGrade').modal('hide');
                                gradeList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#addNewGrade').modal('hide');
                                gradeList();
                            }

                        }
                    });
                    return false;
                }
            });

            $("#editGrade").validate({
                rules: {
                    class: {required: true, number: true},
                    courseCode: {required: true, number: true},
                    lowerMark: {required: true, number: true},
                    upperMark: {required: true, number: true},
                    gpa: {required: true, number: true},
                    grade: "required",
                },
                messages: {
                    class: "Please give Valid Class",
                    courseCode: "Please give Valid Course Code",
                    lowerMark: "Please give Valid Lower Bound",
                    upperMark: "Please give Valid Upper Bound",
                    gpa: "Please give Valid GPA",
                    grade: "Please give Valid Grade",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editGradeSetup',
                        type: 'POST',
                        data: new FormData($("#editGrade")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                gradeList();
                                $('#editGradeModal').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                gradeList();
                                $('#editGradeModal').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formdeleteGrade").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteGradeSet',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);

                                $('#confirm-delete').modal('hide');
                                gradeList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#confirm-delete').modal('hide');
                                gradeList();
                            }

                        }
                    });
                    return false;
                }
            });

        });
        function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }

        function editDesig(i,length) {
            CourseCode = [];
            origin=i;
            document.getElementById('dbid').value = data[i]['id'];
            document.getElementById('class1').value = data[i]['class'];
            document.getElementById('lowerMark1').value = data[i]['lowerMark'];
            document.getElementById('upperMark1').value = data[i]['upperMark'];
            document.getElementById('gpa1').value = data[i]['gpa'];
            document.getElementById('grade1').value = data[i]['grade'];
            var selectBody= '<option value=\"\">Select Subject</option>';
            for(var i=0; i<length; i++)
            {
                CourseCode.push(data[i]['courseCode']);
            }
            uniqueCourseCode = CourseCode.filter( onlyUnique );

            for(var i=0; i<uniqueCourseCode.length; i++)
            {
                selectBody += '<option value=\"' + uniqueCourseCode[i] + '\">'+ uniqueCourseCode[i]+ '</option>';
            }
            $('#courseCode1').html(selectBody);
            document.getElementById('courseCode1').value = data[origin]['courseCode'];
        }
        function deleteDesig(i) {
            document.getElementById('dbiddel').value = data[i]['id'] ;
        }
    </script>
@endsection