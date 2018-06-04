@extends('layout.app')
@section('title', 'Slide Image')
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
                <h5 class="m-b-10">Slide Image Management</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-xl-12s">
                        <ul class="nav nav-tabs md-tabs " role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Add New Slider</a>
                                <div class="slide"></div>
                            </li>

                        </ul>
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="feeslog" role="tabpanel">
                                <form id="formAddSliderImage">
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Slider Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="sliderNmae" name="sliderNmae" class="form-control " placeholder="Slider Name" >
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Slider Image</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="file" id="image" name="image" class="form-control " placeholder="Slider Image" >
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Description</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="description" name="description" class="form-control " placeholder="Description" >
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
                                <center> <h4>Slider Image List</h4></center>
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
                                                                <label class="col-form-label" for="inputSuccess1">Slider Name</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="editsliderName" name="editsliderName" class="form-control " placeholder="Slider Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Slider Image</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="file" id="editimage" name="editimage" class="form-control " placeholder="Slider Image" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Description</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="editDescription" name="editDescription" class="form-control " placeholder="Description" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-success row">
                                                            <div class="col-sm-2">
                                                                <label class="col-form-label" for="inputSuccess1">Is Active</label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <input id="editstatus" name="editstatus" type="checkbox" checked="" >
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

        function sliderImageList() {
            $.ajax({
                url: '/api/showSliderImage',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Slider Name</th>" +
                        " <th>Slider Image</th>" +
                        " <th>Description</th>" +
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
                        tbody += "<td>"+data[i]['sliderName']+"</td>";
                        tbody += '<td><img height=\"40px\" width=\"60px\" src=\"'+data[i]['image']+'\"></td>';
                        tbody += "<td>"+data[i]['imageText']+"</td>";
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
            sliderImageList();

            $("#formAddSliderImage").validate({
                //ignore: ":hidden",
                rules: {
                    sliderNmae: "required",
                    image: "required"
                },
                messages: {
                    sliderNmae: "Please give Slide Name",
                    image: "Please give Slide Image"
                },

                submitHandler: function(form) {
                    // var myform = document.getElementById("formStdBasicInfo");
                    // var formData = new FormData(myform );
                    $.ajax({
                        url: '/api/insertSlideImage',
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
                                sliderImageList();
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
                    sliderNmae: "required",
                    image: "required"
                },
                messages: {
                    sliderNmae: "Please give Slide Name",
                    image: "Please give Slide Image"
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/editSlideImage',
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
                                sliderImageList();
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
                        url: '/api/deleteSliderImage',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (typeof response.successMsg !== 'undefined')
                            {
                                notify('success', response.successMsg);
                                sliderImageList();
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


            document.getElementById('editsliderName').value = data[i]['sliderName'];
            document.getElementById('editDescription').value = data[i]['imageText'];
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
