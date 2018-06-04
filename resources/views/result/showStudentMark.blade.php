<!DOCTYPE html>
<html>
<head>
    <title>Show Student Marks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="/files/assets/pages/edit-table/jquery.tabledit.js"></script>
    <link rel="stylesheet" type="text/css" href="/files/assets/pages/notification/notification.css">
    <link rel="stylesheet" type="text/css" href="/files/bower_components/animate.css/css/animate.css">

</head>
<body>
@foreach($classInfo as $classInfooo)
    <center><h3>Session:{{$classInfooo->sessionName." ,  "}}Medium:{{$classInfooo->medium."  , "}}Version:{{$classInfooo->version." ,  "}}</h3></center>
    <center><h3>Shift:{{$classInfooo->shift." ,  "}}Class:{{$classInfooo->class."  , "}}Section:{{$classInfooo->section." ,  "}} @if(isset($classInfooo->groupName)) Group:{{$classInfooo->groupName}}@endif</h3></center>
    <center><h3>Sub Code:{{$classInfooo->courseCode}},Exam Name:{{$classInfooo->examName}}</h3></center>
    @break
@endforeach
<table  id="markEntryTable" class="table table-bordered">
    <tr>
        <th>SL.</th>
        <th>Roll</th>
        <th>Full Marks</th>
        <th>Written</th>
        <th>Objective</th>
        <th>Practical</th>
        <th>CT</th>
        <th>Attendance</th>
        <th>SAR</th>
        <th>CA</th>
        <th>Assesment</th>
        <th>Action</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
        <th style='display:none;'>Class Name</th>
    </tr>
    @php
        $i=1;
    @endphp
    @foreach($classInfo as $classInfo)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $classInfo->rollNo}}</td>
            <td>{{$classInfo->fullMarks}}</td>
            <td>{{$classInfo->written}}</td>
            <td>{{$classInfo->objective}}</td>
            <td>{{$classInfo->practical}}</td>
            <td>{{$classInfo->ct}}</td>
            <td>{{$classInfo->attendance}}</td>
            <td>{{$classInfo->sar}}</td>
            <td>{{$classInfo->ca}}</td>
            <td>{{$classInfo->assesment}}</td>
            <td style="display:none;">{{ $classInfo->sessionName}}</td>
            <td style="display:none;">{{ $classInfo->medium}}</td>
            <td style="display:none;">{{ $classInfo->version}}</td>
            <td style="display:none;">{{ $classInfo->shift}}</td>
            <td style="display:none;">{{ $classInfo->class}}</td>
            <td style="display:none;">{{ $classInfo->section}}</td>
            <td style="display:none;">{{ $classInfo->groupName}}</td>
            <td style="display:none;">{{ $classInfo->courseCode}}</td>
            <td style="display:none;">{{ $classInfo->examName}}</td>
            <td style="display:none;">{{ $classInfo->rollNo}}</td>
            <td style="display:none;">{{ $classInfo->resultId}}</td>
            <td style="display:none;">{{ $classInfo->resultId}}</td>
        </tr>
    @endforeach
</table>
<script>
    $('#markEntryTable').Tabledit({
        url: '/api/updateResultStd',
        deleteButton: true,
        columns: {
            identifier: [22,'dbiddel'],
            editable: [ [2,'fullMarks'], [3,'written'], [4,'objective'],
                [5,'practical'], [6,'ct'], [7,'attendance'], [8,'sar'], [9,'ca'],
                [10,'assesment'],[11,'sessionName'],[12,'medium'],[13,'version'],
                [14,'shift'],[15,'class'], [16,'section'], [17,'groupName'],
                [18,'courseCode'],[19,'examName'],[20,'rollNoFinal'],[21,'dbid']]
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
