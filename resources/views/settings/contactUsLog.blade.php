@extends('layout.app')
@section('title', 'Contact Us')
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
                <h5 class="m-b-10">Contact Us Management</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-xl-12s">
                        <ul class="nav nav-tabs md-tabs " role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" data-toggle="tab" href="#feeslog" role="tab"><i class="icofont icofont-ui-message"></i>Contact Us</a>
                                <div class="slide"></div>
                            </li>

                        </ul>
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="feeslog" role="tabpanel">
                                <hr>
                                <center> <h4>Contact Us List</h4></center>
                                <div class="table-responsive">
                                    <table id="table" class="table table-bordered">

                                    </table>
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

        function showContactUs() {
            $.ajax({
                url: '/api/showContactUs',
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    if ($.trim(data)) {
                        var tbody = "<thead> " +
                            "<tr> " +
                            "<th>SL. No</th>" +
                            " <th>Name</th>" +
                            " <th>Email</th>" +
                            " <th>Phone No</th>" +
                            " <th>Comment</th>" +
                            " </tr>" +
                            " </thead>" +
                            "<tbody>" +
                            "</tbody>";
                        for (var i = 0; i < data.length; i++) {
                            tbody += "<tr>";
                            tbody += "<td>" + (i + 1) + "</td>";
                            tbody += "<td>" + data[i]['name'] + "</td>";
                            tbody += "<td>" + data[i]['email'] + "</td>";
                            tbody += "<td>" + data[i]['phone'] + "</td>";
                            tbody += "<td>" + data[i]['comment'] + "</td>";
                            tbody += "</tr>";
                        }
                        $('#table').html(tbody);
                    }
                    else{
                        $('#table').html('No News Letter Found.');
                    }
                }

            });
        }
        $(document).ready(function(){
            showContactUs();

        });


    </script>
@endsection
