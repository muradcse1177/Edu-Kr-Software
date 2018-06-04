<!DOCTYPE html>
<html>
<head>
    <title>Edit Marks Distribution</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="/files/assets/pages/edit-table/jquery.tabledit.js"></script>
    <link rel="stylesheet" type="text/css" href="/files/assets/pages/notification/notification.css">
    <link rel="stylesheet" type="text/css" href="/files/bower_components/animate.css/css/animate.css">

</head>
<body>
<table id="subjectMark" class="table table-bordered">
    <tr>
        <th>SL.No</th>
        <th>Class Name</th>
        <th>Sub Code</th>
        <th>Sub Name</th>
        <th>Full Marks</th>
        <th>Written</th>
        <th>Objective</th>
        <th>Practical</th>
        <th>Class Test</th>
        <th>Attendance</th>
        <th>SAR</th>
        <th>CA</th>
        <th>Assessment</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
    </tr>
    @php
        $i=1;
    @endphp
    @foreach($datas as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->class}}</td>
            <td>{{$data->courseCode}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->fullMarks}}</td>
            <td>{{$data->written}}</td>
            <td>{{$data->objective}}</td>
            <td>{{$data->practical}}</td>
            <td>{{$data->ct}}</td>
            <td>{{$data->attendance}}</td>
            <td>{{$data->sar}}</td>
            <td>{{$data->ca}}</td>
            <td>{{$data->assesment}}</td>
            <td style="display:none;">{{ $data->id}}</td>
            <td style="display:none;">{{ $data->class}}</td>
        </tr>
    @endforeach
</table>
<script>
    $('#subjectMark').Tabledit({
        url: '/api/updateExamInfo',
        deleteButton: true,
        columns: {
            identifier: [13,'id'],
            editable: [[4,'fullMarks'], [5,'written'], [6,'objective'], [7,'practical'], [8,'ct'], [9,'attendance'], [10,'sar'], [11,'ca'], [12,'assesment'], [14,'class']]
        },
        onSuccess: function(data, textStatus, jqXHR) {
            if (typeof data.successMsg !== 'undefined')
            {
                notify('success', data.successMsg);
            }
            if (typeof data.errorMsg !== 'undefined')
            {
                notify('danger', data.errorMsg);
            }
        },
    });
</script>

<script src="/files/assets/js/bootstrap-growl.min.js"></script>
<script src="/files/assets/pages/notification/notification.js"></script>

</body>
</html>
