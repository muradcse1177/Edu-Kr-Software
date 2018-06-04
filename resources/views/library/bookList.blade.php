@extends('layout.app')
@section('title', 'Book List')
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
                        <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Book List</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="markEntry" role="tabpanel">
                        <form id="formSearchBook">
                            <div class="row">
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label  class="col-form-label" for="inputSuccess1">Bar Code</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="barCode" name="barCode" class="form-control " placeholder="Bar Code" >
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
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">Start Date</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="startdate" name="startdate" class="form-control" placeholder="Start Date">
                                </div>
                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                    <label class="col-form-label" for="inputSuccess1">End Date</label>
                                </div>
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="text" id="enddate" name="enddate" class="form-control " placeholder="End Date">
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
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <center><h5 class="m-b-10">Book List</h5></center>
                        <div class="table-responsive">
                            <table id="searchBookList" class="table table-bordered">

                            </table>
                        </div>
                        <div class="modal fade" id="editBook" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit your notice structure</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="bookSetupEdit">
                                            <div class="row">
                                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                                    <label  class="col-form-label" for="inputSuccess1">Bar Code</label>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="barCode1" name="barCode" class="form-control " placeholder="Bar Code" >
                                                </div>
                                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                                    <label class="col-form-label" for="inputSuccess1">ISBN</label>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="isbn1" name="isbn" class="form-control " placeholder="ISBN" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                                    <label  class="col-form-label" for="inputSuccess1">Book Name</label>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="name1" name="name" class="form-control " placeholder="Book Name" >
                                                </div>
                                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                                    <label class="col-form-label" for="inputSuccess1">Author Name</label>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="AutorName1" name="AutorName" class="form-control " placeholder="Author Name" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                                    <label class="col-form-label" for="inputSuccess1">Editon</label>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="edition1" name="edition" class="form-control " placeholder="Editon" >
                                                </div>
                                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                                    <label class="col-form-label" for="inputSuccess1">Publisher</label>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="publisher1" name="publisher" class="form-control " placeholder="Publisher" >
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
                                                    <input type="text" id="price1" name="price" class="form-control " placeholder="Price" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                                    <label class="col-form-label" for="inputSuccess1">Subject Name</label>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="subjectName1" name="subjectName" class="form-control" placeholder="Subject Name">
                                                </div>
                                                <div style="text-align: right;" class="col-sm-12 col-xl-2 m-b-30">
                                                    <label class="col-form-label" for="inputSuccess1">Self Location</label>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <input type="text" id="selfLocation1" name="selfLocation" class="form-control " placeholder="Self Location">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <input type="hidden" id="dbid" name="dbid" class="form-control " value="" >
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success ">Save Change</button>
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
                                    <form id="formBookDelete">
                                        <div class="modal-footer">
                                            <input type="hidden" id="dbiddel" name="dbiddel" class="form-control " value="" >
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
@endsection
@section('footer')
    @parent
    <script src="adminerf/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>
    <script src="adminerf/files/bower_components/datedropper/js/datedropper.min.js"></script>
    <script src="adminerf/files/bower_components/spectrum/js/spectrum.js"></script>
    <script src="adminerf/files/bower_components/jscolor/js/jscolor.js"></script>
    <script src="adminerf/files/bower_components/jquery-minicolors/js/jquery.minicolors.min.js"></script>
    <script src="adminerf/files/assets/pages/advance-elements/custom-picker.js"></script>
    <script>

        $( function() {
            $( "#startdate" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        $( function() {
            $( "#enddate" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
        function BookList() {

        }
        $(document).ready(function(){

            $("#formSearchBook").validate({
                //ignore: ":hidden",
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/searchBookList',
                        type: 'POST',
                        data: new FormData($("#formSearchBook")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            if(!$.trim(data)){
                                $('#searchBookList').html("No data found.Please try again.");
                            }
                            else{
                                var tbody= "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Action</th>" +
                                    " <th>Book Name</th>" +
                                    " <th>ISBN</th>" +
                                    " <th>Bar Code</th>" +
                                    " <th>Author</th>" +
                                    " <th>Edition</th>" +
                                    " <th>Publisher</th>" +
                                    " <th>Subject Name</th>" +
                                    " <th>Book Color</th>" +
                                    " <th>Price</th>" +
                                    " <th>Self Location</th>" +
                                    " <th>Availability</th>" +
                                    " <th>Insert Date</th>" +
                                    " </tr>" +
                                    " </thead>"+
                                    "<tbody>"+
                                    "</tbody>";
                                for(var i=0; i<data.length; i++)
                                {
                                    tbody += "<tr>";
                                    tbody += "<td>"+ (i+1) +"</td>";
                                    tbody += "<td>" +"<div class='animation-model'>" +
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editDesig(this.id);' id="+ i +" data-toggle='modal' data-target='#editBook' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                                        "<i class='fa fa-edit'></i> " +
                                        "</button>&nbsp;&nbsp;" +
                                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteDesig(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                                        "<i class='fa fa-trash'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                    tbody += "<td>"+data[i]['name']+"</td>";
                                    tbody += "<td>"+data[i]['isbn']+"</td>";
                                    tbody += "<td>"+data[i]['barCode']+"</td>";
                                    tbody += "<td>"+data[i]['AutorName']+"</td>";
                                    tbody += "<td>"+data[i]['edition']+"</td>";
                                    tbody += "<td>"+data[i]['publisher']+"</td>";
                                    tbody += "<td>"+data[i]['subjectName']+"</td>";
                                    tbody += "<td>"+data[i]['bookColor']+"</td>";
                                    tbody += "<td>"+data[i]['selfLocation']+"</td>";
                                    tbody += "<td>"+data[i]['price']+"</td>";
                                    if(data[i]['availability']==1){

                                        tbody += "<td>Available</td>";
                                    }
                                    if(data[i]['availability']==0){

                                        tbody += "<td>Not Avaiable</td>";
                                    }
                                    tbody += "<td>"+data[i]['date']+"</td>";
                                    tbody += "</tr>";
                                }
                                $('#searchBookList').html(tbody);
                                $('#barCode1').val(data[0]['barCode']);
                                $('#name1').val(data[0]['name']);
                                $('#isbn1').val(data[0]['isbn']);
                                $('#AutorName1').val(data[0]['AutorName']);
                                $('#edition1').val(data[0]['edition']);
                                $('#publisher1').val(data[0]['publisher']);
                                $('#subjectName1').val(data[0]['subjectName']);
                                $('#position-bottom-right').val(data[0]['bookColor']);
                                $('#price1').val(data[0]['price']);
                                $('#selfLocation1').val(data[0]['selfLocation']);
                            }

                        }
                    });
                    return false;
                }
            });

            $("#bookSetupEdit").validate({
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
                        url: '/api/bookUpdate',
                        type: 'POST',
                        data: new FormData($("#bookSetupEdit")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#editBook').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#editBook').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });


            $("#formBookDelete").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteBooks',
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
        function editDesig(i) {
            document.getElementById('dbid').value = data[i]['id'];
        }
        function deleteDesig(i) {
            document.getElementById('dbiddel').value = data[i]['id'] ;
        }

    </script>
@endsection




