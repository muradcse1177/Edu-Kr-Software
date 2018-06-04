@extends('layout.app')
@section('title', 'Absent/Late Management')
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
        <div class="row">
            <div class="col-lg-12 col-xl-12s">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#noticeset" role="tab"><i class="icofont icofont-ui-message"></i>Add New Fine</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="noticeset" role="tabpanel">
                        <form id="formFineSet">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Fine Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="fineName" class="form-control " id="fineName" placeholder="Enter Fine Name">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Fine Day/Month</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="fineType" name="fineType" class="form-control">
                                        <option value="">Select Date</option>
                                        <option value="1">Per Day</option>
                                        <option value="30">Per Month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Amount</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="amount" class="form-control " id="amount" placeholder="Amount">
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
                                    <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Fine</button>
                                </div><hr>
                            </div>
                        </form>
                        <hr>
                        <center><h5 class="m-b-10">Fine Details</h5></center>
                        <div class="table-responsive">
                            <table id="showFineList" class="table table-bordered">

                            </table>
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
                                            <form id="formEditFineSet">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Fine Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="fineName1" class="form-control " id="fineName1" placeholder="Enter Fine Name" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Fine Day/Month</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <select id="fineType1" name="fineType1" class="form-control">
                                                            <option value="">Select Date</option>
                                                            <option value="1">Per Day</option>
                                                            <option value="30">Per Month</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Amount</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="amount1" class="form-control " id="amount1" placeholder="Amount" value="">
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
                                                <input type="hidden" id="feesTimeIdDel" name="feesTimeIdDel" class="form-control " value="" >
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
    </div>
</div>
@endsection
@section('footer')
    @parent
<script>
    var data;
    function fineList() {
        $.ajax({
            url: '/api/showFineList',
            type: 'POST',
            success: function (response) {
                data = response.data;
                var length=data.length;
                console.log(data);
                var tbody= "<thead> " +
                    "<tr> " +
                    "<th>SL. No</th>" +
                    " <th>Fine Name</th>" +
                    " <th>Fine Day/Month</th>" +
                    " <th>Amount</th>" +
                    " <th>Action</th>" +
                    " </tr>" +
                    " </thead>"+
                    "<tbody>"+
                    "</tbody>";
                for(var i=0; i<length; i++)
                {
                    tbody += "<tr>";
                    tbody += "<td>"+ (i+1) +"</td>";
                    tbody += "<td>"+data[i]['fineName']+"</td>";
                    if(+data[i]['fineType']==1){
                        tbody += "<td>"+"Per Day"+"</td>";
                    }
                    else{
                        tbody += "<td>"+"Per Month"+"</td>";
                    }
                    tbody += "<td>"+data[i]['amount']+"</td>";
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
                $('#showFineList').html(tbody);
            }
        });


    }

    $(document).ready(function(){
        fineList();
        $("#formFineSet").validate({
            //ignore: ":hidden",
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
                    url: '/api/insertFineSetup',
                    type: 'POST',
                    data: new FormData($("#formFineSet")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            fineList();
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

        $("#formEditFineSet").validate({
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
                    url: '/api/editFineSet',
                    type: 'POST',
                    data: new FormData($("#formEditFineSet")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            fineList();
                            $('#modalEditFees').modal('hide');
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            fineList();
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
                    url: '/api/deleteFeesSet',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);

                            $('#confirmDeleteFees').modal('hide');
                            fineList();
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            $('#confirmDeleteFees').modal('hide');
                            fineList();
                        }

                    }
                });
                return false;
            }
        });

    });
    function editDesig(i) {
        document.getElementById('dbid').value = data[i]['id'];
        document.getElementById('fineName1').value = data[i]['fineName'];
        document.getElementById('fineType1').value = data[i]['fineType'];
        document.getElementById('amount1').value = data[i]['amount'];
    }
    function deleteDesig(i) {
        document.getElementById('feesTimeIdDel').value = data[i]['id'] ;
    }
</script>
@endsection



