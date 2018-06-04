@extends('layout.app')
@section('title', 'Create New Teacher Profile')
@section('content')
    <style>

    </style>
<div class="page-header card">
    <div class="card-block">
        <center><h5 class="m-b-10">Add New Employee Profile</h5></center>
        <div class="accordion-panel">
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="accordion-panel">
                <div class="accordion-heading" role="tab" id="headingOne">
                    <h1 class="card-title accordion-title">
                        <a class="accordion-msg scale_active" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-plus-square"></i> Basic Info
                        </a>
                    </h1>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="accordion-content accordion-desc">
                        <div id="Idwell" class="well" style="background-color:green; display:none;">
                            @if(session()->has('newEmployeeId'))
                                <center>
                                    <h3  id="newEmployeeId" style="color: red">New Employee Id: {{session()->get('newEmployeeId')}}</h3>
                                    <h6  style="color: red">{{'Please save your EmployeeId.It is very important for you.'}}</h6>
                                </center>
                            @endif
                        </div>
                        <form id="formEmpBasicInfo">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="name" name="name" class="form-control " placeholder="Full Name">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="birthdate" name="birthdate"  class="form-control " placeholder="Birth Date">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="designation" name="designation"  class="form-control ">
                                        <option value="">Select Designation</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="dateOfJoining" name="dateOfJoining" class="form-control " placeholder="Date of Joining">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="empolyeeType" name="empolyeeType"  class="form-control ">
                                        <option value="">Select Empolyee Type</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Officer">Officer</option>
                                        <option value="Stuff">Stuff</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="gender"  name="gender" class="form-control ">
                                        <option value="">Select Gender</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="religion" name="religion" class="form-control ">
                                        <option value="">Select Religion</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="maritalStatus" name="maritalStatus" class="form-control ">
                                        <option value="">Select Marital Status </option>
                                        <option value="Married">Married</option>
                                        <option value="Single">Single</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="nationality" name="nationality" class="form-control nationality">
                                        <option value="">Select Nationality</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="bloodgroup" name="bloodgroup" class="form-control ">
                                        <option value="">Select Blood Groop</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="email" id="email" name="email" class="form-control " placeholder="Email">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="mobile" id="mobile" name="mobile" class="form-control " placeholder="Mobile Number">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="photoIdType" name="photoIdType" class="form-control photoIdType">
                                        <option value="">Photo Id Type Type</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="photoIdNo" name="photoIdNo" class="form-control " placeholder="Photo Id Number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6>Upload Picture:</h6>
                                </div>
                                <div class="col-sm-10">
                                    <input type="file" name="photo" class="form-control " id="photo" >
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                </div>
                                <div class="col">
                                    <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-4">
                                    <button id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-panel">
                <div class="accordion-heading" role="tab" id="heading3">
                    <h3 class="card-title accordion-title">
                        <a class="accordion-msg scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            <i class="fa fa-plus-square"></i> Adress
                        </a>
                    </h3>
                </div>
                <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3" style="">
                    <div class="accordion-content accordion-desc">
                        <form id="formEmpAddress" enctype="multipart/form-data" method="POST" >
                            @include('common.address')
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="hidden" id="newEmployeeId1" name="newEmployeeId1" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3">
                                    <button id="submitAddress" class="form-control form-bg-primary">Save Address</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-panel">
                <div class="accordion-heading" role="tab" id="headingTwo">
                    <h1 class="card-title accordion-title">
                        <a class="accordion-msg scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa fa-plus-square"></i>Family  Info
                        </a>
                    </h1>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="accordion-content accordion-desc">
                        <form id="formInsertFathersInfo" enctype="multipart/form-data" method="POST" >
                            <div class="row">
                                <div class="col-sm-10">
                                    <h6 class="m-b-10"> Father's Information :</h6>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <input type="hidden" id="fnfType" name="fnfType" class="form-control" value="Father">
                                @include('common.fnf')
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3">
                                    <button id="submitFathersInfo" class="form-control form-bg-primary">Save Father's Info</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <form id="formInsertMothersInfo" enctype="multipart/form-data" method="POST" >
                            <div class="row">
                                <div class="col-sm-10">
                                    <h6 class="m-b-10"> Mother's Information :</h6>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <input type="hidden" id="fnfType" name="fnfType" class="form-control" value="Mother">
                                @include('common.fnf')
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3">
                                    <button id="submitMothersInfo" class="form-control form-bg-primary">Save Mother's Info</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <form id="formInsertEmergencyContactInfo" enctype="multipart/form-data" method="POST" >
                            <div class="row">
                                <div class="col-sm-10">
                                    <h6 class="m-b-10"> Emergency Contact Information :</h6>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <input type="hidden" id="fnfType" name="fnfType" class="form-control" value="Emergency">
                                @include('common.fnf')
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="relationship" name="relationship" class="form-control" placeholder="Relationship">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3">
                                    <button id="submitEmergencyContactInfo" class="form-control form-bg-primary">Save Emergency Contact Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-panel">
                <div class=" accordion-heading" role="tab" id="headingThree">
                    <h1 class="card-title accordion-title">
                        <a class="accordion-msg scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fa fa-plus-square"></i>Academic Summary
                        </a>
                    </h1>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="accordion-content accordion-desc">
                        <form id="formAcaSum">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <select id="levelEdu" name="levelEdu" class="form-control ">
                                        <option value="">Select Educational Level</option>
                                        <option value="jsc">J.S.C</option>
                                        <option value="ssc">S.S.C</option>
                                        <option value="hsc">H.S.C</option>
                                        <option value="bsc">B.Sc</option>
                                        <option value="bba">B.B.A</option>
                                        <option value="ba">B.A</option>
                                        <option value="bcom">B.Com</option>
                                        <option value="msc">M.Sc</option>
                                        <option value="mcom">M.Com</option>
                                        <option value="ba">B.A</option>
                                        <option value="mba">M.B.A</option>
                                        <option value="phd">P.hd</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="instituteName" name="instituteName" class="form-control " placeholder="Institute Name">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="majorSub" name="majorSub" class="form-control " placeholder="Major Subject">
                                </div>
                                <div id="divBoard" class="col-sm-12 col-xl-3 m-b-30" style="display:none">
                                    <select id="board" name="board" class="form-control ">
                                        <option value="">Select Board</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="yearOfPass" name="yearOfPass" class="form-control " placeholder="Year of passing">

                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="resultGpa" name="resultGpa" class="form-control " placeholder="Result Gpa">

                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="outOf" name="outOf" class="form-control " placeholder="Out Of">
                                </div>
                                <div class="ol-sm-12 col-xl-12 m-b-30">
                                    <input type="text" id="achivement" name="achivement" class="form-control " placeholder="Achievement">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                </div>
                                <div class="col">
                                    <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <button id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-panel">
                <div class=" accordion-heading" role="tab" id="headingFour">
                    <h3 class="card-title accordion-title">
                        <a class="accordion-msg scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <i class="fa fa-plus-square"></i>Training Summary
                        </a>
                    </h3>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="accordion-content accordion-desc">
                        <form id="formTrainigSum">
                            <div class="row">
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="trainingTitle" name="trainingTitle" class="form-control " placeholder="Training Title">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="country" name="country" class="form-control " placeholder="Country">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="topicsCover" name="topicsCover" class="form-control " placeholder="Topics Covered">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="trainigYear" name="trainigYear" class="form-control " placeholder="Trainig Year">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="institute" name="institute" class="form-control " placeholder="Institute">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="duration" name="duration" class="form-control " placeholder="Duration">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <input type="text" id="location" name="location" class="form-control " placeholder="Location">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                </div>
                                <div class="col">
                                    <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                </div>
                                <div class="col-sm-12 col-xl-3 m-b-30">
                                    <button id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@parent
