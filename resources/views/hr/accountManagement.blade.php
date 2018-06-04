@extends('layout.app')
@section('title', 'Account Management')
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
            <h5 class="m-b-10">Employee Salary Management</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link " data-toggle="tab" href="#newAccount" role="tab"><i class="icofont icofont-ui-message"></i>Add New Account</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#transactionEntry" role="tab"><i class="icofont icofont-ui-message"></i>Transaction Entry</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#transactionDetails" role="tab"><i class="icofont icofont-ui-message"></i>Transaction Details</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fundTransfer" role="tab"><i class="icofont icofont-ui-message"></i>Fund Transfer AC to AC</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane " id="newAccount" role="tabpanel">
                            <form id="addAccount">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Account Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="acName" name="acName" class="form-control " placeholder="Account Name" required>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Initial Amount</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="iniAmount" name="iniAmount" class="form-control"placeholder="Initial Amount" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Account</button>
                                    </div>
                                </div>
                            </form>
                            <div class="card-header">
                                <hr><center><h4>Account Name of your School.</h4></center><hr>
                            </div>
                            <div class="table-responsive">
                                <table id="table1" class="table table-bordered">

                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="transactionEntry" role="tabpanel">
                            <form id="entryTransaction">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Date</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="date" name="date" class="form-control date" placeholder="Date" required>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Ref/Cheque Number</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="checquNumber" name="checquNumber" class="form-control" placeholder="Ref/Cheque Number" required>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Description</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="description" name="description" class="form-control " placeholder="Description" required>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Account Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="accName" name="accName" class="form-control" required>
                                            <option value="">Select Account Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Amount Type</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="type" name="type" class="form-control" required>
                                            <option value="">Select Account Name</option>
                                            <option value="income">Income</option>
                                            <option value="expenditure">Expenditure</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1"> Amount</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Entry Amount</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane active" id="transactionDetails" role="tabpanel">
                            {{ Form::open(array('url' => '/api/accountTransaction')) }}
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Start Date</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="startdate" name="startdate" class="form-control date1" placeholder="Start Date" required>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">End Date</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="enddate" name="enddate" class="form-control date1" placeholder="End Date" required>
                                    </div>
                                </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Account Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="accName1" name="accName" class="form-control" required>
                                        <option value="">Select Account Name</option>
                                    </select>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <button type="submit" id="pdfDownload" value="pdfDownload" name="pdfDownload" class="form-control form-bg-primary">PDF Report Download</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" name="xlsDownLoad" value ="xlsDownLoad" id="xlsDownLoad" class="form-control form-bg-primary">Xls Report Download</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" name="search" value="search" id="search" class="form-control form-bg-primary">Search Transaction</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                            @if(isset($transaction))
                                @if(count($transaction)>0)
                                    <div class="card-header">
                                        <hr><center><h4>Transaction Details are given below.</h4></center><hr>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Date</th>
                                                <th>Ref/Cheque Number</th>
                                                <th>Description</th>
                                                <th>Income</th>
                                                <th>Expenses</th>
                                                <th>Final Balance</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach($transaction as $transactions)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$transactions->date}}</td>
                                                <td>{{$transactions->checquNumber}}</td>
                                                <td>{{$transactions->description}}</td>
                                                @if($transactions->type=='income')
                                                <td>{{$transactions->amount}}</td>
                                                    @else
                                                    <td>{{'0'}}</td>
                                                @endif
                                                @if($transactions->type=='expenditure')
                                                <td>{{$transactions->amount}}</td>
                                                @else
                                                    <td>{{'0'}}</td>
                                                @endif
                                                <td>{{$transactions->finalBalance}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="card-header">
                                        <hr><center><h4>No Data Found!Please Try Later.</h4></center><hr>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="tab-pane" id="fundTransfer" role="tabpanel">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Salary Code</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Salary Code">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Salary Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="" class="form-control " id="inputSuccess1" placeholder="Salary Name">
                                </div>
                            </div><hr>
                            <div class="card-header">
                                <center><h4>Salary Type List of Employee!!!</h4></center><hr>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Salary Code</th>
                                        <th>Salary Name</th>
                                        <th>Salary Type</th>
                                        <th>Default Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>2554411
                                        </td>
                                        <td>TA
                                        </td>
                                        <td>1st Class
                                        </td>
                                        <td>50000
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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
        $( ".date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            minDate:0
        });
    } );
    $( function() {
        $( ".date1" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
        });
    } );
    function loadAccountList() {
        $.ajax({
            url: '/api/showAccountList',
            type: 'POST',
            success: function (response) {
                data = response.data;
                var selectBody= '<option value=\"\">Select Account Name</option>';
                var tbody= "<thead> " +
                    "<tr> " +
                    "<th>SL. No</th>" +
                    " <th>Account Name</th>" +
                    " <th>Initial Amount</th>" +
                    " </tr>" +
                    " </thead>"+
                    "<tbody>"+
                    "</tbody>";
                for(var i=0; i<data.length; i++)
                {
                    tbody += "<tr>";
                    tbody += "<td>"+ (i+1) +"</td>";
                    tbody += "<td>"+data[i]['acName']+"</td>";
                    tbody += "<td>"+data[i]['iniAmount']+"</td>";
                    tbody += "</tr>";
                    selectBody += '<option value=\"' + data[i]['acName'] + '\">'+ data[i]['acName'] + '</option>';
                }
                $('#table1').html(tbody);
                $('#accName').html(selectBody);
                $('#accName1').html(selectBody);
            }
        });
    }

    $(document).ready(function(){
        loadAccountList();

        $("#addAccount").validate({
            rules: {
                acName: "required",
                iniAmount: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/insertNewAccount',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            loadAccountList();
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                            loadAccountList();

                        }

                    }
                });
                return false;
            }
        });

        $("#entryTransaction").validate({
            rules: {
                date: "required",
                checquNumber: "required",
                description: "required",
                accName: "required",
                type: "required",
                amount: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/insertTransaction',
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
</script>
@endsection





