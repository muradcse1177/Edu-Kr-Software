<!DOCTYPE html>
<html>
<head>
    <title>Edit Fees Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="/files/assets/pages/edit-table/jquery.tabledit.js"></script>
    <link rel="stylesheet" type="text/css" href="/files/assets/pages/notification/notification.css">
    <link rel="stylesheet" type="text/css" href="/files/bower_components/animate.css/css/animate.css">

</head>
<body>
<table id="editfeesTable" class="table table-bordered">
    <tr>
        <th>SL.</th>
        <th>Fees Name</th>
        <th>Amount</th>
    </tr>
    @php
        $i=1;
    @endphp
    @foreach($feesdetails as $feesdetail)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $feesdetail->feesName}}</td>
            <td>{{$feesdetail->amount}}</td>
            <td style="display:none;">{{ $feesdetail->feesTimeID}}</td>
            <td style="display:none;">{{ $feesdetail->feesId}}</td>
            <td style="display:none;">{{ $feesdetail->id}}</td>
        </tr>
    @endforeach
</table>
<script>
    $('#editfeesTable').Tabledit({
        url: '/api/editfeesAmount',
        deleteButton: true,
        restoreButton: false,
        columns: {
            identifier: [5,'id'],
            editable: [[2,'amount'],[3,'feesTimeID'], [4,'feesId']]
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
