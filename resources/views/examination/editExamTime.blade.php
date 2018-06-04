<!DOCTYPE html>
<html>
<head>
    <title>Edit Examination Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="/files/assets/pages/edit-table/jquery.tabledit.js"></script>
    <link rel="stylesheet" type="text/css" href="/files/assets/pages/notification/notification.css">
    <link rel="stylesheet" type="text/css" href="/files/bower_components/animate.css/css/animate.css">

</head>
<body>

<table id="examTimeTable" class="table table-bordered">
    <tr>
        <th>SL.No</th>
        <th>Class Name</th>
        <th>Sub Name</th>
        <th>Sub Code</th>
        <th>Exam Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Room</th>
        <th>Teacher Code</th>
        <th style='display:none;'>Class Name</th>
    </tr>
    @php
        $i=1;
    @endphp
    @foreach($datas as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->class}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->code}}</td>
            <td>{{$data->date}}</td>
            <td>{{$data->startTime}}</td>
            <td>{{$data->endTime}}</td>
            <td>{{$data->roomNo}}</td>
            <td>{{$data->TeacherName}}</td>
            <td style="display:none;">{{ $data->id}}</td>
        </tr>
    @endforeach
</table>
<script>
    $('#examTimeTable').Tabledit({
        url: '/api/updateExamDateTime',
        deleteButton: true,
        columns: {
            identifier: [9, 'id'],
            editable: [[4, 'date'], [5, 'startTime'], [6, 'endTime'], [7, 'roomNo'], [8, 'TeacherName']]
        },
        onSuccess: function (data, textStatus, jqXHR) {
            if (typeof data.successMsg !== 'undefined') {
                notify('success', data.successMsg);
            }
            if (typeof data.errorMsg !== 'undefined') {
                notify('danger', data.errorMsg);
            }
        },
    });
</script>

<script src="/files/assets/js/bootstrap-growl.min.js"></script>
<script src="/files/assets/pages/notification/notification.js"></script>

</body>
</html>
