@extends('layout.app')
@section('title', 'Applicant Profile')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-10">Add New Applicant Profile:</h4><hr>
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
                    @if(isset($data['successMessege']))
                        <center><h4 style="color:green;">{{ $data['successMessege'] }}</h4></center>
                    @endif
                    <div class="row" id="divPdf" style="display:none">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button  id="pdfMakeId" name="pdfMakeId" value="1002" class="form-control form-bg-primary"><a href="{{ route('htmltopdf',['download'=>'pdf']) }}">Download Your Profile</a></button>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <form id="formStdBasicInfo" enctype="multipart/form-data" method="POST" >
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="m-b-12"> Basic Information :</h6><hr>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            @include('common.studentClassInfo')
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
                                <select id="bloodgroup" name="bloodgroup" class="form-control">
                                    <option value="">Select Blood Groop</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-2 m-b-30">
                                <h6>Upload Student Picture:</h6>
                            </div>
                            <div class="col-sm-12 col-xl-10 m-b-30">
                                <input type="file" name="stdPhoto" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-2 m-b-30">
                                <h6>Present Address:</h6>
                            </div>
                            <div class="col-sm-12 col-xl-10 m-b-30">
                                <textarea  class="form-control" rows="3" id="presentAdd" name="presentAdd" placeholder="Present Address" required></textarea>
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-2 m-b-30">
                                <h6>Parmanent Address:</h6>
                            </div>
                            <div class="col-sm-12 col-xl-10 m-b-30">
                                <textarea  class="form-control" rows="3" id="parmanentAdd" name="parmanentAdd" placeholder="Parmanent Address" required></textarea>
                                <span class="messages"></span>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-10">
                                <h6 class="m-b-10"> Gurdian's Information :</h6>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="Name" name="Name" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="Mobile" name="Mobile" class="form-control" placeholder="Mobile Number">
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="email" id="Email" name="Email" class="form-control"  placeholder="Email">
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="Occupation" name="Occupation" class="form-control" placeholder="Occupation">
                            </div>
                            <div class="col-sm-12 col-xl-3 m-b-30">
                                <input type="text" id="YearlyIncome" name="YearlyIncome" class="form-control" placeholder="Yearly Income">
                            </div>
                            <div class="col-sm-12 col-xl-9 m-b-30">
                                <textarea  class="form-control" rows="1" id="gurdianAddress" name="gurdianAddress" placeholder="Gurdian's Address" required></textarea>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="m-b-12">Previous Study Info:</h6><hr>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <input type="hidden" id="fnfType" name="fnfType" class="form-control" value="Emergency">
                            @include('common.previousStudyInfo')
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <button id="submitPrevStudyInfo" class="form-control form-bg-primary">Save Applicant Info</button>
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
    <script type="text/javascript">
        $( '#idsection' ).hide();
        $( '#acaSession1' ).hide();
        loadGender();
        loadCountry();
        loadDistrict();
        loadReligion();
        loadBloodGroup();
        loadBoardNames();
        $(document).ready(function (){
            $("#formStdBasicInfo").validate({
                ignore: ":hidden",
                rules: {
                    acaSession: "required",
                    medium: "required",
                    version: "required",
                    shift: "required",
                    class: "required",
                    group: "required",
                    name: "required",
                    birthDate: "required",
                    gender: "required",
                    religion: "required",
                    nationality: "required",
                    bloodgroup: "required",
                    mobile: "required",
                    stdPhoto: "required",
                    presentAdd: "required",
                    parmanentAdd: "required",
                    Name: "required",
                    Mobile: "required",
                    Occupation: "required",
                    YearlyIncome: "required",
                    gurdianAddress: "required",
                },
                messages: {
                    session: "Please select academic session",
                    medium: "Please select medium",
                    version: "Please select version",
                    shift: "Please select shift",
                    class: "Please select class",
                    group: "Please select group",
                    name: "Please enter full name",
                    birthDate: "Please enter birth date",
                    gender: "Please select gender",
                    email: "Please enter a valid email address"
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/saveAdmissionAppInfo',
                        type: 'POST',
                        data: new FormData($("#formStdBasicInfo")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                      success: function (response) {
                          data = response.data;
                            if (typeof data.successMsg !== 'undefined')
                            {
                                notify('success', data.successMsg);
                                $("#divPdf").css("display", "block");
                                delete data.successMsg;
                                console.log(data);
                                $( "#pdfMakeId" ).val(data[0]['registrationNo']);
                            }
                            if (typeof data.errorMsg !== 'undefined')
                            {
                                notify('danger', data.errorMsg);
                            }

                        }
                    });
                    return false;
                }
            });

        });

    </script>
@endsection

