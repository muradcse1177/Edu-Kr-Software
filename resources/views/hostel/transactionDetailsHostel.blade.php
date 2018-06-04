@extends('layout.app')
@section('title', 'Transaction Management')
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
            <h5 class="m-b-10">Hostel Fees Management</h5>
            <hr>
            <div  class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link @if(isset($data)){{''}} @else {{'active'}} @endif" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Monthly Bill Genarate</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#billPay" role="tab"><i class="icofont icofont-ui-message"></i>Bill Pay</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(isset($data)){{'active'}} @else {{''}} @endif" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Transaction Details</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane @if(isset($data)){{''}} @else {{'active'}} @endif" id="markEntry" role="tabpanel">
                            <form id="billGenarator">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Hostel Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="hostelName" name="hostelName" class="form-control form-control-success">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Session</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="sessionName" name="sessionName" class="form-control form-control-success session">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Student Id</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name="stdId" class="form-control form-control-success" id="stdId" placeholder="Student Id">
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Year</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="year" name="year" class="form-control form-control-success year">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Month</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="startMonth" name="startMonth" class="form-control form-control-success">
                                            <option value="">Select Month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
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
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Genarate Bill</button>
                                    </div><hr>
                                </div><hr>
                            </form>
                            <div id="schoolInfo">

                            </div>

                            <div id ="stdInfo">

                            </div>

                            <div id ="tableDiv" class="dt-responsive table-responsive">

                            </div>
                        </div>
                        <div class="tab-pane" id="billPay" role="tabpanel">
                            <form id="billPayment">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Hostel Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="hostelName1" name="hostelName" class="form-control form-control-success">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Session</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="sessionName" name="sessionName" class="form-control form-control-success session">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Student Id</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name="stdId" class="form-control form-control-success" id="stdId" placeholder="Student Id">
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Year</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="year" name="year" class="form-control form-control-success year">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Month</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="startMonth" name="startMonth" class="form-control form-control-success">
                                            <option value="">Select Month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Amount</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name="amount" class="form-control form-control-success" id="stdId" placeholder="Amount">
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
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Bill Submit</button>
                                    </div><hr>
                                </div><hr>
                            </form>
                        </div>

                        <div class="tab-pane @if(isset($data)){{'active'}} @else {{''}} @endif" id="feeslog" role="tabpanel">

                            {{ Form::open(array('url' => 'api/searchTransactionHostel')) }}
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Hostel Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="hostelName2" name="hostelName" class="form-control form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Year</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" name="year" class="form-control form-control" placeholder="Enter Year" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Start Month</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="startMonth" name="startMonth" class="form-control form-control" required>
                                        <option value="">Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">End Month</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="endMonth" name="endMonth" class="form-control form-control" required>
                                        <option value="">Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Transaction Status</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="status" name="status" class="form-control form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">Unpaid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Student ID</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="stdId" name="stdId" class="form-control form-control" placeholder="Enter Student ID">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" id="pdf" name="pdf"  value="pdf" class="form-control form-bg-primary">Pdf Download</button>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" name="search" value="search" id="submitClassInfo" class="form-control form-bg-primary">Search Student</button>
                                </div><hr>
                            </div>
                            {{ Form::close() }}

                            <hr>
                            @if(isset($data))
                                @if(count($data)>0)

                                    <center> <h4>Bill Status of the student.</h4></center>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Student Id</th>
                                                <th>Name</th>
                                                <th>Session</th>
                                                <th>Medium</th>
                                                <th>Version</th>
                                                <th>Shift</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach($data as $datas)
                                                <tr>
                                                    <th scope="row">{{$i++}}</th>
                                                    <td>{{$datas->studentId}}
                                                    </td>
                                                    <td width="20px">{{$datas->name}}
                                                    </td>
                                                    <td>{{$datas->sessionName}}
                                                    </td>
                                                    <td>{{$datas->mediumName}}
                                                    </td>
                                                    <td>{{$datas->versionName}}
                                                    </td>
                                                    <td>{{$datas->shiftName}}
                                                    </td>
                                                    <td>{{$datas->classNum}}
                                                    </td>
                                                    <td>{{$datas->sectionName}}
                                                    </td>
                                                    <td>{{$datas->amount}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                            <div class="card-header">
                                                <hr><center><h4>No Data Found!Please Try Later.</h4></center><hr>
                                            </div>
                                        @endif

                                        @endif
                                    </div>

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
    @include('common.resource.datatable')
    <script>
        var data;
        function getHostelName() {
            $.ajax({
                url: '/api/getHostelName',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Hostel Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['name'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    $('#hostelName,#hostelName1,#hostelName2').html(selectBody);
                }
            });
        }
        function getFeesSession() {
            $.ajax({
                url: '/api/getFeesSession',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Session Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['sessionName'] + '\">'+ data[i]['sessionName'] + '</option>';
                    }
                    //console.log(selectBody);
                    $('.session').html(selectBody);
                }
            });
        }
        function getFeesYear() {
            $.ajax({
                url: '/api/getFeesYear',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Year Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['year'] + '\">'+ data[i]['year'] + '</option>';
                    }
                    //console.log(selectBody);
                    $('.year').html(selectBody);
                }
            });
        }
        var editor;
        $(document).ready(function(){
            getFeesSession();
            getFeesYear();
            getHostelName();
            $("#billGenarator").validate({
                rules: {
                    stdId: "required",
                    startMonth: "required",
                    endMonth:  "required",
                    sessionName:  "required",
                    hostelName:  "required",
                },
                messages: {
                    stdId: "Please give Student ID",
                    startMonth: "Please give Start Month",
                    endMonth: "Please give End Month",
                    sessionName: "Please give Session Name",
                    hostelName: "Please give Hostel Name"
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/billGenaratorHostel',
                        type: 'POST',
                        data: $('#billGenarator').serialize(),
                        success: function (response) {
                            data = response.data;
                            //console.log(data);
                            var sum=0;
                            var tbody='<table id="example" class="table"  >' +
                                '<thead> ' +
                                "<tr> " +
                                "<th>SL</th> " +
                                "<th>Fees Name</th> " +
                                "<th>Amount</th> " +
                                "<th></th> " +
                                "<th class='scissor'>✂</th> " +
                                "<th>SL</th> " +
                                "<th>Fees Name</th> " +
                                "<th>Amount</th> " +
                                "<th></th> " +
                                "<th >✂</th> " +
                                "<th>SL</th> " +
                                "<th>Fees Name</th> " +
                                "<th>Amount</th> " +
                                "</tr> " +
                                "</thead> " +
                                "<tbody> " ;
                            for(var i=0; i<data.length; i++)
                            {
                                tbody +="<tr>" ;
                                tbody += "<td>"+ (i+1) +"</td>";
                                tbody += "<td>"+data[i]['feesName']+"</td>";
                                tbody += "<td>"+data[i]['amount']+"</td>";
                                tbody += "<td></td>";
                                tbody += "<td>✂</td> " ;
                                tbody += "<td>"+ (i+1) +"</td>";
                                tbody += "<td>"+data[i]['feesName']+"</td>";
                                tbody += "<td>"+data[i]['amount']+"</td>";
                                tbody += "<td></td>";
                                tbody += "<td >✂</td> " ;
                                tbody += "<td>"+ (i+1) +"</td>";
                                tbody += "<td>"+data[i]['feesName']+"</td>";
                                tbody += "<td>"+data[i]['amount']+"</td>";
                                tbody += "</tr>";
                                sum = sum+data[i]['amount'];
                            }
                            tbody +="<tfoot><tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>" ;
                            tbody +="</tfoot>" ;
                            tbody += "</tbody></table>";
                            // console.log(tbody);

                            $('#tableDiv').html(tbody);

                            $('#example').DataTable({
                                dom: 'Bfrtip',
                                bInfo : false,
                                "columnDefs": [
                                    { "orderable": false, "targets": 0 },
                                    { "orderable": false, "targets": 1 },
                                    { "orderable": false, "targets": 2 },
                                    { "orderable": false, "targets": 3 },
                                    { "orderable": false, "targets": 4 },
                                    { "orderable": false, "targets": 5 },
                                    { "orderable": false, "targets": 6 },
                                    { "orderable": false, "targets": 7 },
                                    { "orderable": false, "targets": 8 },
                                    { "orderable": false, "targets": 9 },
                                    { "orderable": false, "targets": 10 },
                                    { "orderable": false, "targets": 11 },
                                    { "orderable": false, "targets": 12 }
                                ],
                                "footerCallback": function ( row, data, start, end, display ) {
                                    var api = this.api(), data;

                                    // converting to interger to find total
                                    var intVal = function ( i ) {
                                        return typeof i === 'string' ?
                                            i.replace(/[\$,]/g, '')*1 :
                                            typeof i === 'number' ?
                                                i : 0;
                                    };

                                    var amount1 = api
                                        .column( 2 )
                                        .data()
                                        .reduce( function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0 );

                                    var amount2 = api
                                        .column( 7 )
                                        .data()
                                        .reduce( function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0 );

                                    var amount3 = api
                                        .column( 12 )
                                        .data()
                                        .reduce( function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0 );

                                    // Update footer by showing the total with the reference of the column index
                                    $( api.column( 0 ).footer() ).html('Total');
                                    $( api.column( 1 ).footer() ).html('');
                                    $( api.column( 2 ).footer() ).html(amount1);
                                    $( api.column( 5 ).footer() ).html('Total');
                                    $( api.column( 6 ).footer() ).html('');
                                    $( api.column( 7 ).footer() ).html(amount2);
                                    $( api.column( 10 ).footer() ).html('Total');
                                    $( api.column( 11 ).footer() ).html('');
                                    $( api.column( 12 ).footer() ).html(amount3);
                                },
                                paging: false,
                                searching: false,
                                orderable: false,
                                buttons: [
                                    {
                                        title: '<table width="100%"> <tr> <td width="30%" align="center"> <h5>{{session()->get('schoolName')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5> </td> <td width="30%" align="center"> <h5>{{session()->get('schoolName')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5> </td> <td width="30%" align="center"> <h5>{{session()->get('schoolName')}}</h5> </td> </tr> </table>',
                                        //messageTop: '<p style="font-size:14px;  margin-top: 80px; text-align: center; ">'+'<b>Name:</b>'+data[0]['name']+'    <b>Roll:</b>'+data[0]['regNo']+'<br><b>Session:</b>'+ data[0]['sessionName']+'  <b>Medium:</b>'+ data[0]['mediumName']+'  <b>Version:</b>'+ data[0]['versionName']+'  <b>Shift:</b>'+ data[0]['shiftName']+'  <b>Class:</b>'+ data[0]['classNum']+'  <b>Section:</b>'+ data[0]['sectionName']+ '</p>',
                                        messageTop: '<table width="100%">\n' +
                                        '  <tr>\n' +
                                        '    <td width="30%">\n' +
                                        '      <p style="font-size:14px;  margin-top: 80px; text-align: center; ">'+'<b>Name:</b>'+data[0]['name']+'    <b>Roll:</b>'+data[0]['regNo']+'\n' +
                                        '    </td>\n' +
                                        '    <td width="30%">\n' +
                                        '      <p style="font-size:14px;  margin-top: 80px; text-align: center; ">'+'<b>Name:</b>'+data[0]['name']+'    <b>Roll:</b>'+data[0]['regNo']+'\n' +
                                        '    </td>\n' +
                                        '    <td width="30%">\n' +
                                        '      <p style="font-size:14px;  margin-top: 80px; text-align: center; ">'+'<b>Name:</b>'+data[0]['name']+'    <b>Roll:</b>'+data[0]['regNo']+'\n' +
                                        '    </td>\n' +
                                        '  </tr>\n' +
                                        '   <tr>\n' +
                                        '    <td width="30%">\n' +
                                        '      <p style="font-size:14px;  text-align: center; ">'+'<b>Session:</b>'+ data[0]['sessionName']+'  <b>Medium:</b>'+ data[0]['mediumName']+'  <b>Version:</b>'+ data[0]['versionName']+'\n' +
                                        '    </td>\n' +
                                        '    <td width="30%">\n' +
                                        '     <p style="font-size:14px;  text-align: center; ">'+'<b>Session:</b>'+ data[0]['sessionName']+'  <b>Medium:</b>'+ data[0]['mediumName']+'  <b>Version:</b>'+ data[0]['versionName']+'\n' +
                                        '    </td>\n' +
                                        '    <td width="30%">\n' +
                                        '      <p style="font-size:14px;  text-align: center; ">'+'<b>Session:</b>'+ data[0]['sessionName']+'  <b>Medium:</b>'+ data[0]['mediumName']+'  <b>Version:</b>'+ data[0]['versionName']+'\n' +
                                        '    </td>\n' +
                                        '  </tr>\n' +
                                        '   <tr>\n' +
                                        '    <td width="30%">\n' +
                                        '      <p style="font-size:14px;  text-align: center; ">'+'<b>Shift:</b>'+ data[0]['shiftName']+'  <b>Class:</b>'+ data[0]['classNum']+'  <b>Section:</b>'+ data[0]['sectionName']+'\n' +
                                        '    </td>\n' +
                                        '    <td width="30%">\n' +
                                        '     <p style="font-size:14px;  text-align: center; ">'+'<b>Shift:</b>'+ data[0]['shiftName']+'  <b>Class:</b>'+ data[0]['classNum']+'  <b>Section:</b>'+ data[0]['sectionName']+'\n' +
                                        '    </td>\n' +
                                        '    <td width="30%">\n' +
                                        '      <p style="font-size:14px;  text-align: center; ">'+'<b>Shift:</b>'+ data[0]['shiftName']+'  <b>Class:</b>'+ data[0]['classNum']+'  <b>Section:</b>'+ data[0]['sectionName']+'\n' +
                                        '    </td>\n' +
                                        '  </tr>\n' +
                                        '</table>',
                                        extend: 'print',
                                        footer: true,
                                        customize: function ( win ) {
                                            $(win.document.body)
                                                .css( 'font-size', '10pt' )
                                                .prepend(
                                                    '<img src="{{url('/').session()->get('logo')}}" style="opacity: 0.1;position:absolute; height:50%; width:60%; top:35%; left:20%;" />'
                                                );
                                            $(win.document.body)
                                                .css( 'font-size', '10pt' )
                                                .prepend(
                                                    '<table width="100%">\n' +
                                                    '  <tr>\n' +
                                                    '    <td width="33%" >\n' +
                                                    '      <img src="{{url('/').session()->get('logo')}}" style="position:absolute; height:75px; width:75px; top:30px; left:13%;" />'+'\n' +
                                                    '    </td>\n'+
                                                    '    <td width="33%"  >\n' +
                                                    '      <img src="{{url('/').session()->get('logo')}}" style="position:absolute; height:75px; width:75px; top:30px; left:45%;" />'+'\n' +
                                                    '    </td>\n'+
                                                    '    <tdschoolInfo width="33%" >\n' +
                                                    '      <img src="{{url('/').session()->get('logo')}}" style="position:absolute; height:75px; width:75px; top:30px; left:80%;" />'+'\n' +
                                                    '    </td>\n'+
                                                    '  </tr>\n' +
                                                    '</table>'
                                                );
                                            $(win.document.body).find( 'table' )
                                                .addClass( 'compact' )
                                                .css( 'font-size', 'inherit' );
                                        }
                                    }
                                ],
                                orientation: 'landscape'
                            });
                            $('#stdInfo').html('<p style="font-size:14px;  text-align: center; ">'+'<b>Name:</b>'+data[0]['name']+'    <b>Roll:</b>'+data[0]['regNo']+'<br><b>Session:</b>'+ data[0]['sessionName']+'  <b>Medium:</b>'+ data[0]['mediumName']+'  <b>Version:</b>'+ data[0]['versionName']+'  <b>Shift:</b>'+ data[0]['shiftName']+'  <b>Class:</b>'+ data[0]['classNum']+'  <b>Section:</b>'+ data[0]['sectionName']+ '</p>');
                            $('#schoolInfo').html('<center> <h4>{{session()->get('schoolName')}}</h4></center>\n' +
                                '                                <center><img src={{session()->get('logo')}} alt="Logo" height="75" width="75" ></center>')
                        }
                    });
                    return false;
                }
            });

            $("#billPayment").validate({
                rules: {
                    stdId: "required",
                    startMonth: "required",
                    year:  "required",
                    sessionName:  "required",
                    amount:  "required",
                    hostelName:  "required",
                },
                messages: {
                    stdId: "Please give Student ID",
                    startMonth: "Please give Start Month",
                    year: "Please give End Month",
                    sessionName: "Please give Session Name",
                    amount: "Please give Amount",
                    hostelName: "Please give Hostel Name"
                },

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/billPaymentHostel',
                        type: 'POST',
                        data: $('#billPayment').serialize(),
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




