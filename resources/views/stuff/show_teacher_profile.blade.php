@extends('layout.app')
@section('title', 'Show Teacher Profile')
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
                <h4>Select Your Estimate Stuff Profile</h4><hr>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <input type="text" id="employeeCode" name="employeeCode" class="form-control" placeholder="Employee Code">
                    </div>
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-sm-12 col-xl-3 m-b-30">
                        <select name="select" class="form-control">
                            <option value="opt1">Select Department</option>
                            <option value="opt2">Type 2</option>
                        </select>
                    </div>
                </div>
                <hr><center><h4>Stuff Profile </h4></center><hr>
                <div class="dt-responsive table-responsive">
                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="animation-model">
                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#student-detail1" data-toggle="tooltip" data-placement="top" title="User">
                                        <i class="fa fa-user" data-toggle="tooltip" data-placement="left"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Download">
                                        <i class="fa fa-cloud-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#student-detail" data-toggle="tooltip" data-placement="top" title="Details">
                                        <i class="fa fa-user" data-toggle="tooltip" data-placement="left"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="modal" data-target="#student-update" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip" data-placement="left" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>

                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="student-detail1" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Teacher Dailts Information</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p>This is a modal window. You can do the following things with it:</p>
                                        <ul>
                                            <li><strong>Read:</strong> modal windows will on't forget to read what they say.</li>
                                            <li><strong>Look:</strong> a modal window  just look at it and appreciate its presence.</li>
                                            <li><strong>Close:</strong> clic below to close the modal.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary waves-effect waves-light ">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="student-update" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Teacher Dailts Information</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="accordion-panel">
                                            <div class="accordion-heading" role="tab" id="headingTwo">
                                                <h1 class="card-title accordion-title">
                                                    <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collbasicInfo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <i class="fa fa-plus-square"></i> Basic Info
                                                    </a>
                                                </h1>
                                            </div>
                                            <div id="collbasicInfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="accordion-content accordion-desc">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="name" name="name" class="form-control " placeholder="Full Name">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="birthdate" name="birthdate"  class="form-control " placeholder="Birth Date">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="designation" name="designation" class="form-control " placeholder="Designation">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="dateOfJoining" name="dateOfJoining" class="form-control " placeholder="Date of Joining">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="empolyeeType" name="empolyeeType" name="gender" class="form-control ">
                                                                <option value="">Select Empolyee Type</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="department" name="department" class="form-control ">
                                                                <option value="">Select Department</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="gender" name="section" name="gender" class="form-control ">
                                                                <option value="">Select Gender</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="religion" name="religion" class="form-control ">
                                                                <option value="">Select Religion</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="nationality" name="nationality" class="form-control ">
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
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="photoIdType" name="photoIdType" class="form-control ">
                                                                <option value="">Photo Id Type Type</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="photoIdNo" name="photoIdNo" class="form-control " placeholder="Photo Id Number">
                                                        </div>
                                                        <div class="col">
                                                            <div class="checkbox-fade fade-in-primary">

                                                                <label style="display:inline;">
                                                                    <input type="checkbox" id="addcheck" name="addcheck" value="">
                                                                    <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                                    <span>  Is Teacher</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <input type="hidden" id="employeeCode" name="employeeCode" class="form-control " placeholder="col">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6>Upload Teacher Picture:</h6>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="file" name="photo_std[]" class="form-control " id="filer_input1" >
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h5 class="m-b-10"> Present Address :</h5>
                                                        </div>
                                                    </div><hr>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="countrypre" name="countrypre" class="form-control " placeholder="Country">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="statepre" name="statepre" class="form-control " placeholder="State">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="citypre" name="citypre" class="form-control " placeholder="City">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="divisionpre" name="divisionpre" class="form-control ">
                                                                <option value="">Select Division</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="districtpre" name="districtpre" class="form-control ">
                                                                <option value="">Select District</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="upazillapre" name="upazillapre" class="form-control ">
                                                                <option value="">Select Upazilla</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="thanapre" name="thanapre" class="form-control ">
                                                                <option value="">Select Thana</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="postofficepre" name="postofficepre" class="form-control ">
                                                                <option value="">Select Postoffice</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="postcodepre" name="postcodepre" class="form-control ">
                                                                <option value="">Select Postcode</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12" >
                                                            <h5 class="m-b-10" style="display:inline;"> Permanent Address :</h5>
                                                            &nbsp;&nbsp;
                                                            <div class="checkbox-fade fade-in-primary">

                                                                <label style="display:inline;">
                                                                    <input type="checkbox" id="addcheck" name="addcheck" value="">
                                                                    <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                                                    <span>  Same as Present</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="countryper" name="countryper" class="form-control " placeholder="Country">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="stateper" name="stateper" class="form-control " placeholder="State">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="cityper" name="cityper" class="form-control " placeholder="City">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="divisionper" name="divisionper" class="form-control ">
                                                                <option value="">Select Division</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="districtper" name="districtper" class="form-control ">
                                                                <option value="">Select District</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="upazillaper" name="upazillaper" class="form-control ">
                                                                <option value="">Select Upazilla</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="thanaper" name="thanaper" class="form-control ">
                                                                <option value="">Select Thana</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="postofficeper" name="postofficeper" class="form-control ">
                                                                <option value="">Select Postoffice</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="postcodeper" name="postcodeper" class="form-control ">
                                                                <option value="">Select Postcode</option>
                                                            </select>
                                                        </div>
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-panel">
                                            <div class="accordion-heading" role="tab" id="headingTwo">
                                                <h3 class="card-title accordion-title">
                                                    <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#familyinfo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <i class="fa fa-plus-square"></i>Family  Info
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="familyinfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="accordion-content accordion-desc">
                                                    <div class="col-sm-12">
                                                        <center><h5 class="m-b-10"> Father's Info</h5></center>	<hr>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fName" name="fName" class="form-control " placeholder="Name">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fMobile" name="fMobile" class="form-control " placeholder="Mobile Number">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="email" id="fEmail" name="fEmail" class="form-control " placeholder="Email">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fOccupation" name="fOccupation" class="form-control " placeholder="Occupation">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fOccupationAdd" name="fOccupationAdd" class="form-control " placeholder="Occupational Address">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fYearlyIncome" name="fYearlyIncome" class="form-control " placeholder="Yearly Income">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fPhotoIdType" name="fPhotoIdType" class="form-control " placeholder="Photo Id Type">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fPhotoIdNo" name="fPhotoIdNo" class="form-control " placeholder="Photo Id Number">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fnationality" name="fnationality" class="form-control " placeholder="Nationality">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="fResAdd" name="fResAdd" class="form-control " placeholder="Residential Address">

                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <h6>Upload Father Picture</h6>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="photo_std[]" class="form-control " id="filer_input1" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <hr><center><h5 class="m-b-10"> Mother's Info</h5></center>	<hr>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mName" name="mName" class="form-control " placeholder="Name">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mMobile" name="mMobile" class="form-control " placeholder="Mobile Number">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="email" id="mEmail" name="mEmail" class="form-control " placeholder="Email">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mOccupation" name="mOccupation" class="form-control " placeholder="Occupation">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mOccupationAdd" name="mOccupationAdd" class="form-control " placeholder="Occupational Address">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mYearlyIncome" name="mYearlyIncome" class="form-control " placeholder="Yearly Income">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mPhotoIdType" name="mPhotoIdType" class="form-control " placeholder="Photo Id Type">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mPhotoIdNo" name="mPhotoIdNo" class="form-control " placeholder="Photo Id Number">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mnationality" name="mnationality" class="form-control " placeholder="Nationality">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="mResAdd" name="mResAdd" class="form-control " placeholder="Residential Address">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <h6>Upload Mother Picture:</h6>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="photo_std[]" class="form-control " id="filer_input1" >
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="maritual" name="maritual" class="form-control ">
                                                                <option value="">Select Maritual Status</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gName" name="gName" class="form-control " placeholder="Name">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gMobile" name="gMobile" class="form-control " placeholder="Mobile Number">

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="email" id="gEmail" name="gEmail" class="form-control " placeholder="Email">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gOccupation" name="gOccupation" class="form-control " placeholder="Occupation">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gOccupationAdd" name="gOccupationAdd" class="form-control " placeholder="Occupational Address">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gRelation" name="gRelation" class="form-control " placeholder="Relationship">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gPhotoIdType" name="gPhotoIdType" class="form-control " placeholder="Photo Id Type">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gPhotoIdNo" name="gPhotoIdNo" class="form-control " placeholder="Photo Id Number">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gnationality" name="gnationality" class="form-control " placeholder="Nationality">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="gResAdd" name="gResAdd" class="form-control " placeholder="Residential Address">

                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <hr><center><h5 class="m-b-10"> Imergency Contact Person</h5></center>	<hr>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imName" name="imName" class="form-control " placeholder="Name">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imMobile" name="imMobile" class="form-control " placeholder="Mobile Number">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="email" id="imEmail" name="imEmail" class="form-control " placeholder="Email">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imOccupation" name="imOccupation" class="form-control " placeholder="Occupation">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imOccupationAdd" name="imOccupationAdd" class="form-control " placeholder="Occupational Address">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imRelation" name="imRelation" class="form-control " placeholder="Relationship">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imPhotoIdType" name="imPhotoIdType" class="form-control " placeholder="Photo Id Type">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imPhotoIdNo" name="imPhotoIdNo" class="form-control " placeholder="Photo Id Number">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imnationality" name="imnationality" class="form-control " placeholder="Nationality">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="imResAdd" name="imResAdd" class="form-control " placeholder="Residential Address">

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
                                                            <button id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-panel">
                                            <div class="accordion-heading" role="tab" id="headingOne">
                                                <h3 class="card-title accordion-title">
                                                    <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="fa fa-plus-square"></i>Academic Summary
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="accordion-content accordion-desc">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="levelEdu" name="levelEdu" class="form-control ">
                                                                <option value="">Select Educational Level</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="examDegree" name="examDegree" class="form-control ">
                                                                <option value="">Select Exam degree</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="instituteName" name="instituteName" class="form-control " placeholder="Institute Name">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="instuteAddress" name="instuteAddress" class="form-control " placeholder="Institute Address">

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="session" name="session" class="form-control " placeholder="Roll Number">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="exam" name="exam" class="form-control " placeholder="Registration Address">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="session" name="session" class="form-control " placeholder="Session">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="examYear" name="examYear" class="form-control " placeholder="Exam Year">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="resultGpa" name="resultGpa" class="form-control " placeholder="Result Gpa">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="outOf" name="outOf" class="form-control " placeholder="Out Of">

                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="stdboard" name="stdboard" class="form-control ">
                                                                <option value="">Select Board</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="yearOfPass" name="yearOfPass" class="form-control " placeholder="Year of passing">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="text" id="achivement" name="achivement" class="form-control " placeholder="Achievement">
                                                        </div>
                                                        <div class="col">
                                                            <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                                        </div>
                                                        <div class="col">
                                                            <input type="hidden" id="studentId" class="form-control " placeholder="col">
                                                        </div><br>
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

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-panel">
                                            <div class="accordion-heading" role="tab" id="headingTwo">
                                                <h3 class="card-title accordion-title">
                                                    <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <i class="fa fa-plus-square"></i>Training Summary
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="accordion-content accordion-desc">
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
                                                            <select id="trainigYear" name="trainigYear" class="form-control ">
                                                                <option value="">Training year</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-panel">
                                            <div class=" accordion-heading" role="tab" id="headingThree">
                                                <h3 class="card-title accordion-title">
                                                    <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="fa fa-plus-square"></i>Professional Training Summary
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="accordion-content accordion-desc">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="protrainingTitle" name="protrainingTitle" class="form-control " placeholder="Training Title">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="procountry" name="procountry" class="form-control " placeholder="Country">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="protopicsCover" name="protopicsCover" class="form-control " placeholder="Topics Covered">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <select id="protrainigYear" name="protrainigYear" class="form-control ">
                                                                <option value="">Training year</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="proinstitute" name="proinstitute" class="form-control " placeholder="Institute">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="produration" name="produration" class="form-control " placeholder="Duration">
                                                        </div>
                                                        <div class="col-sm-12 col-xl-3 m-b-30">
                                                            <input type="text" id="prolocation" name="prolocation" class="form-control " placeholder="Location">
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
                                                </div>
                                            </div>
                                        </div><hr>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
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