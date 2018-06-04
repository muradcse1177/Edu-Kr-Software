@extends('layout.app')
@section('title', 'Attendance Report')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header ">
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
                <center> <h4>Attendance Report</h4></center><hr>
            </div>

            <div class="card-block">
                <form id="formShowStdAttendanceReport" enctype="multipart/form-data" method="POST" >
                    <div class="row">
                        @include('common.studentClassInfo')
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <input type="text" id="start_date" name="start_date" class="form-control " placeholder="Start Date" required>
                        </div>
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <input type="text" id="end_date" name="end_date" class="form-control " placeholder="End Date" required >
                        </div>
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <input type="text" id="studentId" name="studentId" class="form-control " placeholder="Student Code">
                        </div>
                    </div>
                    <div class="row">
                        <div  class="col-sm-12 col-xl-3 m-b-30">
                            <input type="submit" value="Show Attendance"  id="showAttendanceReport" class="form-control form-bg-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <hr/>
                    <div class="dt-responsive table-responsive" id="tableDiv1">
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('footer')
    @parent
    @include('common.resource.datatable')

    <script type="text/javascript">
        $(document).ready(function () {
            $( "#start_date" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",

            });
            $( "#end_date" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
            });

            $("#formShowStdAttendanceReport").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/showStdAttendance',
                        type: 'POST',
                        data: $('#formShowStdAttendanceReport').serialize(),
                        success: function (response) {
                            data = response.data;
                            if(data.length>0) {

                                var mytable = $.makeTable(data);
                                $('#tableDiv1').html(mytable);

                                var acaSession= $("#acaSession").val();
                                var medium= $("#medium").val();
                                var version= $("#version").val();
                                var shift= $("#shift").val();
                                var className= $("#class").val();
                                var section= $("#section").val();
                                var group= $("#group").val();

                                $('#example').DataTable({
                                    dom: 'Bfrtip',
                                    bInfo : false,
                                    paging: false,
                                    searching: true,
                                    "order": [],
                                    "columnDefs": [
                                        {
                                            "type": "html-num-fmt", "targets": 4,
                                            "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9]
                                        }
                                    ],
                                    exportOptions: {
                                        stripHtml: false
                                    },
                                    buttons: [
                                        {
                                            title: '<table width="100%"> <tr> <td width="100%" align="center"> <h5>{{session()->get('schoolName')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5> </td></tr> </table>',
                                            messageTop: '<table width="100%">\n' +
                                            '  <tr>\n' +
                                            '    <td width="100%">\n' +
                                            '      <p style="font-size:14px;  margin-top: 80px; text-align: center; ">'+'<b>Session:</b>'+acaSession+'  <b>Medium:</b>'+medium+'  <b>Version:</b>'+version+'\n' +
                                            '      <p style="font-size:14px;  text-align: center; ">'+'<b>Shift:</b>'+ shift+'  <b>Class:</b>'+ className+'  <b>Section:</b>'+ section+'  <b>Group:</b>'+ group+'\n' +
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
                                                        '    <td width="100%" align="center"; >\n' +
                                                        '      <img src="{{url('/').session()->get('logo')}}" style="position:absolute; height:75px; width:75px; top:30px; left:45%;" />'+'\n' +
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

                            }
                            else $('#tableDiv1').html("<h6>No Data Found</h6>");
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                }
            });

        });

    </script>

@endsection