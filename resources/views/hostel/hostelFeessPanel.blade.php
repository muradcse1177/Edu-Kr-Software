@extends('layout.app')
@section('title', 'Fees Management')
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
            <h5 class="m-b-10">Hostel Fees Management</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Fees Create</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Fees Log/Edit</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="markEntry" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalAddSession" data-toggle="tooltip"   data-placement="top" title="Edit">
                                        <i class="fa fa-plus-square"></i>Add New Fees</button>
                                </div>
                            </div>
                            <div class="modal fade" id="modalAddSession" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Fees Name</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="addnewfees">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Fees Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="feesName" class="form-control " id="feesName" placeholder="Enter Fees Name">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Add Fees</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @include('common.studentClassInfo')
                            </div>

                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Year</label>
                                </div>
                                <div class="col-sm-10">
                                    <select name="yearpicker" id="yearpicker" class="form-control">
                                        <option value="">Select Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Month</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="month" name="month" class="form-control">
                                        <option value="">Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Hostel Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="hostelName" name="hostelName" class="form-control" required>

                                    </select>
                                </div>
                            </div>
                            <form id="formAddSliderImage">

                                <div id="newElement"></div>

                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Fees Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="selectMenu" name="selectMenu" class="form-control">

                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Fees</button>
                                    </div><hr>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="feeslog" role="tabpanel">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Hostel Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <select name="hostelName" id="hostelName1" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Year</label>
                                </div>
                                <div class="col-sm-10">
                                    <select name="selectYear" id="selectYear" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Month</label>
                                </div>
                                <div class="col-sm-10">
                                    <select id="selectMonth" name="selectMonth" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <hr>
                            <center> <h4>Fess List for Setting</h4></center>
                            <div class="table-responsive">
                                <table id="feesListTable" class="table table-bordered">

                                </table>
                                <div class="modal fade" id="editfees" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Fees</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <center><h5 class="m-b-10">Edit Again</h5></center>
                                                <div>
                                                    <input type="hidden" id="feesTimeId" name="feesTimeId" class="form-control " value="" >
                                                </div>
                                                <form id="formEditFees">
                                                    <div id="editElement">

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <center><h4 class="modal-title">Are You Sure to Delete This??</h4></center>
                                            </div>
                                            <div class="modal-footer">
                                                <form id="formdeleteFees">
                                                    <input type="hidden" id="feesTimeIdDel" name="feesTimeIdDel" class="form-control " value="" >
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
    <script>
        function getHostelName() {
            $.ajax({
                url: '/api/getHostelName',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var selectBody= '<option value=\"\">Select Hostel Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['name'] + '\">'+ data[i]['name'] + '</option>';

                    }
                    $('#hostelName,#hostelName1').html(selectBody);
                }
            });
        }
        function feesList() {
            $.ajax({
                url: '/api/showFessName',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Fees Name</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['feesId'] + '\">'+ data[i]['feesName'] + '</option>';

                    }
                    //console.log(selectBody);
                    $('#selectMenu').html(selectBody);
                }
            });
        }

        var feesTimeId;
        $('#hostelName1').on('change', function() {
            var hostelName= $('#hostelName1').val();
            //alert(hostelName);
            $.ajax({
                url: '/api/getYearHostel',
                type: 'POST',
                data: {hostelName:hostelName},
                dataType:'json',
                success: function (response) {
                    data = response.data;
                    //console.log(data);
                    var selectBody= '<option value=\"\">Select Year</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        selectBody += '<option value=\"' + data[i]['year'] + '\">'+ data[i]['year'] + '</option>';

                    }
                    // console.log(selectBody);
                    $('#selectYear').html(selectBody);
                }
            });
        });

        $('#selectYear').on('change', function() {
            var hostelName= $('#hostelName1').val();
            var year= this.value ;
            $.ajax({
                url: '/api/getMonthHostel',
                type: 'POST',
                data: {hostelName:hostelName,year:year},
                dataType:'json',
                success: function (response) {
                    data = response.data;

                    var selectBody= '<option value=\"\">Select Month</option>';

                    for(var i=0; i<data.length; i++)
                    {
                        feesTimeId=data[i]['feesTimeId'];
                        var monthValue = data[i]['month'];
                        switch (monthValue) {
                            case 1:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">January</option>';
                                break;
                            case 2:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">February</option>';
                                break;
                            case 3:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">March</option>';
                                break;
                            case 4:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">April</option>';
                                break;
                            case 5:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">May</option>';
                                break;
                            case 6:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">June</option>';
                                break;
                            case 7:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">July</option>';
                                break;
                            case 8:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">August</option>';
                                break;
                            case 9:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">September</option>';
                                break;
                            case 10:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">October</option>';
                                break;
                            case 11:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">November</option>';
                                break;
                            case 12:
                                selectBody += '<option value=\"' + data[i]['month'] + '\">December</option>';
                                break;
                        }

                    }
                    $('#selectMonth').html(selectBody);
                }
            });
        });

        $('#selectMonth').on('change', function() {
            var hostelName= $('#hostelName1').val();
            var year= $('#selectYear').val();
            var month=  this.value ;
            var monthValue =month;
            var  monthName;
            switch (monthValue) {
                case '1':
                    monthName = "January";
                    break;
                case '2':
                    monthName = "February";
                    break;
                case '3':
                    monthName = "March";
                    break;
                case '4':
                    monthName = "April";
                    break;
                case '5':
                    monthName = "May";
                    break;
                case '6':
                    monthName = "June";
                    break;
                case '7':
                    monthName = "July";
                    break;
                case '8':
                    monthName = "August";
                    break;
                case '9':
                    monthName = "September";
                    break;
                case '10':
                    monthName = "October";
                    break;
                case '11':
                    monthName = 'November';
                    break;
                case '12':
                    monthName = "December";
                    break;
            }

            var tbody= "<thead> " +
                "<tr> " +
                "<th>SL. No</th>" +
                " <th>Class</th>" +
                " <th>Month</th>" +
                " <th>Year</th>" +
                " <th>Action</th>" +
                " </tr>" +
                " </thead>"+
                "<tbody>"+
                "</tbody>";
            tbody += "<tr>";
            tbody += "<td>"+ 1+"</td>";
            tbody += "<td>"+hostelName+"</td>";
            tbody += "<td>"+monthName+"</td>";
            tbody += "<td>"+year+"</td>";
            tbody += "<td>" +"<div class='animation-model'>" +
                " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='showFeesList(this.id);' id="+ feesTimeId +"  data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                "<i class='fa fa-edit'></i> " +
                "</button>&nbsp;&nbsp;" +
                "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteDesig(this.id);' id="+ feesTimeId +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                "<i class='fa fa-trash'></i> " +
                "</button> " +
                "</div> " +
                "</td>";
            tbody += "</tr>";

            $('#feesListTable').html(tbody);

        });

        function showFeesList(feesTimeId) {
            var fullJson = feesTimeId;
            window.location.href = "/api/showFeesListHostel?feesTimeId="+fullJson;
        }


        $(document).ready(function(){

            for (i = new Date().getFullYear()+1; i > new Date().getFullYear()-1; i--)
            {
                $('#yearpicker').append($('<option />').val(i).html(i));
            }
            feesList();
            getHostelName();
            $('#selectMenu').change(function(){
                if( $(this).val()){
                    var feesName = $(this).val();
                    $('#newElement').append('<div class="form-group has-success row">\n' +
                        '                                <div class="col-sm-2">\n' +
                        '                                    <label class="col-form-label" for="inputSuccess1">'+ $("#selectMenu :selected").text() +'</label>\n' +
                        '                                </div>\n' +
                        '                                <div class="col-sm-10">\n' +
                        '                                    <input type="text" name="'+feesName +'" class="form-control " id="'+ feesName+ '" placeholder="In Tk">\n' +
                        '                                </div>\n' +
                        '                            </div>');
                    $("#selectMenu option[value=\'"+feesName+"\']").remove();
                }

            });

            $("#addnewfees").validate({
                rules: {
                    feesName: "required",
                },
                messages: {
                    feesName: "Please give Fees Name",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/insertFeesName',
                        type: 'POST',
                        data: new FormData($("#addnewfees")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                feesList();
                                $('#modalAddSession').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#modalAddSession').modal('hide');
                            }

                        }
                    });
                    return false;
                }
            });

            $("#formAddSliderImage").validate({

                //ignore: ":hidden",

                rules: {
                    yearpicker: {required: true, number: true},
                    month: "required",
                    1: {required: true, number: true},
                    2: {required: true, number: true},
                    3: {required: true, number: true},
                    4: {required: true, number: true},
                    5: {required: true, number: true},
                    6: {required: true, number: true},
                    7: {required: true, number: true},
                    8: {required: true, number: true},
                    9: {required: true, number: true},
                    10: {required: true, number: true},
                    11: {required: true, number: true},
                    12: {required: true, number: true},
                    13: {required: true, number: true},
                    14: {required: true, number: true},
                    15: {required: true, number: true},
                    16: {required: true, number: true},
                    17: {required: true, number: true},
                    18: {required: true, number: true},
                    19: {required: true, number: true},
                    20: {required: true, number: true},
                    21: {required: true, number: true},
                    22: {required: true, number: true},
                    23: {required: true, number: true},
                    24: {required: true, number: true},
                    25: {required: true, number: true},
                    26: {required: true, number: true},
                },
                messages: {
                    yearpicker: "Please give year",
                    month: "Please give end month"
                },

                submitHandler: function(form) {
                    var data = JSON.stringify( $(form).serializeArray() );
                    //console.log( data );
                    var year = $('#yearpicker').val();
                    var month = $('#month').find(":selected").val();
                    var hostelname = $('#hostelName').find(":selected").val();
                    var fullJson = "{\"year\": \"" +year+ "\", \"month\": \"" +month+ "\", \"hostelName\": \"" +hostelname+ "\", \"fees\": " + data + "}";
                    //console.log(fullJson);

                    $.ajax({
                        url: '/api/insertFeesHostel',
                        type: 'POST',
                        data: fullJson,
                        dataType:'json',
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                getClassName();
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                            }

                        }
                    });

                    return false;

                }
            });

            $("#formEditFees").validate({

                //ignore: ":hidden",

                rules: {
                    1: {required: true, number: true},
                    2: {required: true, number: true},
                    3: {required: true, number: true},
                    4: {required: true, number: true},
                    5: {required: true, number: true},
                    6: {required: true, number: true},
                    7: {required: true, number: true},
                    8: {required: true, number: true},
                    9: {required: true, number: true},
                    10: {required: true, number: true},
                    11: {required: true, number: true},
                    12: {required: true, number: true},
                    13: {required: true, number: true},
                    14: {required: true, number: true},
                    15: {required: true, number: true},
                    16: {required: true, number: true},
                    17: {required: true, number: true},
                    18: {required: true, number: true},
                    19: {required: true, number: true},
                    20: {required: true, number: true},
                    21: {required: true, number: true}
                },
                submitHandler: function(form) {
                    var data = JSON.stringify( $(form).serializeArray() );
                    //console.log( data );
                    var feesTimeId = $('#feesTimeId').val();
                    var fullJson = "{\"feesTimeId\": \"" +feesTimeId+ "\",\"fees\": " + data + "}";
                    console.log(fullJson);

                    $.ajax({
                        url: '/api/editFeesStructure',
                        type: 'POST',
                        data: fullJson,
                        dataType:'json',
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                $('#editfees').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#editfees').modal('hide');
                            }

                        }
                    });

                    return false;

                }
            });

            $("#formdeleteFees").validate({
                submitHandler: function(form) {
                    var data = JSON.stringify( $(form).serializeArray() );
                    alert(data);
                    $.ajax({
                        url: '/api/deleteFees',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);

                                $('#confirm-delete').modal('hide');
                            }
                            if (typeof response.errorMsg !== 'undefined')
                            {
                                notify('danger', response.errorMsg);
                                $('#confirm-delete').modal('hide');
                            }

                        }
                    });
                    return true;
                }
            });

        });
        function deleteDesig(i) {
            document.getElementById('feesTimeIdDel').value = i ;
        }

    </script>
@endsection




