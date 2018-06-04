@extends('layout.app')
@section('title', 'Attendance Management')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
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
                    <center> <h4>Select Your Class for Attendance</h4></center><hr>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 col-xl-4 m-b-30">
                            <select id="employeeType" name="employeeType"  class="form-control ">
                                <option value="">Select Empolyee Type</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Officer">Officer</option>
                                <option value="Stuff">Stuff</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xl-4 m-b-30">
                            <input type="text" id="datepicker_att" class="form-control " placeholder="Select Date" >
                        </div>
                    </div>
                    <hr/>
                </div>
                <div class="card-block" id="cardTable" style="display: block;">
                    <form id="formSaveAttendance" enctype="multipart/form-data" method="POST" >
                        <div class="dt-responsive table-responsive" id="tableDiv">
                        </div>
                        <div class="row">
                            <div  class="col-sm-12 col-xl-3 m-b-30">
                                <input type="submit" value="Save Attendance"  id="submitClassInfo" class="form-control form-bg-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    <script type="text/javascript" class="init">
    </script>

    <script>
        function ConvertFormToJSON(form){
            var formArray = jQuery(form).serializeArray();
            jsonObj = [];
            jQuery.each(formArray, function() {
                var id = this.name;
                var value = this.value;
                console.log(id + value);
                item = {}
                item ["employeeId"] = id;
                item ["attendance"] = value;
                jsonObj.push(item);
            });
            return  JSON.stringify(jsonObj);
        }
    </script>


    <script>
        $( "#datepicker_att" ).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
            dateFormat: "yy-mm-dd",
            onSelect: function(dateText, inst) {
                loadStudentList(dateText);
            }
        });
        function loadStudentList(datatext){
            var selectedDate = datatext;
            var employeeType = $('#employeeType').find(":selected").val();
            $.ajax({
                url: '/api/teacherAttendance',
                type: 'POST',
                data:{selectedDate: selectedDate,employeeType:employeeType},
                success: function (json) {
                    data = json.data;

                    var tbody='<table id="example" class="table table-sm table-bordered" ><thead> ' +
                        "<tr> " +
                        "<th>SL.</th> " +
                        "<th>EmployeeId</th> " +
                        "<th>Name</th> " +
                        "<th>Present</th> " +
                        "<th>Absent</th> " +
                        "<th>Late</th> " +
                        "<th>Leave</th> " +
                        "</tr> " +
                        "</thead> " +
                        "<tbody > " ;
                    for(var i=0; i<data.length; i++)
                    {
                        tbody +="<tr >" ;
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['employeeId']+"</td>";
                        tbody += "<td>"+data[i]['name']+"</td>";
                        tbody +=  "<td> " +
                            "<div class=''> " +
                            "<input  type='checkbox' name='" +data[i]['employeeId']+ "' style='width: 100%; height: 20px;' checked value='Present'> " +
                            "</div> " +
                            "</td>" ;
                        tbody +=  "<td> " +
                            "<div class=''> " +
                            "<input  type='checkbox'  name='" +data[i]['employeeId']+ "' style='width: 100%; height: 20px;' value='Absent'> " +
                            "</div> " +
                            "</td>" ;
                        tbody +=  "<td> " +
                            "<div class=''> " +
                            "<input type='checkbox'  name='" +data[i]['employeeId']+ "' style='width: 100%; height: 20px;' value='Late'> " +
                            "</div> " +
                            "</td>" ;
                        tbody +=  "<td> " +
                            "<div class=''> " +
                            "<input  type='checkbox'  name='" +data[i]['employeeId']+ "' style='width: 100%; height: 20px;' value='Leave'> " +
                            "</div> " +
                            "</td>" ;
                        tbody += "</tr>";
                    }

                    tbody += "</tbody></table>";
                    $('#tableDiv').html(tbody);
                    $("#cardTable").show();

                }
            });

        }
        $(document).ready(function () {
            $('body').on('change','input[type="checkbox"]',function(){
                $('input[name="' + this.name + '"]').not(this).prop('checked', false);
            });
            $("#cardTable").hide();
            jQuery('form#formSaveAttendance').bind('submit', function(event){
                event.preventDefault();
                var form = this;
                var json = ConvertFormToJSON(form);
                var date = $('#datepicker_att').val();
                var employeeType = $('#employeeType').find(":selected").val();
                var fullJson = "{\"date\": \"" +date+ "\", \"employeeType\": \"" +employeeType+ "\", \"attendance\": " + json + "}";

                $.ajax({
                    type: "POST",
                    url: '/api/saveTeacherAttendance',
                    data: fullJson,
                    dataType: "json",
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            $("#cardTable").hide();
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                        }

                    }
                });


                return true;
            });

        });
    </script>
@endsection