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
                <form id="showstudent">
                    <div class="row">
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <select id="acaSession1" name="acaSession" class="form-control" required>
                                <option value="">Select Session</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <select id="medium1" name="medium" class="form-control" required>
                                <option value="">Medium</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <select id="version1" name="version" class="form-control" required>
                                <option value="">Version</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <select id="shift1" name="shift" class="form-control" required>
                                <option value="">Shift</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <select id="class1" name="class" class="form-control" required>
                                <option value="">Class</option>
                            </select>
                        </div>
                        <div id="idsection" class="col-sm-12 col-xl-3 m-b-30">
                            <select id="section1" name="section" class="form-control" required>
                                <option value="">Section</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <input type="text" id="datepicker_att" class="form-control " placeholder="Select Date" >
                        </div>
                    </div>
                    <div class="row">
                        <div  class="col-sm-12 col-xl-3 m-b-30">
                            <input type="submit" value="Search Student"  id="submitClassInfo" class="form-control form-bg-primary">
                        </div>
                    </div>
                </form>
                <hr/>
            </div>
            <div class="card-block" id="cardTable" style="display: none;">
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
                item ["studentId"] = id;
                item ["attendance"] = value;
                jsonObj.push(item);
            });
            return  JSON.stringify(jsonObj);
        }
    </script>


    <script>
        function loadAcademicSession(){
            $.ajax({
                url: '/api/listSession',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    for(i=0; i<data.length; i++){
                        $('#acaSession1').append($('<option>', {
                            value: data[i].sessionName,
                            text : data[i].sessionName
                        }));
                    }
                }
            });
        }
        $( "#datepicker_att" ).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
            dateFormat: "yy-mm-dd",
        });
        $("#acaSession1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            $.ajax({
                url: '/api/listMedium',
                type: 'POST',
                data:{selectedSession: selectedSession},
                success: function (response) {
                    data = response.data;
                    $('#medium1').find('option').remove();
                    if(data.length>0) {
                        $('#medium1').append($('<option>', {
                            value: "",
                            text: "Select Medium"
                        }));
                    }
                    else{
                        $('#medium1').append($('<option>', {
                            value: "",
                            text: "No Medium Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#medium1').append($('<option>', {
                            value: data[i].mediumName,
                            text: data[i].mediumName
                        }));
                        //$('table').append("<tr class='tr'> <td> "+data[i].name+"</td> <td> "+data[i].email+"</td> </tr>" );
                    }

                }
            });
        });
        //get version list
        $("#medium1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            $.ajax({
                url: '/api/listVersion',
                type: 'POST',
                data:{selectedMedium: selectedMedium, selectedSession: selectedSession},
                success: function (response) {
                    data = response.data;
                    // $('.tr').remove();
                    $('#version1').find('option').remove();
                    if(data.length>0) {
                        $('#version1').append($('<option>', {
                            value: "",
                            text: "Select Version"
                        }));
                    }
                    else{
                        $('#version1').append($('<option>', {
                            value: "",
                            text: "No Version Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#version1').append($('<option>', {
                            value: data[i].versionName,
                            text: data[i].versionName
                        }));
                        //$('table').append("<tr class='tr'> <td> "+data[i].name+"</td> <td> "+data[i].email+"</td> </tr>" );
                    }

                }
            });
        });
        //get shift list
        $("#version1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            var selectedVersion = $('#version1').find(":selected").val();
            $.ajax({
                url: '/api/listShift',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion},
                success: function (response) {
                    data = response.data;
                    // $('.tr').remove();
                    $('#shift1').find('option').remove();
                    if(data.length>0) {
                        $('#shift1').append($('<option>', {
                            value: "",
                            text: "Select Shift"
                        }));
                    }
                    else{
                        $('#shift1').append($('<option>', {
                            value: "",
                            text: "No shift Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#shift1').append($('<option>', {
                            value: data[i].shiftName,
                            text: data[i].shiftName
                        }));
                    }

                }
            });
        });
        //get class list
        $("#shift1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            var selectedVersion = $('#version1').find(":selected").val();
            var selectedShift = $('#shift1').find(":selected").val();
            $.ajax({
                url: '/api/listClass',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion, selectedShift: selectedShift},
                success: function (response) {
                    data = response.data;
                    // $('.tr').remove();
                    $('#class1').find('option').remove();
                    if(data.length>0) {
                        $('#class1').append($('<option>', {
                            value: "",
                            text: "Select Class"
                        }));
                    }
                    else{
                        $('#class1').append($('<option>', {
                            value: "",
                            text: "No class Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#class1').append($('<option>', {
                            value: data[i].classNum,
                            text: data[i].classNum
                        }));
                    }

                }
            });
        });
        //get Section list
        $("#class1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            var selectedVersion = $('#version1').find(":selected").val();
            var selectedShift = $('#shift1').find(":selected").val();
            var selectedClass = $('#class1').find(":selected").val();
            $.ajax({
                url: '/api/listSection',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion, selectedShift: selectedShift, selectedClass: selectedClass},
                success: function (response) {
                    data = response.data;
                    // $('.tr').remove();
                    $('#section1').find('option').remove();
                    if(data.length>0) {
                        $('#section1').append($('<option>', {
                            value: "",
                            text: "Select Section"
                        }));
                    }
                    else{
                        $('#section1').append($('<option>', {
                            value: "",
                            text: "No Section Found"
                        }));
                    }
                    for (i = 0; i < data.length; i++) {
                        $('#section1').append($('<option>', {
                            value: data[i].sectionName,
                            text: data[i].sectionName
                        }));
                    }

                }
            });


        });
        //get ClassId
        $("#section1").on("change", function(evt) {
            //$("#wait").show();
            var selectedSession = $('#acaSession1').find(":selected").val();
            var selectedMedium = $('#medium1').find(":selected").val();
            var selectedVersion = $('#version1').find(":selected").val();
            var selectedShift = $('#shift1').find(":selected").val();
            var selectedClass = $('#class1').find(":selected").val();
            var selectedSection = $('#section1').find(":selected").val();
            $.ajax({
                url: '/api/findClassId',
                type: 'POST',
                data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion,
                    selectedShift: selectedShift, selectedClass: selectedClass, selectedSection:selectedSection},
                success: function (response) {
                    data = response.data;

                }
            });
        });
    $(document).ready(function () {
        loadAcademicSession();
        $('body').on('change','input[type="checkbox"]',function(){
            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        });

        $("#showstudent").validate({
            submitHandler: function(form) {
                var selectedDate =  $('#datepicker_att').find(":selected").val();
                var selectedSession = $('#acaSession1').find(":selected").val();
                $.ajax({
                    url: '/api/studentAttendance',
                    type: 'POST',
                    data: new FormData($("#showstudent")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        data = response.data;
                        var tbody='<table id="example" class="table table-sm table-bordered" ><thead> ' +
                            "<tr> " +
                            "<th>SL.</th> " +
                            "<th>Name</th> " +
                            "<th>Roll</th> " +
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
                            tbody += "<td>"+data[i]['name']+"</td>";
                            tbody += "<td>"+data[i]['rollNo']+"</td>";
                            tbody +=  "<td> " +
                                "<div class=''> " +
                                "<input  type='checkbox' name='" +data[i]['studentId']+ "' style='width: 100%; height: 20px;' checked value='Present'> " +
                                "</div> " +
                                "</td>" ;
                            tbody +=  "<td> " +
                                "<div class=''> " +
                                "<input  type='checkbox'  name='" +data[i]['studentId']+ "' style='width: 100%; height: 20px;' value='Absent'> " +
                                "</div> " +
                                "</td>" ;
                            tbody +=  "<td> " +
                                "<div class=''> " +
                                "<input type='checkbox'  name='" +data[i]['studentId']+ "' style='width: 100%; height: 20px;' value='Late'> " +
                                "</div> " +
                                "</td>" ;
                            tbody +=  "<td> " +
                                "<div class=''> " +
                                "<input  type='checkbox'  name='" +data[i]['studentId']+ "' style='width: 100%; height: 20px;' value='Leave'> " +
                                "</div> " +
                                "</td>" ;
                            tbody += "</tr>";
                        }

                        tbody += "</tbody></table>";
                        $('#tableDiv').html(tbody);
                        $("#cardTable").css("display", "block");

                    }
                });
                return false;
            }
        });
        jQuery('form#formSaveAttendance').bind('submit', function(event){
            event.preventDefault();
            var form = this;
            var json = ConvertFormToJSON(form);
            console.log(json);
            var date = $('#datepicker_att').val();
            var courseId = $('#course').find(":selected").val();
            var fullJson = "{\"date\": \"" +date+ "\", \"courseId\": \"" +courseId+ "\", \"attendance\": " + json + "}";

            console.log(fullJson);

            $.ajax({
                type: "POST",
                url: '/api/saveStdAttendance',
                data: fullJson,
                dataType: "json",
                success: function (response) {

                    if (typeof response.successMsg !== 'undefined')
                    {
                        $("#newStudentId").text("New Student Id: "+response.newStudentId);
                        notify('success', response.successMsg);
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