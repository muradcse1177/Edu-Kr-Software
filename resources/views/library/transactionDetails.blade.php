@extends('layout.app')
@section('title', 'Transaction Details')
@section('header')
    @parent
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
        <h5 class="m-b-10">Transaction Management </h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#noticeset" role="tab"><i class="icofont icofont-ui-message"></i>Transaction Details</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="noticeset" role="tabpanel">
                        <form id="libBooksTransaction">
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
                            <div  class="row">
                                <div id="for_all" style=" display: none;"  class="col-sm-12 col-xl-3 m-b-30">
                                    <div class="checkbox-color checkbox-success">
                                        <input id="checkbox16" name ="forAll" type="checkbox" >
                                        <label for="checkbox16">
                                            For All
                                        </label>
                                    </div>
                                </div>

                                <div id="for_universeid" style=" display: none;" class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="universeid" name="universeid" class="form-control " placeholder="User ID">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="startdate" name="startdate" class="form-control " placeholder="Start Date" >
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="enddate" name="enddate" class="form-control " placeholder="End Date" >
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="barCodeFinal" name="barCodeFinal" value="" class="form-control " placeholder="col">
                                </div>
                                <div class="col">
                                    <input type="hidden" id="studentIdFinal"  name="studentIdFinal" value=""  class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-4">
                                    <button type ="submit" id="submitClassInfo" class="form-control form-bg-primary">check Transaction</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <hr><center><h5 class="m-b-10">Transaction Details</h5></center><hr>
                        <table id = "transactionList" class="table table-bordered">

                        </table>
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
        $( function() {
            $( "#startdate" ).datepicker({
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

        $('#student,#teacher,#officer,#stuff').change(function() {
            $( "#for_all ,#for_universeid" ).show();
            $('#checkbox16').prop('checked', false);
        });


        $("#checkbox16").change(function() {
            if(this.checked) {
                $( "#for_universeid" ).hide();
            }
            else {
                $( "#for_universeid" ).show();

            }
        });

        $(document).ready(function(){

            $("#libBooksTransaction").validate({
                //ignore: ":hidden",
                rules: {
                    radio: "required",
                    universeid: "required",
                    startdate: "required",
                    enddate: "required",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/libBooksTransaction',
                        type: 'POST',
                        data: new FormData($("#libBooksTransaction")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            if(!$.trim(data)){
                                $('#transactionList').html("No data found.Please try again.");
                            }
                            else{
                                var tbody= "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Student ID</th>" +
                                    " <th>Book Name</th>" +
                                    " <th>Bar Code</th>" +
                                    " <th>Author</th>" +
                                    " <th>Issue Date</th>" +
                                    " <th>Return date</th>" +
                                    " <th>Status</th>" +
                                    " </tr>" +
                                    " </thead>"+
                                    "<tbody>"+
                                    "</tbody>";
                                for(var i=0; i<data.length; i++)
                                {
                                    tbody += "<tr>";
                                    tbody += "<td>"+ (i+1) +"</td>";
                                    tbody += "<td>"+data[i]['studentId']+"</td>";
                                    tbody += "<td>"+data[i]['name']+"</td>";
                                    tbody += "<td>"+data[i]['barCode']+"</td>";
                                    tbody += "<td>"+data[i]['AutorName']+"</td>";
                                    tbody += "<td>"+data[i]['issuDate']+"</td>";
                                    tbody += "<td>"+data[i]['returnDate']+"</td>";
                                    tbody += "<td>"+data[i]['status']+"</td>";
                                    tbody += "</tr>";
                                }
                                $('#transactionList').html(tbody);
                            }

                        }
                    });
                    return false;
                }
            });

        });
    </script>
@endsection




