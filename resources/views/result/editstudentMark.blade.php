<!DOCTYPE html>
<html>
<head>
    <title>Edit Marks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="/files/assets/pages/edit-table/jquery.tabledit.js"></script>
    <link rel="stylesheet" type="text/css" href="/files/assets/pages/notification/notification.css">
    <link rel="stylesheet" type="text/css" href="/files/bower_components/animate.css/css/animate.css">

</head>
<body>
    @foreach($classInfo as $classInfooo)
        <center><h3>Session:{{$classInfooo->sessionName." ,  "}}Medium:{{$classInfooo->mediumName."  , "}}Version:{{$classInfooo->versionName." ,  "}}</h3></center>
        <center><h3>Shift:{{$classInfooo->shiftName." ,  "}}Class:{{$classInfooo->classNum."  , "}}Section:{{$classInfooo->sectionName." ,  "}} @if(isset($classInfooo->groupName)) Group:{{$classInfooo->groupName}}@endif</h3></center>
        <center><h3>Sub Code:{{$classInfooo->subCode}},Exam Name:{{$classInfooo->examName}}</h3></center>
        @break
    @endforeach
    <table id="markEntryTable" class="table table-bordered">
        <tr>
            <th>SL.</th>
            <th>Roll</th>
            <th>Name</th>
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
        </tr>
        @php
            $i=1;
        @endphp
        @foreach($classInfo as $classInfo)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $classInfo->rollNo}}</td>
                <td>{{$classInfo->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="display:none;">{{ $classInfo->classId}}</td>
                <td style="display:none;">{{ $classInfo->sessionName}}</td>
                <td style="display:none;">{{ $classInfo->mediumName}}</td>
                <td style="display:none;">{{ $classInfo->versionName}}</td>
                <td style="display:none;">{{ $classInfo->shiftName}}</td>
                <td style="display:none;">{{ $classInfo->classNum}}</td>
                <td style="display:none;">{{ $classInfo->sectionName}}</td>
                <td style="display:none;">{{ $classInfo->groupName}}</td>
                <td style="display:none;">{{ $classInfo->subCode}}</td>
                <td style="display:none;">{{ $classInfo->studentId}}</td>
                <td style="display:none;">{{ $classInfo->examName}}</td>
                <td style="display:none;">{{ $classInfo->rollNo}}</td>
            </tr>
        @endforeach
    </table>
    <script>
        $('#markEntryTable').Tabledit({
            url: '/api/insertResultStd',
            deleteButton: false,
            columns: {
                identifier: [0,'id'],
                editable: [[1,'rollNo'],[2,'name'], [3,'fullMarks'], [4,'written'], [5,'objective'],
                    [6,'practical'], [7,'ct'], [8,'attendance'], [9,'sar'], [10,'ca'],
                    [11,'assesment'], [12,'classId'],[13,'sessionName'],[14,'medium'],[15,'version'],
                    [16,'shift'],[17,'class'], [18,'section'], [19,'groupName'],[20,'subCode'],[21,'stdId'],[22,'examName'],[23,'rollNoFinal']]
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
