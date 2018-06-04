@extends('layout.app')
@section('title', 'Create New Student Profile')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
                <h4 class="m-b-10">Create New Student Profile:</h4>
					@if(session()->has('newStudentId'))
						<h6  id="newStudentId" style="color: red">New Student Id: {{session()->get('newStudentId')}}</h6>
					@else
						<h6  id="newStudentId" style="color: red"></h6>
					@endif

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
			<div class="card-block">
				{{--Messages--}}
				<div id="successMsg" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled text-white"></i>
					</button>
				</div>
				<div id="errorMsg" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled text-white"></i>
					</button>
				</div>
                <div class="card-block accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingOne">
                                <h3 class="card-title accordion-title">
                                    <a class="accordion-msg scale_active" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-plus-square"></i> 1. Basic Info
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne" style="">
                                <div class="accordion-content accordion-desc">
                                    <form id="formStdBasicInfo" enctype="multipart/form-data" method="POST" >
                                        <div class="row">
                                            @include('common.studentClassInfo')
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="regNo" name="regNo" class="form-control" placeholder="Registration Number">
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="rollNo" name="rollNo" class="form-control" placeholder="Roll Number" >
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" >
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="birthdate" name="birthdate" class="form-control" placeholder="Birth Date">
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="gender" name="gender" name="gender" class="form-control">
                                                    <option value="">Select Gender</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="religion" name="religion" class="form-control">
                                                    <option value="">Select Religion</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="nationality" name="nationality" class="form-control nationality">
                                                    <option value="">Select Nationality</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="" id="birthregnum" name="birthregnum" class="form-control" placeholder="Birth Registration No">
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="bloodgroup" name="bloodgroup" class="form-control">
                                                    <option value="">Select Blood Groop</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number">
                                            </div>
                                            <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xl-2 m-b-30">
                                                <h6>Upload Student Picture:</h6>
                                            </div>
                                            <div class="col-sm-12 col-xl-10 m-b-30">
                                                <input type="file" name="stdPhoto" class="form-control">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" id="addressType" class="form-control" placeholder="col">
                                            </div>
                                            <div class="col">
                                                <input type="hidden" id="studentId" class="form-control" placeholder="col">
                                            </div>
                                            <div class="col">
                                                <input type="hidden" id="studentId" class="form-control" placeholder="col">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="submit" id="submitBasicInfo" class="form-control form-bg-primary" value="Save Basic Info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingTwo">
                                <h3 class="card-title accordion-title">
                                    <a class="accordion-msg scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-plus-square"></i> 2. Adress
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" style="">
                                <div class="accordion-content accordion-desc">
                                    <form id="formStdAddress" enctype="multipart/form-data" method="POST" >
                                        @include('common.address')
                                        <div class="row">
                                            <div class="col-sm-3"></div>
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
                            <div class=" accordion-heading" role="tab" id="headingThree">
                                <h3 class="card-title accordion-title">
                                    <a class="accordion-msg scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-plus-square"></i> 3. Family  Info
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="accordion-content accordion-desc">
                                    <br>
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
                            <div class="accordion-heading" role="tab" id="headingFour">
                                <h3 class="card-title accordion-title">
                                    <a class="accordion-msg scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fa fa-plus-square"></i> 4. Previous Study Info
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="accordion-content accordion-desc">
                                    <form id="formPrevStudyInfo" enctype="multipart/form-data" method="POST" >
                                        <div class="row">
                                            <input type="hidden" id="fnfType" name="fnfType" class="form-control" value="Emergency">
                                            @include('common.previousStudyInfo')
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3">
                                                <button id="submitPrevStudyInfo" class="form-control form-bg-primary">Save Previous Study Info</button>
                                            </div>
                                        </div>
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

@endsection

@section('footer')
	@parent
	<script type="text/javascript">
        loadGender();
        loadCountry();
        loadDistrict();
        //loadUpazilla();
        //loadPostoffice();
        loadReligion();
        loadBloodGroup();
        loadPhotoIdType();
        loadBoardNames();
        //loadFnfType();
        $(document).ready(function (){
            $("#formStdBasicInfo").validate({
                ignore: ":hidden",
                rules: {
                    session: "required",
                    medium: "required",
                    version: "required",
                    shift: "required",
                    class: "required",
                    section: "required",
                    group: "required",
                    rollNo: "required",
                    name: "required",
                    birthDate: "required",
                    gender: "required",
                    email: {
                        email: true,
                        //required: true
                    }
                },
                messages: {
                    session: "Please select academic session",
                    medium: "Please select medium",
                    version: "Please select version",
                    shift: "Please select shift",
                    class: "Please select class",
                    section: "Please select section",
                    group: "Please select group",
                    rollNo: "Please enter roll no",
                    name: "Please enter full name",
                    birthDate: "Please enter birth date",
                    gender: "Please select gender",
                    email: "Please enter a valid email address"
                },
                submitHandler: function(form) {
                    var selectedSession = $('#acaSession').find(":selected").val();
                    var selectedGroup = $('#group').find(":selected").val();
                    var selectedStudentType = $('#studentType').find(":selected").val();
                    var selectedRollNo = $('#rollNo').val();
                    var selectedRegNo = $('#regNo').val();
                    var selectedName = $('#name').val();
                    var selectedBirthdate = $('#birthdate').val();
                    var selectedGender = $('#gender').find(":selected").val();
                    var selectedReligion = $('#religion').find(":selected").val();
                    var selectedNationality = $('#nationality').find(":selected").val();
                    var selectedBirthRegNum = $('#birthregnum').val();
                    var selectedBloodGroup = $('#bloodgroup').find(":selected").val();
                    var selectedMobile = $('#mobile').val();
                    var selectedEmail = $('#email').val();

                    // var myform = document.getElementById("formStdBasicInfo");
                    // var formData = new FormData(myform );
                    $.ajax({
                        url: '/api/saveClassInfo',
                        type: 'POST',
                        data: new FormData($("#formStdBasicInfo")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        //data: $(form).serialize(),
                        // data:{selectedSession: selectedSession, selectedGroup: selectedGroup,  selectedStudentType: selectedStudentType, selectedRollNo: selectedRollNo, selectedRegNo: selectedRegNo, selectedName: selectedName, selectedBirthdate: selectedBirthdate, selectedGender: selectedGender,
                        //     selectedReligion: selectedReligion, selectedNationality: selectedNationality, selectedBirthRegNum: selectedBirthRegNum, selectedBloodGroup: selectedBloodGroup, selectedMobile: selectedMobile, selectedEmail: selectedEmail},
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
            $("#formStdAddress").validate({
                ignore: ":hidden",
                rules: {
                },
                messages: {

                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/saveStdAddress',
                        type: 'POST',
                        data: new FormData($("#formStdAddress")[0]),
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
            $("#formInsertFathersInfo").validate({
                //ignore: ":hidden",
                rules: {
                    Name: "required"
                },
                messages: {

                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/saveFnfInfo',
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
                        url: '/api/saveFnfInfo',
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
                        url: '/api/saveFnfInfo',
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

            $("#formPrevStudyInfo").validate({
                //ignore: ":hidden",
                rules: {
                    exam: "required",
                    resultSummary: "required",
                },
                messages: {
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/savePrevStudyInfo',
                        type: 'POST',
                        data: new FormData($("#formPrevStudyInfo")[0]),
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

