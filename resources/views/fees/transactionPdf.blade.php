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
                            <td>{{$datas->name}}
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
</body>
</html>