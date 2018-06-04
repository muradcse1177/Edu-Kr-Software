@extends('layout.app')
@section('title', 'School Info')
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
            <h5 class="m-b-10">School Info</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-xl-12s">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#markEntry" role="tab"><i class="icofont icofont-ui-message"></i>Add School Info</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Edit School Info</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="markEntry" role="tabpanel">
                        <form id="schoolinfo">
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">School Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="schoolName" class="form-control " id="schoolName" placeholder="School Name">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">School Logo</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="file" name="logo" class="form-control " id="logo" placeholder="School Logo">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label"  for="inputSuccess1">About School</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="aboutSchool" class="form-control " id="aboutSchool" placeholder="About School">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label"  for="inputSuccess1">Total Teacher</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="totalteacher" class="form-control " id="totalteacher" placeholder="Total Teacher">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label"  for="inputSuccess1">Total Student</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="totalstudent" class="form-control " id="totalstudent" placeholder="Total Student">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label"  for="inputSuccess1">Success Rate</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="successrate" class="form-control " id="successrate" placeholder="Success Rate">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label"  for="inputSuccess1">Parents Satisfaction</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="parsat" class="form-control " id="parsat" placeholder="Parents Satisfaction">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label"  for="inputSuccess1">Contact Number</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="contactNumber" class="form-control " id="contactNumber" placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label"  for="inputSuccess1">Contact Number 2</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="contactNumber2" class="form-control " id="contactNumber2" placeholder="Contact Number 2">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Address</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control " id="address" placeholder="Address">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Email</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control " id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Fax Number</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="faxNumber" class="form-control " id="faxNumber" placeholder="Fax Number">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Establish Year</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="establishYear" class="form-control " id="establishYear" placeholder="Establish Year">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">EIIN Number</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="eiinNumber" class="form-control " id="eiinNumber" placeholder="EIIN Number">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Opening Day From</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="openingdayfrom" class="form-control " id="openingdayfrom" placeholder="Opening Day From">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Closing Day To</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="closingdayto" class="form-control " id="closingdayto" placeholder="Closing Day To">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Facebook Link</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="facebooklink" class="form-control " id="facebooklink" placeholder="Facebook Link">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Twitter Link</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="twitterLink" class="form-control " id="twitterLink" placeholder="Twitter Link">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Youtube Link</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="youtubeLink" class="form-control " id="youtubeLink" placeholder="Youtube Link">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Google Plus Link</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="googleLink" class="form-control " id="googleLink" placeholder="Google Plus Link">
                                </div>
                            </div>
                            <div class="form-group has-success row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="inputSuccess1">Instragram Link</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="instragramLink" class="form-control " id="instragramLink" placeholder="Instragram Link">
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
                                    <button id="submitAddInfo"  type="submit" class="form-control form-bg-primary">Add Info</button>
                                </div><hr>
                            </div>
                        </form>
                        </div>
                        <div class="tab-pane" id="feeslog" role="tabpanel">

                            <center> <h4>School Information</h4></center><hr>

                            <div class="table-responsive">
                                <table id="schoolInfo" class="table table-bordered">

                                </table>
                                <div class="modal fade" id="modalEditDesig" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit School information</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <center><h5 class="m-b-10">Edit Again</h5></center>
                                                <form id="editSchoolinfo">
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">School Name</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newschoolName" class="form-control " id="newschoolName" placeholder="School Name">
                                                            <input type="hidden" name="oldschoolName" class="form-control " id="oldschoolName" placeholder="School Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">School Logo</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="newlogo" class="form-control " id="newlogo" placeholder="School Logo">
                                                            <input type="hidden" name="oldlogo" class="form-control " id="oldlogo" placeholder="School Logo">
                                                        </div>
                                                    </div>

                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label"  for="inputSuccess1">About School</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newaboutSchool" class="form-control " id="newaboutSchool" placeholder="About School">
                                                            <input type="hidden" name="oldaboutSchool" class="form-control " id="oldaboutSchool" placeholder="About School">
                                                        </div>
                                                    </div>'

                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label"  for="inputSuccess1">Total Teacher</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newtotalteacher" class="form-control " id="newtotalteacher" placeholder="Total Teacher">
                                                            <input type="hidden" name="oldtotalteacher" class="form-control " id="oldtotalteacher" placeholder="Total Teacher">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label"  for="inputSuccess1">Total Student</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newtotalstudent" class="form-control " id="newtotalstudent" placeholder="Total Student">
                                                            <input type="hidden" name="oldtotalstudent" class="form-control " id="oldtotalstudent" placeholder="Total Student">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label"  for="inputSuccess1">Success Rate</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newsuccessrate" class="form-control " id="newsuccessrate" placeholder="Success Rate">
                                                            <input type="hidden" name="oldsuccessrate" class="form-control " id="oldsuccessrate" placeholder="Success Rate">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label"  for="inputSuccess1">Parents Satisfaction</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newparsat" class="form-control " id="newparsat" placeholder="Parents Satisfaction">
                                                            <input type="hidden" name="oldparsat" class="form-control " id="oldparsat" placeholder="Parents Satisfaction">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label"  for="inputSuccess1">Contact Number</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newcontactNumber1" class="form-control " id="newcontactNumber1" placeholder="Contact Number">
                                                            <input type="hidden" name="oldcontactNumber1" class="form-control " id="oldcontactNumber1" placeholder="Contact Number">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label"  for="inputSuccess1">Contact Number 2</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newcontactNumber2" class="form-control " id="newcontactNumber2" placeholder="Contact Number 2">
                                                            <input type="hidden" name="oldcontactNumber2" class="form-control " id="oldcontactNumber2" placeholder="Contact Number 2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Address</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newaddress" class="form-control " id="newaddress" placeholder="Address">
                                                            <input type="hidden" name="oldaddress" class="form-control " id="oldaddress" placeholder="Address">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Email</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newemail" class="form-control " id="newemail" placeholder="Email">
                                                            <input type="hidden" name="oldemail" class="form-control " id="oldemail" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Fax Number</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newfaxNumber" class="form-control " id="newfaxNumber" placeholder="Fax Number">
                                                            <input type="hidden" name="oldfaxNumber" class="form-control " id="oldfaxNumber" placeholder="Fax Number">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Establish Year</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newestablishYear" class="form-control " id="newestablishYear" placeholder="Establish Year">
                                                            <input type="hidden" name="oldestablishYear" class="form-control " id="oldestablishYear" placeholder="Establish Year">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">EIIN Number</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="neweiinNumber" class="form-control " id="neweiinNumber" placeholder="EIIN Number">
                                                            <input type="hidden" name="oldeiinNumber" class="form-control " id="oldeiinNumber" placeholder="EIIN Number">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Opening Day From</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newopeningdayfrom" class="form-control " id="newopeningdayfrom" placeholder="Opening Day From">
                                                            <input type="hidden" name="oldopeningdayfrom" class="form-control " id="oldopeningdayfrom" placeholder="Opening Day From">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Closing Day To</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newclosingdayto" class="form-control " id="newclosingdayto" placeholder="Closing Day To">
                                                            <input type="hidden" name="oldclosingdayto" class="form-control " id="oldclosingdayto" placeholder="Closing Day To">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Facebook Link</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newfacebooklink" class="form-control " id="newfacebooklink" placeholder="Facebook Link">
                                                            <input type="hidden" name="oldfacebooklink" class="form-control " id="oldfacebooklink" placeholder="Facebook Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Twitter Link</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newtwitterLink" class="form-control " id="newtwitterLink" placeholder="Twitter Link">
                                                            <input type="hidden" name="oldtwitterLink" class="form-control " id="oldtwitterLink" placeholder="Twitter Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Youtube Link</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newyoutubeLink" class="form-control " id="newyoutubeLink" placeholder="Youtube Link">
                                                            <input type="hidden" name="oldyoutubeLink" class="form-control " id="oldyoutubeLink" placeholder="Youtube Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Google Plus Link</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newgoogleLink" class="form-control " id="newgoogleLink" placeholder="Google Plus Link">
                                                            <input type="hidden" name="oldgoogleLink" class="form-control " id="oldgoogleLink" placeholder="Google Plus Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-2">
                                                            <label class="col-form-label" for="inputSuccess1">Instragram Link</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="newinstragramLink" class="form-control " id="newinstragramLink" placeholder="Instragram Link">
                                                            <input type="hidden" name="oldinstragramLink" class="form-control " id="oldinstragramLink" placeholder="Instragram Link">
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <input type="hidden" name="dbid" class="form-control " id="dbid" placeholder="">
                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" >Close</button>
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
        </div>
    </div>
