@extends('layout.app')
@section('title', 'Return Book')
@section('header')
    @parent
    <link rel="stylesheet" type="text/css" href="/files/bower_components/spectrum/css/spectrum.css" />
    <link rel="stylesheet" type="text/css" href="/files/bower_components/jquery-minicolors/css/jquery.minicolors.css" />
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
            <h5 class="m-b-10">Book Management</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Assign Book</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="markEntry" role="tabpanel">
                            <center><h5 class="m-b-10">Book Information</h5></center><hr>

                            <form id="formSearchBook">
                                <div class="row">
                                    <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                        <label  class="col-form-label" for="inputSuccess1">Bar Code</label>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input type="text" id="barCode" name="barCode" class="form-control " placeholder="Bar Code" >
                                    </div>
                                    <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Book</button>
                                    </div>
                                </div>
                            </form>

                            <div id="bookInfo"></div>
                            <hr>
                            <center><h5 class="m-b-10">Student Information</h5></center><hr>
                            <form id="formStudentInfo">
                                <div class="row">
                                    <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                        <label  class="col-form-label" for="inputSuccess1">Student ID</label>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <input type="text" id="studentId" name="studentId" class="form-control " placeholder="Student ID" >
                                    </div>
                                    <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Student</button>
                                    </div>
                                </div>
                            </form>
                            <div id="studentInfo"></div>
                            <form id="formReturnBook">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="barCodeFinal" name="barCodeFinal" value="" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentIdFinal"  name="studentIdFinal" value=""  class="form-control " placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button id="submitClassInfo" class="form-control form-bg-primary">Return Book</button>
                                    </div>
                                </div>
                            </form>
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
    <script src="/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>
    <script src="/files/bower_components/datedropper/js/datedropper.min.js"></script>
    <script src="/files/bower_components/spectrum/js/spectrum.js"></script>
    <script src="/files/bower_components/jscolor/js/jscolor.js"></script>
    <script src="/files/bower_components/jquery-minicolors/js/jquery.minicolors.min.js"></script>
    <script src="/files/assets/pages/advance-elements/custom-picker.js"></script>

    <script>
        $("#formSearchBook").validate({
            rules: {
                barCode: "required",
            },
            messages: {
                barCode: "Please give Barcode",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/searchBookInfo',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {

                        data = response.data;
                        if(!$.trim(data)){
                            $('#bookInfo').html("No data found.Please try again.");
                        }
                        else{
                            var bookInfo = '<div class="row">\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label class="col-form-label" for="inputSuccess1">ISBN</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="isbn" value="'+ data[0]['isbn'] +'" name="isbn" class="form-control " placeholder="ISBN" >\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                            <div class="row">\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label  class="col-form-label" for="inputSuccess1">Book Name</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="name" name="name" value="'+ data[0]['name'] +'" class="form-control " placeholder="Book Name" >\n' +
                                '                                </div>\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label class="col-form-label" for="inputSuccess1">Author Name</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="AutorName" name="AutorName"  value="'+ data[0]['AutorName'] +'" class="form-control " placeholder="Author Name" >\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                            <div class="row">\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label class="col-form-label" for="inputSuccess1">Editon</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="edition" name="edition" value="'+ data[0]['edition'] +'" class="form-control " placeholder="Editon" >\n' +
                                '                                </div>\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label class="col-form-label" for="inputSuccess1">Publisher</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="publisher" name="publisher" value="'+ data[0]['publisher'] +'" class="form-control " placeholder="Publisher" >\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                            <div class="row">\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label class="col-form-label" for="inputSuccess1">Book Color</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="position-bottom-right" name="bookColor" value="'+ data[0]['bookColor'] +'" class="form-control demo" placeholder="Book Color" data-position="top right">\n' +
                                '                                </div>\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label class="col-form-label" for="inputSuccess1">Price</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="price" name="price" value="'+ data[0]['price'] +'" class="form-control " placeholder="Price" >\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                            <div class="row">\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label class="col-form-label" for="inputSuccess1">Subject Name</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="subjectName" name="subjectName" value="'+ data[0]['subjectName'] +'" class="form-control" placeholder="Subject Name">\n' +
                                '                                </div>\n' +
                                '                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">\n' +
                                '                                    <label class="col-form-label" for="inputSuccess1">Self Location</label>\n' +
                                '                                </div>\n' +
                                '                                <div class="col-sm-12 col-xl-4 m-b-30">\n' +
                                '                                    <input type="text" id="selfLocation" name="selfLocation" value="'+ data[0]['selfLocation'] +'" class="form-control " placeholder="Self Location">\n' +
                                '                                </div>\n' +
                                '                            </div>';

                            $('#bookInfo').html(bookInfo);
                            $('#barCodeFinal').val(data[0]['barCode']);
                        }

                    }
                });
                return false;
            }
        });

        $("#formStudentInfo").validate({
            rules: {
                studentId: "required",
            },
            messages: {
                studentId: "Please give Student ID",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/searchStudentInfo',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {

                        data = response.data;
                        if(!$.trim(data)){
                            $('#studentInfo').html("No data found.Please try again.");
                        }
                        else{
                            var studentInfo = '<div class="row">\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="name" value="'+ data[0]['name'] +'" class="form-control " placeholder="Student Name" >\n' +
                                '                            </div>\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="class" value="'+ data[0]['classNum'] +'" class="form-control " placeholder="Class" >\n' +
                                '                            </div>\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="version" value="'+ data[0]['versionName'] +'" class="form-control " placeholder="Version" >\n' +
                                '                            </div>\n' +
                                '                            <div class="col-sm-12 col-xl-3 m-b-30">\n' +
                                '                                <input type="text" id="section" value="'+ data[0]['sectionName'] +'" class="form-control " placeholder="Section" >\n' +
                                '                            </div>\n' +
                                '                        </div>';

                            $('#studentInfo').html(studentInfo);
                            $('#studentIdFinal').val(data[0]['studentId']);
                        }
                    }
                });
                return false;
            }
        });


        $("#formReturnBook").validate({
            rules: {
                studentIdFinal: "required",
                barCodeFinal: "required",
            },
            messages: {
                studentIdFinal: "Please give Student ID",
                barCodeFinal: "Please give Bar Code",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/returnBook',
                    type: 'POST',
                    data: $(form).serialize(),
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

    </script>
@endsection




