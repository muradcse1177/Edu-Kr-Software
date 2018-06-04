@extends('layout.app')
@section('title', 'Gallery Management')
@section('content')
    <div class="page-header card">
        <div class="card-block">
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
                <h5 class="m-b-10">Gallery Management</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-xl-12s">
                        <ul class="nav nav-tabs md-tabs " role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add New File</a>
                                <div class="slide"></div>
                            </li>

                        </ul>
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="feeslog" role="tabpanel">
                                <form id="formAddSliderImage">
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Select Type</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <select id="type" name="type" class="form-control ">
                                                <option value="">Select Type</option>
                                                <option value="image">Image</option>
                                                <option value="video">Video</option>
                                                <option value="audio">Audio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">File Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="fileName" name="fileName" class="form-control " placeholder="File Name" >
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Correspondent Image</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="file" id="image" name="image" class="form-control " placeholder="Correspondent Image" >
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">File</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="file" id="file" name="file" class="form-control " placeholder="File" >
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Is Active</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input id="status" name="status" type="checkbox" checked="" value="Active">
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
                                            <button type="submit" id="submitClassInfo" class="form-control form-bg-primary">Add Slider</button>
                                        </div><hr>
                                    </div>
                                </form>
                                <hr>
                                <center> <h4>Gallery Image/Video/Audio List</h4></center>
                                <div class="table-responsive">
                                    <table id="designationListTable" class="table table-bordered">

                                    </table>
                                    <div class="modal fade" id="modalEditDesig" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit designation settings</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="formEditSlideImg">
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Select Type</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select id="edittype" name="edittype" class="form-control ">
                                                                    <option value="">Select Type</option>
                                                                    <option value="image">Image</option>
                                                                    <option value="video">Video</option>
                                                                    <option value="audio">Audio</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">File Name</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="editfileName" name="editfileName" class="form-control " placeholder="File Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Correspondent Image</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="file" id="editimage" name="editimage" class="form-control " placeholder="Correspondent Image" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">File</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="file" id="editfile" name="editfile" class="form-control " placeholder="File" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Is Active</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input id="editstatus" name="editstatus" type="checkbox" checked="" value="Active">
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
                                    <div class="modal fade" id="confirmDeleteDesignation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    <center><h4 class="modal-title">Are You Sure to Delete This??</h4></center>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="formDeleteSliderImage">
                                                        <input type="hidden" id="dbidmain" name="dbidmain" class="form-control " value="" >
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
    </div>
@endsection
@section('footer')
    @parent
    <script>

        function galleryList() {
            $.ajax({
                url: '/api/showGallery',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>File Name</th>" +
                        " <th>File Type</th>" +
                        " <th>Correspondent Image</th>" +
                        " <th>Status</th>" +
                        " <th>Action</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['title']+"</td>";
                        tbody += "<td>"+data[i]['type']+"</td>";
                        tbody += '<td><img height=\"40px\" width=\"60px\" src=\"'+data[i]['image']+'\"></td>';
                        tbody += "<td>"+data[i]['status']+"</td>";
                        tbody += "<td>" +"<div class='animation-model'>" +
                            " <button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick='editDesig(this.id);' id="+ i +" data-toggle='modal' data-target='#modalEditDesig' data-toggle='tooltip'   data-placement='top' title='Edit'> " +
                            "<i class='fa fa-edit'></i> " +
                            "</button>&nbsp;&nbsp;" +
                            "<button type='button' class='btn btn-danger btn-icon waves-effect waves-light' onclick ='deleteDesig(this.id);' id="+ i +"  data-toggle='modal' data-target='#confirmDeleteDesignation' data-toggle='tooltip'   data-placement='top' title='Delete'> " +
                            "<i class='fa fa-trash'></i> " +
                            "</button> " +
                            "</div> " +
                            "</td>";
                        tbody += "</tr>";
                    }
                    $('#designationListTable').html(tbody);
                }
            });
        }
        $(document).ready(function(){
            galleryList();

            $("#formAddSliderImage").validate({
                //ignore: ":hidden",
                rules: {
                    type: "required",
                    fileName: "required",
                    image: "required",
                    file: "required",
                    status: "required",
                },
                messages: {
                    type: "Please give File type",
                    fileName: "Please give File name",
                    image: "Please give correspondent image",
                    file: "Please give File",
                },

                submitHandler: function(form) {
                    // var myform = document.getElementById("formStdBasicInfo");
                    // var formData = new FormData(myform );
                    $.ajax({
                        url: '/api/insertGalleryFile',
                        type: 'POST',
                        data: new FormData($("#formAddSliderImage")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                galleryList();
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


            $("#formEditSlideImg").validate({
                rules: {
                    type: "required",
                    fileName: "required",
                    image: "required",
                    file: "required",
                    status: "required",
                },
                messages: {
                    type: "Please give File type",
                    fileName: "Please give File name",
                    image: "Please give correspondent image",
                    file: "Please give File",
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editGallery',
                        type: 'POST',
                        data: new FormData($("#formEditSlideImg")[0]),
                        dataType:'json',
                        async:false,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                galleryList();
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


            $("#formDeleteSliderImage").validate({

                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/deleteGallery',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                galleryList();
                                $('#confirmDeleteDesignation').modal('hide');
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

        function editDesig(i) {
            document.getElementById('dbid').value = data[i]['id'];


            document.getElementById('edittype').value = data[i]['type'];
            document.getElementById('editfileName').value = data[i]['title'];
            document.getElementById('editstatus').value = data[i]['status'];
            if(data[i]['status']=='Active')
                document.getElementById("editstatus").checked = true;
            else
                document.getElementById("editstatus").checked = false;
        }

        function deleteDesig(i) {
            console.log( data[i]['id']);
            document.getElementById('dbidmain').value = data[i]['id'];
        }

    </script>
@endsection
