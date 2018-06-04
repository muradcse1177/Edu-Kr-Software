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
    @if(isset($data))
        @if(count($data)>0)
            <div class="card-header">
                <hr><center><h4>Attendance Details are given below.</h4></center><hr>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Date</th>
                        <th>EmployeeId</th>
                        <th>Name</th>
                        <th>Attendance</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($data as $datas)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$datas->date}}</td>
                            <td>{{$datas->employeeId}}</td>
                            <td>{{$datas->name}}</td>
                            <td>{{$datas->attendance}}</td>
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