<script type="text/javascript">
    loadGender();
    loadCountry();
    loadDistrict();
    loadReligion();
    loadBloodGroup();
    loadPhotoIdType();
    loadBoardNames();
    function loadDesignation() {
        $.ajax({
            url: '/api/listDesignationNames',
            type: 'POST',
            success: function (response) {
                data = response.data;
                for (i = 0; i < data.length; i++) {
                    $('#designation').append($('<option>', {
                        value: data[i].designationName,
                        text: data[i].designationName
                    }));
                }
            }
        });
    }
    if($("chkSameAddress").prop('checked') == true){

    }

    $("#chkSameAddress").on("click", function(){
        check = $("#chkSameAddress").is(":checked");
        if(check) {
            $("#checkboxchecked").hide();
        } else {
            $("#checkboxchecked").show();
        }
    });
    $( "#levelEdu" ).change(function () {
        var str=$("#levelEdu").val();
           if(str=='jsc'||str=='ssc'||str=='hsc'){
               $("#divBoard").show();
           }
           else{
               $("#divBoard").hide();
           }
    })
    $(document).ready(function (){
        loadDesignation();

        $("#formEmpBasicInfo").validate({
            ignore: ":hidden",
            rules: {
                designation: "required",
                dateOfJoining: "required",
                empolyeeType: "required",
                religion: "required",
                nationality: "required",
                bloodgroup: "required",
                mobile: "required",
                photoIdNo: "required",
                name: "required",
                birthDate: "required",
                gender: "required",
                photoIdType: "required",
                photo: "required",
                maritalStatus: "required",
                email: {
                    email: true,
                    //required: true
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/saveEmployeeInfo',
                    type: 'POST',
                    data: new FormData($("#formEmpBasicInfo")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                   success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            $("#Idwell").css("display", "block");
                            $('#newEmployeeId1').val(response.newEmployeeId);
                            notify('success', response.successMsg);
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                        }

                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
        $("#formEmpAddress").validate({
            ignore: ":hidden",
            rules: {
            },
            messages: {

            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/saveEmpAddress',
                    type: 'POST',
                    data: new FormData($("#formEmpAddress")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                        }
                        if (typeof response.errorMsg !== 'undefined')
                        {
                            notify('danger', response.errorMsg);
                        }

                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
        $("#formInsertFathersInfo").validate({
            //ignore: ":hidden",
            rules: {
                Name: "required"
            },
            messages: {

            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/saveEmpFnfInfo',
                    type: 'POST',
                    data: new FormData($("#formInsertFathersInfo")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        //data = response.data;
                        //alert(response.successMsg);
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
                return false; // required to block normal submit since you used ajax
            }
        });
        $("#formInsertMothersInfo").validate({
            //ignore: ":hidden",
            rules: {
                Name: "required"
            },
            messages: {

            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/saveEmpFnfInfo',
                    type: 'POST',
                    data: new FormData($("#formInsertMothersInfo")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        //data = response.data;
                        //alert(response.successMsg);
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
                return false; // required to block normal submit since you used ajax
            }
        });
        $("#formInsertEmergencyContactInfo").validate({
            //ignore: ":hidden",
            rules: {
                Name: "required"
            },
            messages: {

            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/saveEmpFnfInfo',
                    type: 'POST',
                    data: new FormData($("#formInsertEmergencyContactInfo")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        //data = response.data;
                        //alert(response.successMsg);
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
                return false; // required to block normal submit since you used ajax
            }
        });


        $("#formAcaSum").validate({
            //ignore: ":hidden",
            rules: {
                levelEdu: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/saveEmpAcaSum',
                    type: 'POST',
                    data: new FormData($("#formAcaSum")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        //data = response.data;
                        //alert(response.successMsg);
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
                return false; // required to block normal submit since you used ajax
            }
        });
        $("#formTrainigSum").validate({
            //ignore: ":hidden",
            rules: {
                trainingTitle: "required",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/saveEmpTrainSum',
                    type: 'POST',
                    data: new FormData($("#formTrainigSum")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        //data = response.data;
                        //alert(response.successMsg);
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
                return false; // required to block normal submit since you used ajax
            }
        });

    });

</script>
@endsection
