@extends('layout.app')
@section('title', 'Result Managament')
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
            </div><center><h3 class="m-b-10">Manage Student Mark</h3></center><hr>
                <div class="row">
                    <div class="col-lg-12 col-xl-12s">
                        <ul class="nav nav-tabs md-tabs " role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#resultClass" role="tab"><i class="icofont icofont-ui-message"></i>Result Process</a>
                                <div class="slide"></div>
                            </li>

                        </ul>
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="resultClass" role="tabpanel">
                                {{ Form::open(array('url' => 'api/searchStdReasult','method' => 'post')) }}
                                    <div class="row">
                                        @include('common.studentClassInfo')
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                        </div>
                                        <div class="col">
                                            <input type="hidden" id="addressType" class="form-control " placeholder="col">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" name="search" value="search" id="submitClassInfo" class="form-control form-bg-primary">Search Info</button>
                                        </div>
                                    </div><hr>
                                {{Form::close()}}
                                <div class="row">
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#publishresult" data-placement="top" >
                                            Publish Result</button>
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#sendSMS" data-placement="top" >
                                            Send SMS</button>
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#promoteStudent" data-placement="top" >
                                            Promote Student</button>
                                    </div>
                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tebulationSheet" data-placement="top" title="Edit">
                                            Tabulation Sheet</button>
                                    </div>
                                </div>
                                @php
                                $i=0;
                                $j=1;
                                $length=0;
                                @endphp
                                @if(isset( $data))
                                <div class="table-responsive">
                                       <hr> <center><h5>Result details of you expected claa.</h5></center><br>
                                        <table id="resultTable" class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>
                                                    SL No.
                                                </th>
                                                <th>
                                                    Details
                                                </th>
                                                <th>Student Name</th>
                                                <th>Previous Roll</th>
                                                <th>Total Marks</th>
                                                <th>GPA</th>
                                                <th>Grade</th>
                                                <th>Position In Class</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $data)

                                                <tr>
                                                    <td>
                                                        @php
                                                          $accordion_variable=$i+1;
                                                        @endphp
                                                        {{ $i = $i+1}}
                                                    </td>
                                                    <th scope="row">
                                                        <a class=""  onclick="showResultDetails({{$data->resultId}})" data-toggle="modal"   data-placement="top"  title='Deatails Result'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </th>
                                                    <td>{{$data->stdName}}</td>
                                                    <td>{{$data->rollNo}}</td>
                                                    <td>{{$data->totalMarks}}</td>
                                                    <td>{{$data->gpa}}</td>
                                                    <td>{{$data->grade}}</td>
                                                    <td>{{$j++}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>

                                <div class="modal fade" id="examTimeTableModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Result Details</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-block">
                                                    <div class="table-responsive">
                                                        <table id="examTimeTable" class="table table-striped ">

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="promoteStudent" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Promoto Student</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="modal-title">Previous Records</h4>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="datepicker_start" class="form-control " placeholder="Academic Year" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="class" name="class" class="form-control ">
                                                            <option value="">Select Class</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="section" name="section" name="medium" class="form-control ">
                                                            <option value="">Select Section</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="group" name="group" class="form-control ">
                                                            <option value="">Select Group</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="group" name="group" class="form-control ">
                                                            <option value="">Select Shift</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="group" name="group" class="form-control ">
                                                            <option value="">Select Medium</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="version" name="version" class="form-control ">
                                                            <option value="">Select Version</option>
                                                        </select>
                                                    </div>
                                                </div><hr>
                                                <h5 class="modal-title">Present Records</h5>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <input type="text" id="aca_year" class="form-control " placeholder="Academic Year" >
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="class" name="class" class="form-control ">
                                                            <option value="">Select Class</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="class" name="class" class="form-control ">
                                                            <option value="">Select Section</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="shift" name="shift" class="form-control ">
                                                            <option value="">Select Group</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="shift" name="shift" class="form-control ">
                                                            <option value="">Select Shift</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="group" name="group" class="form-control ">
                                                            <option value="">Select Medium</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-3 m-b-30">
                                                        <select id="class" name="class" class="form-control ">
                                                            <option value="">Select Version</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <hr><center><h5 class="modal-title">Promoto Student Using CheckBox</h5></center><br>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>SL.No</th>
                                                        <th>ROll</th>
                                                        <th>Student Code</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                        <th>GPA</th>
                                                        <th>Grade</th>
                                                        <th>Position</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>1</td>
                                                        <td>451</td>
                                                        <td>Otto</td>
                                                        <td><div class="checkbox-color checkbox-success">
                                                                <input id="checkbox13" type="checkbox" checked="">
                                                                <label for="checkbox13">&nbsp;
                                                                </label>
                                                            </div></td>
                                                        <td>4.52</td>
                                                        <td>C</td>
                                                        <td>12</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>2</td>
                                                        <td>251</td>
                                                        <td>Thornton</td>
                                                        <td><div class="checkbox-color checkbox-success">
                                                                <input id="checkbox15" type="checkbox" checked="">
                                                                <label for="checkbox15">&nbsp;
                                                                </label>
                                                            </div></td>
                                                        <td>12</td>
                                                        <td>B</td>
                                                        <td>15</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="publishresult" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Publish Result on Your Website</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Static Modal</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light ">OK Sure</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="sendSMS" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Send SMS</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Static Modal</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light ">OK Sure</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="tebulationSheet" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tebulation Sheet</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Static Modal</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light ">OK Sure</button>
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
        function showResultDetails(i) {

            $.ajax({
                url: '/api/showResultDetails',
                data:{resultId:i},
                type: 'POST',
                success: function (response) {
                    data = response.data;
                    var tbody= "<thead> " +
                        "<tr> " +
                        "<th>SL. No</th>" +
                        " <th>Course Name</th>" +
                        " <th>Course Code</th>" +
                        " <th>Total Marks</th>" +
                        " <th>GPA</th>" +
                        " <th>Grade</th>" +
                        " </tr>" +
                        " </thead>"+
                        "<tbody>"+
                        "</tbody>";
                    for(var i=0; i<data.length; i++)
                    {
                        tbody += "<tr>";
                        tbody += "<td>"+ (i+1) +"</td>";
                        tbody += "<td>"+data[i]['name']+"</td>";
                        tbody += "<td>"+data[i]['courseCode']+"</td>";
                        tbody += "<td>"+data[i]['marks']+"</td>";
                        tbody += "<td>"+data[i]['gpa']+"</td>";
                        tbody += "<td>"+data[i]['grade']+"</td>";
                        tbody += "</tr>";
                    }
                    $('#examTimeTable').html(tbody);
                    $('#examTimeTableModal').modal('show');
                }
            });
        }

    </script>
@endsection




