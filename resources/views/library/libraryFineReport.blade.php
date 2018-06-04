@extends('layout.app')
@section('title', 'Fine Report')
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
        <h5 class="m-b-10">Library Fine Management</h5>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#noticeset" role="tab"><i class="icofont icofont-ui-message"></i>Library Fine Report</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#fine" role="tab"><i class="icofont icofont-ui-message"></i>Library Fine Stucture Create</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="noticeset" role="tabpanel">
                        <form id="libFineTransaction">
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

                        <div class="table-responsive">
                            <hr><center><h5 class="m-b-10">Library Fine Details</h5></center><hr>
                            <table id="fineAmount" class="table table-bordered">

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane " id="fine" role="tabpanel">
                        <form id="formFineInfoSet">
                            <div class="form-group has-success row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="inputSuccess1">Fine Per Day</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="amount" class="form-control " id="amount" placeholder="Fine Per Day">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="inputSuccess1">Fine Start After Days</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="fineStart" class="form-control " id="fineStart" placeholder="Fine Start After days">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="inputSuccess1">Book Allocation Per Student</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="highestAllocation" class="form-control " id="highestAllocation" placeholder="Book Allocation Per Student">
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
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Info</button>
                                </div><hr>
                            </div>
                        </form>
                        <hr>
                        <center><h5 class="m-b-10">Fine Structure</h5></center>
                        <div class="table-responsive">
                            <table id="fineInfo" class="table table-bordered">

                            </table>
                        </div>
                        <div class="modal fade" id="modalEditFees" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit your fine settings</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditFineInfoSet">
                                            <div class="form-group has-success row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="inputSuccess1">Fine Per Day</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="amount" class="form-control " id="amount1" placeholder="Fine Per Day">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="inputSuccess1">Fine Start After Days</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="fineStart" class="form-control " id="fineStart1" placeholder="Fine Start After days">
                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="inputSuccess1">Book Allocation Per Student</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="highestAllocation" class="form-control " id="highestAllocation1" placeholder="Book Allocation Per Student">
                                                </div>
                                            </div>
                                            <input type="hidden" id="dbid" name="dbid" class="form-control " value="" >
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="confirmDeleteFees" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <center><h4 class="modal-title">Are You Sure to Delete This??</h4></center>

                                    </div>
                                    <div class="modal-footer">
                                        <form id="formdeleteFees">
                                            <input type="hidden" id="dniddel" name="dniddel" class="form-control " value="" >
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger ">Delete</button>
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

        function fineInfoList() {
            $.ajax({
                url: '/api/showFineInfoList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var length=data.length;
                   // console.log(data);
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Fine Per Day</th>" +
                        " <th>Fine Start After Days</th>" +
                        " <th>Book Allocation Per Student</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['amount']+"</td>";
                        tbody += "<td>"+data[i]['fineStart']+"</td>";
                        tbody += "<td>"+data[i]['highestAllocation']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editDesig(this.id);' id="+ i +" data-toggle='modal' data-target='#modalEditFees' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit'></i> " +
                            "</button>&nbsp;&nbsp;" +
                            "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteDesig(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirmDeleteFees' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                            "<i class='fa fa-trash'></i> " +
                            "</button> " +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";
                    }
                    $('#fineInfo').html(tbody);
                }
            });


        }
        $(document).ready(function(){
            fineInfoList();

            $("#libFineTransaction").validate({
                //ignore: ":hidden",
                rules: {
                    radio: "required",
                    universeid: "required",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/libFineTransaction',
                        type: 'POST',
                        data: new FormData($("#libFineTransaction")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            data1 = response.data1;
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
                                    " <th>Amount</th>" +
                                    " </tr>" +
                                    " </thead>"+
                                    "<tbody>"+
                                    "</tbody>";
                                var sum =0;
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

                                    var nowDate = new Date();
                                    var date = nowDate.getFullYear()+'/'+(nowDate.getMonth()+1)+'/'+nowDate.getDate();
                                    var date1 = new Date(nowDate);
                                    var date2 = new Date(data[i]['issuDate']);
                                    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                                    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                                    if(diffDays>data1[0]['fineStart']){
                                        sum = diffDays*data1[0]['amount'];
                                        tbody += "<td>" + diffDays*2 +"</td>";
                                    }
                                    else{
                                        tbody += "<td>" + " 0 "+"</td>";
                                    }

                                    tbody += "</tr>";
                                    sum += sum;
                                }

                                tbody += "<tr>";
                                tbody += '<th colspan=8>Sum</th>';
                                tbody += "<th>"+sum+"</th>";
                                tbody += "</tr>";
                                $('#fineAmount').html(tbody);
                            }

                        }
                    });
                    return false;
                }
            });
            $("#formFineInfoSet").validate({
                //ignore: ":hidden",
                rules: {
                    amount: {required: true, number: true},
                    fineStart: {required: true, number: true},
                    highestAllocation: {required: true, number: true},
                },
                messages: {
                    amount: "Please give Valid Amount",
                    fineStart: "Please give Valid Number",
                    highestAllocation: "Please give Valid Number",
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertLibFineSetup',
                        type: 'POST',
                        data: new FormData($("#formFineInfoSet")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                fineInfoList();
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

            $("#formEditFineInfoSet").validate({
                rules: {
                    fineName: "required",
                    fineType: "required",
                    amount: {required: true, number: true},
                },
                messages: {
                    fineName: "Please give Fine Name",
                    fineType: "Please give Fine Image",
                    amount: "Please give Valid Amount"
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editFineInfoSet',
                        type: 'POST',
                        data: new FormData($("#formEditFineInfoSet")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                fineInfoList();
                                $('#modalEditFees').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                fineInfoList();
                                $('#modalEditFees').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formdeleteFees").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteFeesInfoSet',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);

                                $('#confirmDeleteFees').modal('hide');
                                fineInfoList();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#confirmDeleteFees').modal('hide');
                                fineInfoList();
                            }

                        }
                    });
                    return false;
                }
            });

        });

        function editDesig(i) {
            document.getElementById('dbid').value = data[i]['id'];
            document.getElementById('highestAllocation1').value = data[i]['highestAllocation'];
            document.getElementById('fineStart1').value = data[i]['fineStart'];
            document.getElementById('amount1').value = data[i]['amount'];
        }
        function deleteDesig(i) {
            document.getElementById('dniddel').value = data[i]['id'] ;
        }
    </script>

@endsection




