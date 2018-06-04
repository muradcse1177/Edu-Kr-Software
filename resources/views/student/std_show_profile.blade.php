@extends('layout.app')
@section('title', 'Show Student Profile')
@section('content')
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header">
            <h4 class="m-b-10">Show Student Profile</h4>
            <div class="card-header-right">
               <ul class="list-unstyled card-option">
                  <li><i class="fa fa-chevron-left"></i></li>
                  <li><i class="fa fa-window-maximize full-card"></i></li>
                  <li><i class="fa fa-minus minimize-card"></i></li>
                  <li><i class="fa fa-refresh reload-card"></i></li>
                  <li><i class="fa fa-times close-card"></i></li>
               </ul>
            </div>
            <hr/>
         </div>
         <div class="card-block">
            <form id="formStdShowInfo"  method="POST" >
               <div class="row">

                  @include('common.studentClassInfo')

                  <div class="col-sm-12 col-xl-3 m-b-30">
                     <input type="text" id="studentId" name="studentId" class="form-control " placeholder="Student Id">
                  </div>
                  <div class="col-sm-12 col-xl-3 m-b-30">
                     <input type="text" id="name" name="name" class="form-control " placeholder="Student Name...">
                  </div>
                  <div class="col-sm-12 col-xl-3 m-b-30">
                     <input type="submit" id="searchStdInfo" class="form-control form-bg-primary" value="Search">
                  </div>
               </div>
            </form>
         </div>
         <div class="card-block">
            <div class="dt-responsive table-responsive">
               <div class="dt-responsive table-responsive" id="tableDiv">
               </div>
               <div class="modal fade" id="student-detail1" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Students Dailts Information</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <h3>User Information</h3>
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
                           <h4 class="modal-title">Update Students Dailts Information</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                              <div class="accordion-panel">
                                 <div class="accordion-heading" role="tab" id="headingTwo">
                                    <h1 class="card-title accordion-title">
                                       <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#classinfo" aria-expanded="false" aria-controls="collapseTwo">
                                          <i class="fa fa-plus-square"></i> 1. Basic Info
                                       </a>
                                    </h1>
                                 </div>
                                 <div id="classinfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="accordion-content accordion-desc">
                                       <form id="stdBasicInfo">
                                          <div class="row">
                                          </div>
                                          <div class="row">
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="regNo" name="regNo" class="form-control" placeholder="Registration Number">
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="rollNo" name="rollNo" class="form-control" placeholder="Roll Number" >
                                                <input type="hidden" id="classid" name="classid" class="form-control">
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" >
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="birthdate" name="birthdate" class="form-control" placeholder="Birth Date">
                                             </div>
                                          </div>
                                          <div class="row">
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
                                                <select id="nationality" name="nationality" class="form-control">
                                                   <option value="">Select Nationality</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="" id="birthregnum" name="birthregnum" class="form-control" placeholder="Birth Registration No">
                                             </div>
                                          </div>
                                          <div class="row">
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
                                             <div class="col-sm-2">
                                                <h6>Upload Student Picture:</h6>
                                             </div>
                                             <div class="col-sm-10">
                                                <input type="file" name="photo_std[]" class="form-control" id="filer_input1" >
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
                                 <div class="accordion-panel">
                                    <div class="accordion-heading" role="tab" id="headingTwo">
                                       <h1 class="card-title accordion-title">
                                          <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#basicInfo" aria-expanded="false" aria-controls="collapseTwo">
                                             <i class="fa fa-plus-square"></i> 2. Address Info
                                          </a>
                                       </h1>
                                    </div>
                                    <div id="basicInfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                       <div class="accordion-content accordion-desc">
                                          <div class="row">
                                             <div class="col-sm-10">
                                                <h5 class="m-b-10"> Present Address :</h5>
                                             </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="countrypre" name="countrypre" class="form-control">
                                                   <option value="">Select Country</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="statepre" name="statepre" class="form-control" placeholder="State">
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="citypre" name="citypre" class="form-control" placeholder="City">
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="divisionpre" name="divisionpre" class="form-control">
                                                   <option value="">Select Division</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="districtpre" name="districtpre" class="form-control">
                                                   <option value="">Select District</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="upazillapre" name="upazillapre" class="form-control">
                                                   <option value="">Select Upazilla</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="thanapre" name="thanapre" class="form-control">
                                                   <option value="">Select Thana</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="postofficepre" name="postofficepre" class="form-control">
                                                   <option value="">Select Postoffice</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="postcodepre" name="postcodepre" class="form-control">
                                                   <option value="">Select Postcode</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="col-sm-12">
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
                                          <hr>
                                          <div class="row">
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="countryper" name="countryper" class="form-control">
                                                   <option value="">Select Country</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="stateper" name="stateper" class="form-control" placeholder="State">
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <input type="text" id="cityper" name="cityper" class="form-control" placeholder="City">
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="divisionper" name="divisionper" class="form-control">
                                                   <option value="">Select Division</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="districtper" name="districtper" class="form-control">
                                                   <option value="">Select District</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="upazillaper" name="upazillaper" class="form-control">
                                                   <option value="">Select Upazilla</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="thanaper" name="thanaper" class="form-control">
                                                   <option value="">Select Thana</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="postofficeper" name="postofficeper" class="form-control">
                                                   <option value="">Select Postoffice</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-sm-12 col-xl-3 m-b-30">
                                                <select id="postcodeper" name="postcodeper" class="form-control">
                                                   <option value="">Select Postcode</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col">
                                                <input type="hidden" id="addressType" class="form-control" placeholder="col">
                                             </div>
                                             <div class="col">
                                                <input type="hidden" id="studentId" class="form-control" placeholder="col">
                                             </div>
                                             <div class="col-sm-4">
                                                <button id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-panel">
                                 <div class="accordion-heading" role="tab" id="headingTwo">
                                    <h3 class="card-title accordion-title">
                                       <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#familyinfo" aria-expanded="false" aria-controls="collapseTwo">
                                          <i class="fa fa-plus-square"></i> 3. Family  Info
                                       </a>
                                    </h3>
                                 </div>
                                 <div id="familyinfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="accordion-content accordion-desc">
                                       <div class="col-sm-12">
                                          <center>
                                             <h5 class="m-b-10"> Father's Info</h5>
                                          </center>
                                          <hr>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fName" name="fName" class="form-control" placeholder="Name">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fMobile" name="fMobile" class="form-control" placeholder="Mobile Number">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="email" id="fEmail" name="fEmail" class="form-control"  placeholder="Email">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fOccupation" name="fOccupation" class="form-control" placeholder="Occupation">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fOccupationAdd" name="fOccupationAdd" class="form-control" placeholder="Occupational Address">
                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fYearlyIncome" name="fYearlyIncome" class="form-control" placeholder="Yearly Income">
                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fPhotoIdType" name="fPhotoIdType" class="form-control" placeholder="Photo Id Type">
                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fPhotoIdNo" name="fPhotoIdNo" class="form-control" placeholder="Photo Id Number">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fnationality" name="fnationality" class="form-control" placeholder="Nationality">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="fResAdd" name="fResAdd" class="form-control" placeholder="Residential Address">

                                          </div>

                                       </div>
                                       <div class="row">
                                          <div class="col-sm-2">
                                             <h6>Upload Father Picture:</h6>
                                          </div>
                                          <div class="col-sm-10">
                                             <input type="file" name="photo_std[]" class="form-control" id="filer_input1" >
                                          </div>
                                       </div><br>
                                       <div class="col-sm-12">
                                          <hr>
                                          <center>
                                             <h5 class="m-b-10"> Mother's Info</h5>
                                          </center>
                                          <hr>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mName" name="mName" class="form-control" placeholder="Name">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mMobile" name="mMobile" class="form-control" placeholder="Mobile Number">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="email" id="mEmail" name="mEmail" class="form-control" placeholder="Email">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mOccupation" name="mOccupation" class="form-control" placeholder="Occupation">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mOccupationAdd" name="mOccupationAdd" class="form-control" placeholder="Occupational Address">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mYearlyIncome" name="mYearlyIncome" class="form-control" placeholder="Yearly Income">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mPhotoIdType" name="mPhotoIdType" class="form-control" placeholder="Photo Id Type">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mPhotoIdNo" name="mPhotoIdNo" class="form-control" placeholder="Photo Id Number">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mnationality" name="mnationality" class="form-control" placeholder="Nationality">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="mResAdd" name="mResAdd" class="form-control" placeholder="Residential Address">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-2">
                                             <h6>Upload Mother Picture:</h6>
                                          </div>
                                          <div class="col-sm-10">
                                             <input type="file" name="photo_std[]" class="form-control" id="filer_input1" >
                                          </div>
                                       </div><br>
                                       <div class="col-sm-12">
                                          <hr>
                                          <center>
                                             <h5 class="m-b-10"> Gurdian's Info</h5>
                                          </center>
                                          <hr>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gName" name="gName" class="form-control" placeholder="Name">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gMobile" name="gMobile" class="form-control" placeholder="Mobile Number">

                                          </div>
                                       </div>

                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="email" id="gEmail" name="gEmail" class="form-control" placeholder="Email">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gOccupation" name="gOccupation" class="form-control" placeholder="Occupation">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gOccupationAdd" name="gOccupationAdd" class="form-control" placeholder="Occupational Address">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gRelation" name="gRelation" class="form-control" placeholder="Relationship">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gPhotoIdType" name="gPhotoIdType" class="form-control" placeholder="Photo Id Type">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gPhotoIdNo" name="gPhotoIdNo" class="form-control" placeholder="Photo Id Number">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gnationality" name="gnationality" class="form-control" placeholder="Nationality">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="gResAdd" name="gResAdd" class="form-control" placeholder="Residential Address">

                                          </div>
                                       </div>

                                       <div class="col-sm-12">
                                          <hr>
                                          <center>
                                             <h5 class="m-b-10"> Imergency Contact Person</h5>
                                          </center>
                                          <hr>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imName" name="imName" class="form-control" placeholder="Name">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imMobile" name="imMobile" class="form-control" placeholder="Mobile Number">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="email" id="imEmail" name="imEmail" class="form-control" placeholder="Email">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imOccupation" name="imOccupation" class="form-control" placeholder="Occupation">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imOccupationAdd" name="imOccupationAdd" class="form-control" placeholder="Occupational Address">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imRelation" name="imRelation" class="form-control" placeholder="Relationship">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imPhotoIdType" name="imPhotoIdType" class="form-control" placeholder="Photo Id Type">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imPhotoIdNo" name="imPhotoIdNo" class="form-control" placeholder="Photo Id Number">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imnationality" name="imnationality" class="form-control" placeholder="Nationality">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="imResAdd" name="imResAdd" class="form-control" placeholder="Residential Address">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col">
                                             <input type="hidden" id="addressType" class="form-control" placeholder="col">
                                          </div>
                                          <div class="col">
                                             <input type="hidden" id="studentId" class="form-control" placeholder="col">
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
                                          <i class="fa fa-plus-square"></i> 4. Previous Study Info
                                       </a>
                                    </h3>
                                 </div>
                                 <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="accordion-content accordion-desc">
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <select id="stdboard" name="stdboard" class="form-control">
                                                <option value="">Select Board</option>
                                             </select>
                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="institute" name="institute" class="form-control" placeholder="Institute">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="instituteAdd" name="instituteAdd" class="form-control" placeholder="Institute Address">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="stdCode" name="stdCode" class="form-control" placeholder="Student Code">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="stdRoll" name="stdRoll" class="form-control" placeholder="Student Roll">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="stdReg" name="stdReg" class="form-control" placeholder="Student Registration">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="stdSession" name="stdSession" class="form-control" placeholder="Student Session">

                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="stdExamination" name="stdExamination" class="form-control" placeholder="Examination">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="text" id="stdPosition" name="stdPosition" class="form-control" placeholder="Student Position">
                                          </div>
                                          <div class="col-sm-12 col-xl-3 m-b-30">
                                             <input type="hidden" id="studentId" name="studentId" class="form-control" placeholder="">

                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col">
                                             <input type="hidden" id="addressType" class="form-control" placeholder="col">
                                          </div>
                                          <div class="col">
                                             <input type="hidden" id="studentId" class="form-control" placeholder="col">
                                          </div>
                                          <div class="col-sm-4">
                                             <button id="submitClassInfo" class="form-control form-bg-primary">Save Info</button>
                                          </div>
                                       </div>

                                    </div>
                                 </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
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
                           <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                           <a class="btn btn-danger btn-ok" data-dismiss="modal">Delete</a>
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
   @include('common.resource.datatable')
   <script>
       $(document).ready(function () {

           $( "#divGroup" ).hide();

           $("#formStdShowInfo").validate({
               submitHandler: function(form) {
                   $.ajax({
                       url: '/api/showStdInfo',
                       type: 'POST',
                       data: $('#formStdShowInfo').serialize(),
                       success: function (response) {
                           data = response.data;
                           var tbody='<table id="example" class="table table-bordered"  >' +
                               '<thead> ' +
                               "<tr> " +
                               "<th>SL</th> " +
                               "<th>Photo</th> " +
                               "<th>Code</th> " +
                               "<th>Name</th> " +
                               "<th>Shift</th> " +
                               "<th>Class</th> " +
                               "<th>Section</th> " +
                               "<th>Roll</th> " +
                               "<th>Session</th> " +
                               "<th>Medium</th> " +
                               "<th>Version</th> " +
                               "<th>Group</th> " +
                               "</tr> " +
                               "</thead> " +
                               "<tbody> " ;
                           for(var i=0; i<data.length; i++)
                           {
                               tbody +="<tr>" ;
                               tbody += "<td>"+ (i+1) +"</td>";
                               tbody += "<td> <img src=\""+data[i]['studentPhotoLink']+"\" alt=\""+data[i]['name']+"\" height=\"30\" width=\"40\"></td>";
                               tbody += "<td>"+data[i]['studentId']+"</td>";
                               tbody += "<td>"+data[i]['name']+"</td>";
                               tbody += "<td>"+data[i]['shiftName']+"</td>";
                               tbody += "<td>"+data[i]['classNum']+"</td>";
                               tbody += "<td>"+data[i]['sectionName']+"</td>";
                               tbody += "<td>"+data[i]['rollNo']+"</td>";
                               tbody += "<td>"+data[i]['sessionName']+"</td>";
                               tbody += "<td>"+data[i]['mediumName']+"</td>";
                               tbody += "<td>"+data[i]['versionName']+"</td>";
                               tbody += "<td>"+data[i]['groupName']+"</td>";
                               tbody += "</tr>";
                           }
                           tbody += "</tbody></table>";

                           $('#tableDiv').html(tbody);

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
                               searching: false,
                               "order": [],
                               "columnDefs": [
                                   {
                                       "type": "html-num-fmt", "targets": 4,
                                       "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9,10,11]
                                   }
                               ],
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


                           });
                       }
                   });
                   return false; // required to block normal submit since you used ajax
               }
           });

       });
   </script>
@endsection