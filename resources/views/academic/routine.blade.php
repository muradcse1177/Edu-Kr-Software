@extends('layout.app')
@section('title', 'Routine Management')
@section('content')
    <div class="page-header card">
        <div class="card-block">
            <div class="card-header">
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <h5 class="m-b-10">Manage Class Routine</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#showRoutine" role="tab"><i class="icofont icofont-ui-message"></i>Show Routine</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active " id="showRoutine" role="tabpanel">
                            <form id="formshowRoutine">
                                <div class="row">
                                    @include('common.studentClassInfo')
                                    <div class="col-sm-4">
                                        <input type="hidden" id="addressType" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="hidden" id="studentId" class="form-control form-control-success" placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Search Info</button>
                                    </div>
                                </div>
                            </form>
                            <div id="schoolInfo">

                            </div>

                            <div id ="stdInfo">

                            </div>
                            <div class="table-responsive">
                                <hr><center><h6>Routine</h6></center><hr>
                                <div id="tableDiv">

                                </div>

                            </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
@endsection
@section('footer')
    @parent
    @include('common.resource.datatable')
    <script>

        $(document).ready(function(){

            $("#formshowRoutine").validate({

                rules: {
                    group: "required",
                    class: "required",
                    section: "required",
                    acaSession: "required",
                    //teacherId: "required",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/searchRoutine',
                        type: 'POST',
                        data: new FormData($("#formshowRoutine")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                             data = response.data;
                            var daysOfWeek = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                            var sortedData = [];
                            for(var j=0;j<data.length;j++){
                                var x = daysOfWeek.indexOf(data[j]['day']);
                                sortedData[x] = data[j];
                            }
                            data=sortedData;
                            //console.log(data);
                            var tbody= '<table id="example" class="table table-bordered">';
                            tbody += "<thead> " +
                                "<tr> " +
                                "<th>Day</th>" ;
                            th=1;
                            for(var j=0;j<data.length;j++){
                                var startTime = data[j]['startTime'];
                                var startTime = startTime.split(',');
                                var endTime = data[j]['endTime'];
                                var endTime = endTime.split(',');
                                for(var k=0; k<data[0]['totalperiod']; k++){

                                    startTime1=startTime[j].substring(0, 5);
                                    endTime1=endTime[j].substring(0, 5);
                                    tiffinStart=data[0]['tiffinStart'].substring(0, 5);
                                    tiffinEnd=data[0]['tiffinEnd'].substring(0, 5);

                                    if(data[0]['beforeTiffin']==k){
                                        tbody+="<th>"+'Tiffin'+"<br>(" + tiffinStart+ "-" +tiffinEnd +")"+"</th>" ;
                                        if(th==1)
                                            tbody+="<th>"+ th++ +'st' +"<br>(" + startTime1+ "-" + endTime1 +")"+"</th>" ;
                                        else if(th==2)
                                            tbody+="<th>"+ th++ +'nd' +"<br>(" + startTime1+ "-" + endTime1 +")"+"</th>" ;
                                        else if(th==3)
                                            tbody+="<th>"+ th++ +'rd' +"<br>(" + startTime1+ "-" + endTime1 +")"+"</th>" ;
                                        else
                                            tbody+="<th>"+ th++ +'th' +"<br>(" + startTime1+ "-" + endTime1 +")"+"</th>" ;
                                    }
                                    else{
                                        if(th==1)
                                        tbody+="<th>"+ th++ +'st' +"<br>(" + startTime1+ "-" + endTime1 +")"+"</th>" ;
                                        else if(th==2)
                                        tbody+="<th>"+ th++ +'nd' +"<br>(" + startTime1+ "-" + endTime1 +")"+"</th>" ;
                                        else if(th==3)
                                        tbody+="<th>"+ th++ +'rd' +"<br>(" + startTime1+ "-" + endTime1 +")"+"</th>" ;
                                        else
                                        tbody+="<th>"+ th++ +'th' +"<br>(" + startTime1+ "-" + endTime1 +")"+"</th>" ;
                                    }
                                }
                                break;
                            }


                            tbody+=" </tr>" +
                            " </thead>"+
                            "<tbody>";

                            var acaSession= $("#acaSession").val();
                            var medium= $("#medium").val();
                            var version= $("#version").val();
                            var shift= $("#shift").val();
                            var className= $("#class").val();
                            var section= $("#section").val();
                            var group= $("#group").val();

                            for(var j=0;j<data.length;j++){
                                // console.log(data[j]['day']);
                                var day = data[j]['day'];
                                var period = data[j]['period'];
                                var period = period.split(',');
                                var subname = data[j]['subname'];
                                var subname = subname.split(',');
                                var startTime = data[j]['startTime'];
                                var startTime = startTime.split(',');
                                var endTime = data[j]['endTime'];
                                var endTime = endTime.split(',');

                                var final_array = new Array();
                                for(var i=0; i<period.length;i++){
                                    final_array[period[i]-1] = [subname[i]];

                                }

                                tbody += "<tr>";
                                tbody += "<td>"+day+"</td>";
                                for(var i=0; i<data[0]['totalperiod'];i++){
                                    if(data[0]['beforeTiffin']==i){
                                        tbody+="<td></td>" ;
                                        tbody += "<td>"+final_array[i]+"</td>";
                                    }
                                    else
                                    {
                                        if(typeof(final_array[i]) == "undefined")
                                            tbody += "<td></td>";
                                        else tbody += "<td>"+final_array[i]+"</td>";
                                    }
                                }
                                tbody += "</tr>";

                            }
                            tbody += "</tbody></table>";
                            $('#tableDiv').html(tbody);



                            $('#example').DataTable({
                                dom: 'Bfrtip',
                                bInfo : false,
                                paging: false,
                                searching: false,
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
                            $('#stdInfo').html('<p style="font-size:14px;  text-align: center; ">'+'<b>Session:</b>'+acaSession+'    <b>Medium:</b>'+medium+'     <b>Version:</b>'+version+'<br><b>Shift:</b>'+ shift+'  <b>Class:</b>'+ className+'  <b>Section:</b>'+ section+'  <b>Group:</b>'+ group+ '</p>');
                            $('#schoolInfo').html('<center> <h4>{{session()->get('schoolName')}}</h4></center>\n' +
                                '                                <center><img src={{session()->get('logo')}} alt="Logo" height="75" width="75" ></center>')
                        }
                    });
                    return false;
                }
            });

        });
    </script>
@endsection




