<!DOCTYPE html>
<html>
<style>
    #watermark {
        position: fixed;
        left:     29%;
        top: 30%;
        width:    21.8cm;
        height:   28cm;
        opacity: 0.2;
        z-index:  -1000;
    }
    #background{
        position:absolute;
        z-index:0;
        background:white;
        display:block;
        min-height:50%;
        min-width:50%;
        color:yellow;
    }

    #content{
        position:absolute;
        z-index:1;
    }

    #bg-text
    {
        color:lightgrey;
        font-size:70px;
        transform:rotate(300deg);
        -webkit-transform:rotate(300deg);
    }
</style>
<body>
        <div class="container">
            @foreach($employeeInfo as $employeeInfo)

            @endforeach
            <div id="background">
                <p id="bg-text">PAID</p>
            </div>
            <div id="content">
                <table style="width:100%">
                    <tbody>
                    <tr>
                        <td align="center"><img height="75" width="75" src="{{ public_path().Session::get('logo') }}"></td>
                    </tr>
                    <tr>
                        <td align="center"> {{ Session::get('schoolName') }}</td>
                    </tr>
                    <tr>
                        <td align="center"> {{ Session::get('address') }}</td>
                    </tr>
                    <tr>
                        <td align="center"> Cell: +{{ Session::get('contactNumber') }}</td>
                    </tr>
                    </tbody>
                </table>
                <center><h2>{{ 'Payslip for the month of   '.date('M-Y')  }}</h2></center><hr>
                <table style="width:100%">
                    <tbody>
                    <tr>
                        <td  width= "33%" align="center"> EmployeeID: {{ $employeeInfo->employeeId }}</td>
                        <td  width= "33%" align="center"> Name: {{ $employeeInfo->name }}</td>
                        <td  width= "33%" align="center"> Cell: +{{ $employeeInfo->mobile }}</td>
                    </tr>

                    </tbody>
                </table>

                <table style="width:100%">
                    <tbody>
                    <tr >
                        <td  width= "30%" align="left" > <h2>Earnings: </h2><h4>Description </h4><hr align="left" width="60%"></td>
                        <td  width= "17%" align="right"><h2><br></h2> <h4>Amount </h4><hr align="right" width="60%"></td>
                        <td  width= "6%" align="left">    </td>
                        <td  width= "30%" align="left"> <h2>Deduction:</h2><h4>Description</h4><hr align="left" width="60%"></td>
                        <td  width= "17%" align="right"><h2><br></h2> <h4>Amount </h4><hr align="right" width="60%"></td>
                    </tr>
                    <tr >
                        @if(isset($employeeInfo->basic))
                            <td  width= "30%" align="left" > {{'Basic'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->basic)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                        <td  width= "6%" align="left">    </td>
                        @if(isset($employeeInfo->proFund))
                            <td  width= "30%" align="left" > {{'Provident Fund'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->proFund)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                    </tr>
                    <tr >
                        @if(isset($employeeInfo->medical))
                            <td  width= "30%" align="left" > {{'Medical'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->medical)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                        <td  width= "6%" align="left">    </td>
                        @if(isset($employeeInfo->loan))
                            <td  width= "30%" align="left" > {{'Loan'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->loan)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                    </tr>
                    <tr >
                        @if(isset($employeeInfo->houseRent))
                            <td  width= "30%" align="left" > {{'House rent'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->houseRent)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                        <td  width= "6%" align="left">    </td>
                        @if(isset($employeeInfo->bima))
                            <td  width= "30%" align="left" > {{'Bima'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->bima)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                    </tr>
                    <tr >
                        @if(isset($employeeInfo->conveyance))
                            <td  width= "30%" align="left" > {{'Conveyance'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->conveyance)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                        <td  width= "6%" align="left">    </td>
                        @if(isset($employeeInfo->fund))
                            <td  width= "30%" align="left" > {{'Fund'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->fund)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                    </tr>
                    <tr >
                        @if(isset($employeeInfo->allowance))
                            <td  width= "30%" align="left" > {{'Allowance'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->allowance)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                        <td  width= "6%" align="left">    </td>
                    </tr>
                    <tr >
                        @if(isset($employeeInfo->transAllowance))
                            <td  width= "30%" align="left" > {{'Trans Allowance'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->transAllowance)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                        <td  width= "6%" align="left">    </td>
                    </tr>
                    <tr>
                        @if(isset($employeeInfo->dailyAllowance))
                            <td  width= "30%" align="left" > {{'DailyAllowance'}}</td>
                            <td  width= "17%" align="right" > {{(($employeeInfo->dailyAllowance)/100)*$employeeInfo->netSalary}}Tk.</td>
                        @endif
                        <td  width= "6%" align="left">    </td>
                    </tr>
                    <tr >
                        <td  width= "17%" align="left"><h4><hr align="left" width="60%">Totals: </h4></td>
                        <td  width= "17%" align="right"><h4><hr align="right" width="60%">{{
                        (($employeeInfo->basic)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->medical)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->houseRent)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->conveyance)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->allowance)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->transAllowance)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->dailyAllowance)/100)*$employeeInfo->netSalary
                        }}Tk. </h4></td>
                        <td  width= "6%" align="left">    </td>
                        <td  width= "30%" align="left"> <h4><hr align="left" width="60%">Totals:</h4></td>
                        <td  width= "17%" align="right"><h4><hr align="right" width="60%">{{
                        (($employeeInfo->proFund)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->loan)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->bima)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->fund)/100)*$employeeInfo->netSalary
                        }}Tk. </h4></td>
                    </tr>
                    </tbody>
                </table>
                <div id="watermark">
                    <img height="300" width="300" src="{{ public_path().Session::get('logo') }}">
                </div>
                <div width="100%" height="30px" style="background-color: #DCDCDC">

                    <table width= "100%">
                        <tbody>
                        <tr>
                            <th width= "80%" align="right">Total :</th>
                            <td width= "8%" align="left">
                            </td>
                            <td width= "20%" align="right">{{
                        ((($employeeInfo->basic)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->medical)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->houseRent)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->conveyance)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->allowance)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->transAllowance)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->dailyAllowance)/100)*$employeeInfo->netSalary)-
                        ((($employeeInfo->proFund)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->loan)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->bima)/100)*$employeeInfo->netSalary+
                        (($employeeInfo->fund)/100)*$employeeInfo->netSalary)

                        }}Tk.</td>
                        </tr>
                        <tr>
                            <th width= "80%" align="right">Taxes (0%) :</th>
                            <td width= "8%" align="left">
                            </td>
                            <td width= "20%" align="right">{{$employeeInfo->netSalary*(00/100)}}Tk.</td>
                        </tr>
                        <tr class="text-info">
                            <td width= "80%" align="right">
                                <hr />
                                <h3 style="color:#006400" >Grand Total :</h3>
                            </td>
                            <td width= "8%" align="left">

                            </td>
                            <td width= "12%" align="right">
                                <hr />
                                <h3  style="color:#006400">
                                    {{((($employeeInfo->basic)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->medical)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->houseRent)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->conveyance)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->allowance)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->transAllowance)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->dailyAllowance)/100)*$employeeInfo->netSalary)-
                                    ((($employeeInfo->proFund)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->loan)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->bima)/100)*$employeeInfo->netSalary+
                                    (($employeeInfo->fund)/100)*$employeeInfo->netSalary)-$employeeInfo->netSalary*(10/100)}}Tk.
                                </h3>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div >
                    <h4>Terms And Condition :</h4>
                    <p>The Salary is prepared by <b>{{ Session::get('schoolName') }}</b> HR division.If any kind of problem or further query please call  +{{ Session::get('contactNumber') }}.</p>
                </div>
            </div>
        </div>
</body>
</html>