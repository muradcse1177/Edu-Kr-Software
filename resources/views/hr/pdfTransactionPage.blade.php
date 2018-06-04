<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <center><h2>{{ Session::get('schoolName') }}</h2></center>
    <center><img height="75" width="75" src="{{ public_path().Session::get('logo') }}"></center>
    <center><p>{{ Session::get('address') }}</p></center>
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
</body>
</html>