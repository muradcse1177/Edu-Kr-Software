@extends('layout.app')
@section('title', 'Barcode Generator')
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
                        <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Add New Book</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="markEntry" role="tabpanel">
                        <form id="bookSetup">
                            <div class="row">
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label  class="col-form-label" for="inputSuccess1">Bar Code</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="barCode" name="barCode" class="form-control " placeholder="Bar Code" >
                                </div>
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">ISBN</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="isbn" name="isbn" class="form-control " placeholder="ISBN" >
                                </div>
                            </div>
                            <div class="row">
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label  class="col-form-label" for="inputSuccess1">Book Name</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="name" name="name" class="form-control " placeholder="Book Name" >
                                </div>
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">Author Name</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="AutorName" name="AutorName" class="form-control " placeholder="Author Name" >
                                </div>
                            </div>
                            <div class="row">
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">Editon</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="edition" name="edition" class="form-control " placeholder="Editon" >
                                </div>
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">Publisher</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="publisher" name="publisher" class="form-control " placeholder="Publisher" >
                                </div>
                            </div>
                            <div class="row">
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">Book Color</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="position-bottom-right" name="bookColor" class="form-control demo" placeholder="Book Color" data-position="top right">
                                </div>
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">Price</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="price" name="price" class="form-control " placeholder="Price" >
                                </div>
                            </div>
                            <div class="row">
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">Subject Name</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="subjectName" name="subjectName" class="form-control" placeholder="Subject Name">
                                </div>
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">Self Location</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="selfLocation" name="selfLocation" class="form-control " placeholder="Self Location">
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
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add book</button>
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

        $(document).ready(function(){

            $("#bookSetup").validate({
                //ignore: ":hidden",
                rules: {
                    barCode: "required",
                    isbn: "required",
                    name: "required",
                    AutorName: "required",
                    edition: "required",
                    publisher: "required",
                    bookColor: "required",
                    price: {required: true, number: true},
                    subjectName: "required",
                    selfLocation: "required",
                },
                messages: {
                    barCode: "Please give Barcode",
                    isbn: "Please give ISBN",
                    name: "Please give Book Name",
                    AutorName: "Please give Author Name",
                    edition: "Please give Edition Name",
                    publisher: "Please give Publisher Name",
                    bookColor: "Please give Book Color",
                    price: "Please give valid Price",
                    subjectName: "Please give Subject Name",
                    selfLocation: "Please give Self Location",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/bookInsert',
                        type: 'POST',
                        data: new FormData($("#bookSetup")[0]),
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

        });

    </script>
@endsection