@endsection
@section('footer')
    @parent
    <script>


        function loadSchoolInformation() {
            $.ajax({
                url: '/api/showSchoolInfo',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    console.log(data);

                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Action</th>" +
                        " <th>School Name</th>" +
                        " <th>School Logo</th>" +
                        " <th>About School</th>" +
                        " <th>Total Teacher</th>" +
                        " <th>Total Student</th>" +
                        " <th>Success Rate</th>" +
                        " <th>Parents Satisfaction</th>" +
                        " <th>Contact Number</th>" +
                        " <th>Contact Number 2</th>" +
                        " <th>Address</th>" +
                        " <th>Email</th>" +
                        " <th>Fax Number</th>" +
                        " <th>Establish Year</th>" +
                        " <th>EIIN Number</th>" +
                        " <th>Opening Day From</th>" +
                        " <th>Closing Day To</th>" +
                        " <th>Facebook Link</th>" +
                        " <th>Twitter Link</th>" +
                        " <th>Youtube Link</th>" +
                        " <th>Google Plus Link</th>" +
                        " <th>Instragram Link</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editDesig(this.id);' id="+ i +" data-toggle='modal' data-target='#modalEditDesig' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit'></i> " +
                            "</button> " +
                            "</div> " +
                            "</td>";
                        tbody += "<td>"+data[i]['schoolName']+"</td>";
                        tbody += '<td><img height=\"40px\" width=\"60px\" src=\"'+data[i]['logo']+'\"></td>';
                        tbody += "<td>"+data[i]['aboutSchool']+"</td>";
                        tbody += "<td>"+data[i]['totalteacher']+"</td>";
                        tbody += "<td>"+data[i]['totalstudent']+"</td>";
                        tbody += "<td>"+data[i]['successrate']+"</td>";
                        tbody += "<td>"+data[i]['parsat']+"</td>";
                        tbody += "<td>"+data[i]['contactNumber1']+"</td>";
                        tbody += "<td>"+data[i]['contactNumber2']+"</td>";
                        tbody += "<td>"+data[i]['address']+"</td>";
                        tbody += "<td>"+data[i]['email']+"</td>";
                        tbody += "<td>"+data[i]['faxNumber']+"</td>";
                        tbody += "<td>"+data[i]['establishYear']+"</td>";
                        tbody += "<td>"+data[i]['eiinNumber']+"</td>";
                        tbody += "<td>"+data[i]['openingDayFrom']+"</td>";
                        tbody += "<td>"+data[i]['closingDayTo']+"</td>";
                        tbody += "<td>"+data[i]['facebookLink']+"</td>";
                        tbody += "<td>"+data[i]['twitterLink']+"</td>";
                        tbody += "<td>"+data[i]['youtubeLink']+"</td>";
                        tbody += "<td>"+data[i]['googlPlusLink']+"</td>";
                        tbody += "<td>"+data[i]['intragramLink']+"</td>";
                        tbody += "</tr>";
                    }
                    $('#schoolInfo').html(tbody);
                }
            });
        }


        
        $(document).ready(function(){
            loadSchoolInformation();

            $("#schoolinfo").validate({
                //ignore: ":hidden",
                rules: {
                    schoolName: "required",
                    logo: "required",
                    aboutSchool: "required",
                    totalteacher: {required: true, number: true},
                    totalstudent: {required: true, number: true},
                    successrate: {required: true, number: true},
                    parsat: {required: true, number: true},
                    contactNumber: {required: true, number: true},
                    contactNumber2: {required: true, number: true},
                    address: "required",
                    email: {email:  true , required:  true},
                    establishYear: {required: true, number: true},
                    faxNumber: {number: true},
                    eiinNumber:{required: true, number: true}
                },
                messages: {
                    schoolName: "Please give School Name",
                    logo: "Please give School Logo",
                    aboutSchool: "Please give School Information",
                    contactNumber: "Please give valid Contact Number",
                    contactNumber2: "Please give valid Contact Number",
                    address: "Please give School Address",
                    email: "Please give Valid Email Address",
                    establishYear: "Please give Valid Established Year",
                    faxNumber: "Please give Valid Fax Number",
                    eiinNumber: "Please give Valid School EIIN Number"
                },
                submitHandler: function(form) {
                    // var myform = document.getElementById("formStdBasicInfo");
                    // var formData = new FormData(myform );
                    $.ajax({
                        url: '/api/insertSchoolInfo',
                        type: 'POST',
                        data: new FormData($("#schoolinfo")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                //loadDesignationList();
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

        });


        $("#editSchoolinfo").validate({

            rules: {
                schoolName: "required",
                logo: "required",
                contactNumber: {required: true, number: true},
                contactNumber2: {required: true, number: true},
                address: "required",
                email: {email:  true , required:  true},
                establishYear: {required: true, number: true},
                faxNumber: {number: true},
                eiinNumber:{required: true, number: true}
            },
            messages: {
                schoolName: "Please give School Name",
                logo: "Please give School Logo",
                contactNumber: "Please give valid Contact Number",
                contactNumber2: "Please give valid Contact Number",
                address: "Please give School Address",
                email: "Please give Valid Email Address",
                establishYear: "Please give Valid Established Year",
                faxNumber: "Please give Valid Fax Number",
                eiinNumber: "Please give Valid School EIIN Number"
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '/api/editSchoolInfo',
                    type: 'POST',
                    data: new FormData($("#editSchoolinfo")[0]),
                    dataType:'json',
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (typeof response.successMsg !== 'undefined')
                        {
                            notify('success', response.successMsg);
                            loadSchoolInformation();
                            $('#modalEditDesig').modal('hide');
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


        function editDesig(i) {

            document.getElementById('dbid').value = data[i]['id'];





            document.getElementById('newschoolName').value = data[i]['schoolName'];
            document.getElementById('oldschoolName').value = data[i]['schoolName'];

            document.getElementById('newaboutSchool').value = data[i]['aboutSchool'];
            document.getElementById('oldaboutSchool').value = data[i]['aboutSchool'];

            document.getElementById('newtotalteacher').value = data[i]['totalteacher'];
            document.getElementById('oldtotalteacher').value = data[i]['totalteacher'];

            document.getElementById('newtotalstudent').value = data[i]['totalstudent'];
            document.getElementById('oldtotalstudent').value = data[i]['totalstudent'];

            document.getElementById('newsuccessrate').value = data[i]['successrate'];
            document.getElementById('oldsuccessrate').value = data[i]['successrate'];

            document.getElementById('newparsat').value = data[i]['parsat'];
            document.getElementById('oldparsat').value = data[i]['parsat'];

            document.getElementById('newcontactNumber1').value = data[i]['contactNumber1'];
            document.getElementById('oldcontactNumber1').value = data[i]['contactNumber1'];

            document.getElementById('newcontactNumber2').value = data[i]['contactNumber2'];
            document.getElementById('oldcontactNumber2').value = data[i]['contactNumber2'];

            document.getElementById('newemail').value = data[i]['email'];
            document.getElementById('oldemail').value = data[i]['email'];

            document.getElementById('newaddress').value = data[i]['address'];
            document.getElementById('oldaddress').value = data[i]['address'];


            document.getElementById('newfaxNumber').value = data[i]['faxNumber'];
            document.getElementById('oldfaxNumber').value = data[i]['faxNumber'];

            document.getElementById('newestablishYear').value = data[i]['establishYear'];
            document.getElementById('oldestablishYear').value = data[i]['establishYear'];

            document.getElementById('neweiinNumber').value = data[i]['eiinNumber'];
            document.getElementById('oldeiinNumber').value = data[i]['eiinNumber'];

            document.getElementById('newopeningdayfrom').value = data[i]['openingDayFrom'];
            document.getElementById('oldopeningdayfrom').value = data[i]['openingDayFrom'];

            document.getElementById('newclosingdayto').value = data[i]['closingDayTo'];
            document.getElementById('oldclosingdayto').value = data[i]['closingDayTo'];

            document.getElementById('newfacebooklink').value = data[i]['facebookLink'];
            document.getElementById('oldfacebooklink').value = data[i]['facebookLink'];

            document.getElementById('newtwitterLink').value = data[i]['twitterLink'];
            document.getElementById('oldtwitterLink').value = data[i]['twitterLink'];

            document.getElementById('newyoutubeLink').value = data[i]['youtubeLink'];
            document.getElementById('oldyoutubeLink').value = data[i]['youtubeLink'];

            document.getElementById('newgoogleLink').value = data[i]['googlPlusLink'];
            document.getElementById('oldgoogleLink').value = data[i]['googlPlusLink'];

            document.getElementById('newinstragramLink').value = data[i]['intragramLink'];
            document.getElementById('oldinstragramLink').value = data[i]['intragramLink'];

        }
    </script>
@endsection




