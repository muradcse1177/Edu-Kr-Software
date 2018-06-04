@extends('layout.app')
@section('title', 'Tax Management')
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
            <h5 class="m-b-10">Employee Tax Management</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add Tax Type</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#deutran" role="tab"><i class="icofont icofont-ui-message"></i>Tax Collection</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="feeslog" role="tabpanel">
                            <form id="formTaxAdd">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Start Basic</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="startBasic" name="startBasic" class="form-control form-control-success" placeholder="In Tk">
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">End Basic</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="endBasic" name="endBasic" class="form-control form-control-success"  placeholder="In Tk">
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Tax Amouunt(%)</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="taxAmount" name="taxAmount" class="form-control form-control-success"  placeholder="In(%)">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Tax</button>
                                    </div><hr>
                                </div>
                                <hr>
                            </form>
                            <center> <h4>Tax List</h4></center><hr>
                            <div class="table-responsive">
                                <table id="tableTaxList" class="table table-bordered">

                                </table>
                                <div class="modal fade" id="editmodalTax" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit  Tax settings</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formTaxEdit">
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Start Basic</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" id="startBasic1" name="startBasic" class="form-control form-control-success" placeholder="In Tk">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">End Basic</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" id="endBasic1" name="endBasic" class="form-control form-control-success"  placeholder="In Tk">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Tax Amouunt(%)</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" id="taxAmount1" name="taxAmount" class="form-control form-control-success"  placeholder="In(%)">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" id="dbid" name="dbid" class="form-control " >
                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="deutran" role="tabpanel">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">From Date</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="datepicker_start" class="form-control form-control-success" id="inputSuccess1" placeholder="Start Date">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">To Date</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="datepicker_end" class="form-control form-control-success" id="inputSuccess1" placeholder="End Date">
                                </div>
                            </div>
                            <hr>
                            <center> <h4>Tax Transaction List</h4></center>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Emolyee Code</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Tax Amount</th>
                                        <th>Tax Payment Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>255552
                                        </td>
                                        <td>Kawser
                                        </td>
                                        <td>GDFHH
                                        </td>
                                        <td>1200
                                        </td>
                                        <td>12/07/2018
                                        </td>
                                        <td>
                                            <div class="animation-model">
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#managenotice1" data-toggle="tooltip"   data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#confirm-delete1" data-toggle="tooltip"   data-placement="top" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="managenotice1" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit your Tax settings</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Employee Code</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Employee Code">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Department</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Department">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Tax Amount</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="" class="form-control form-control-success" id="inputSuccess1" placeholder="Tax Amount">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Tax Payment Date</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="datepicker_end1" class="form-control form-control-success" id="inputSuccess1" placeholder="Tax Payment Date">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect ">Close</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="confirm-delete1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <center><h4 class="modal-title">Are You Sure to Delete This??</h4></center>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-danger btn-ok" data-dismiss="modal">Delete</a>
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
        <!-- </div> -->
    </div>

@endsection
@section('footer')
    @parent
    <script>
        function loadTaxList() {
            $.ajax({
                url: '/api/showTaxList',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Start Basic</th>" +
                        " <th>End Basic</th>" +
                        " <th>Tax Amount(%)</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['startBasic']+"</td>";
                        tbody += "<td>"+data[i]['endBasic']+"</td>";
                        tbody += "<td>"+data[i]['taxAmount']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editTaxList(this.id);' id="+ i +" data-toggle='modal' data-target='#editmodalTax' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit'></i> " +
                            "</button>&nbsp;&nbsp;" +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";

                    }
                    $('#tableTaxList').html(tbody);
                }
            });
        }
        $(document).ready(function(){

            loadTaxList();

            $("#formTaxEdit").validate({
                rules: {
                    startBasic:{required: true, number: true},
                    endBasic: {required: true, number: true},
                    taxAmount: {required: true, number: true},
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editTaxValue',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                loadTaxList();
                                $('#editmodalTax').modal('hide');

                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                loadTaxList();
                                $('#editmodalTax').modal('hide');

                            }

                        }
                    });
                    return false;
                }
            });
            $("#formTaxAdd").validate({
                rules: {
                    startBasic:{required: true, number: true},
                    endBasic: {required: true, number: true},
                    taxAmount: {required: true, number: true},
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertTaxValue',
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

        });
        function editTaxList(i) {
            document.getElementById('dbid').value = data[i]['id'];
            document.getElementById('startBasic1').value = data[i]['startBasic'];
            document.getElementById('endBasic1').value = data[i]['endBasic'];
            document.getElementById('taxAmount1').value = data[i]['taxAmount'];
        }
    </script>
@endsection



