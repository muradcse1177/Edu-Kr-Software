@extends('layout.app')
@section('title', 'Applicant Management')
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
            <center><h5 class="m-b-10">Application Management</h5></center>
            <hr>
            <div class="card-block" >
                <form id="formSearchApplicant">
                    <div class="row">
                        @include('common.studentClassInfo')
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <input type="text" id="regNo" name="regNo" class="form-control " placeholder="Registration No">
                        </div>
                        <div class="col-sm-12 col-xl-3 m-b-30">
                            <input type="text" id="mobile" name="mobile" class="form-control " placeholder="Mobile">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button type="submit" id="submitPrevStudyInfo" class="form-control form-bg-primary">Search Applicant</button>
                        </div>
                    </div>
                </form>
                <div class="dt-responsive table-responsive">
                    <hr><center> <h4>Applicant List</h4></center><hr>

                    <table id="tableApplicantInfo" class="table table-striped table-bordered nowrap">

                    </table>
                    <div class="modal fade" id="userInfo" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Students Dailts Information</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p>Applicant Information given below.If details Please download the full profile.</p>
                                        <ul id="modaluserInfo">

                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary waves-effect waves-light ">Close</button>
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
        $( '#idsection' ).hide();
        $(document).ready(function (){

            $("#formSearchApplicant").validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/searchApplicant',
                        type: 'POST',
                        data: new FormData($("#formSearchApplicant")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            data = response.data;
                            length = data.length;
                            if(!$.trim(data)){
                                $('#tableApplicantInfo').html("No data found.Please try again.");
                            }
                            else{
                                var tbody= "<thead> " +
                                    "<tr> " +
                                    "<th>SL. No</th>" +
                                    " <th>Action</th>" +
                                    " <th>Reg No</th>" +
                                    " <th>Name</th>" +
                                    " <th>Photo</th>" +
                                    " <th>Birth Date</th>" +
                                    " <th>Gender</th>" +
                                    " <th>Religion</th>" +
                                    " <th>Mobile</th>" +
                                    " <th>Blood group</th>" +
                                    " <th>Gur Name</th>" +
                                    " <th>Gur Mobile</th>" +
                                    " <th>Address</th>" +
                                    " </tr>" +
                                    " </thead>"+
                                    "<tbody>"+
                                    "</tbody>";
                                for(var i=0; i<data.length; i++)
                                {
                                    tbody += "<tr>";
                                    tbody += "<td>"+ (i+1) +"</td>";
                                    tbody += "<td>" +"<div class='animation-model'>" +
                                        " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='userInfo(this.id);' id="+ i +" data-toggle='modal' data-target='#userInfo' data-toggle='tooltip'   data-placement='top' title='User Info'> " +
                                        "<i class='fa fa-user'></i> " +
                                        "</button>&nbsp;&nbsp;" +
                                        "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteDesig(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirm-delete' data-toggle='tooltip'   data-placement='top' title='Download'> " +
                                        "<i class='fa fa-cloud-download'></i> " +
                                        "</button> " +
                                        "</div> " +
                                        "</td>";
                                    tbody += "<td>"+data[i]['registrationNo']+"</td>";
                                    tbody += "<td>"+data[i]['name']+"</td>";
                                    tbody += '<td><img height=\"40px\" width=\"60px\" src=\"'+data[i]['stdPhoto']+'\"></td>';
                                    tbody += "<td>"+data[i]['birthdate']+"</td>";
                                    tbody += "<td>"+data[i]['gender']+"</td>";
                                    tbody += "<td>"+data[i]['religion']+"</td>";
                                    tbody += "<td>"+data[i]['mobile']+"</td>";
                                    tbody += "<td>"+data[i]['bloodgroup']+"</td>";
                                    tbody += "<td>"+data[i]['gurName']+"</td>";
                                    tbody += "<td>"+data[i]['gurMobile']+"</td>";
                                    tbody += "<td>"+data[i]['presentAdd']+"</td>";
                                    tbody += "</tr>";
                                }
                                $('#tableApplicantInfo').html(tbody);
                            }
                        }
                    });
                    return false;
                }
            });
        });
        function userInfo(i) {
            console.log(i);
            var LiADD="";
            LiADD+='<li><strong>Name:</strong>'+ data[i]['name']+' </li>';
            LiADD+='<li><strong>Registration No:</strong>'+ data[i]['registrationNo'] +'</li>';
            LiADD+='<li><strong>Mobile:</strong>'+  data[i]['mobile']+'</li>';
            LiADD+='<li><strong>Gurdian Name:</strong> '+ data[i]['gurName'] +'</li>';
            LiADD+='<li><strong>Gurdian Mobile:</strong>'+ data[i]['gurMobile'] +'</li>';
            LiADD+='<li><strong>Address:</strong>'+  data[i]['presentAdd']+'</li>';
            $('#modaluserInfo').html(LiADD);
        }

    </script>
@endsection
