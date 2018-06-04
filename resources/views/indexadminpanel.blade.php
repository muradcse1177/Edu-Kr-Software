@extends('layout.app')
@section('title', 'Dashboard|School')
@section('content')

               <div class="row">

                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c-blue order-card">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Total Students</h6></center>
                           <h2 class="text-right"> <i class="fa fa-mortar-board f-left"></i><span>1657</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c-green order-card">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Present Students</h6></center>
                           <h2 class="text-right"> <i class="fa fa-mortar-board f-left"></i><span>1143</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Absent Students</h6></center>
                           <h2 class="text-right"> <i class="fa fa-mortar-board f-left"></i><span>514</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c order-card" style="background-color: #9B0BA5;" >
                        <div class="card-block">
                           <center><h6 class="m-b-20">Total Employee</h6></center>
                           <h2 class="text-right"> <i class="fa fa-mortar-board f-left"></i><span>84</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c order-card" style="background-color: #62A50B;">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Present Employee</h6></center>
                           <h2 class="text-right"> <i class="fa fa-mortar-board f-left"></i><span>72</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c order-card" style="background-color: #071489;">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Absent Employee</h6></center>
                           <h2 class="text-right"> <i class="fa fa-mortar-board f-left"></i><span>12</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-6">
                     <div class="card bg-c order-card" style="background-color: #090909;">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Total Fee Collection</h6></center>
                           <h2 class="text-right"> <i class="fa fa-dollar f-left"></i><span>45,58,898.45</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-6">
                     <div class="card bg-c order-card" style="background-color: #8E8E0A;">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Total Fee Pending</h6></center>
                           <h2 class="text-right"> <i class="fa fa-dollar f-left"></i><span>32,923.35</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c order-card" style="background-color: #42f4c5;">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Gateway Fee Collection</h6></center>
                           <h2 class="text-right"> <i class="fa fa-dollar f-left"></i><span>8,30,890.70</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c order-card" style="background-color: #e8f441;">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Transport Fee Collection</h6></center>
                           <h2 class="text-right"> <i class="fa fa-dollar f-left"></i><span>3,30,222.35</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card bg-c order-card" style="background-color: #bff442;">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Hostel Fee Collection</h6></center>
                           <h2 class="text-right"> <i class="fa fa-dollar f-left"></i><span>9,30,890.70</span></h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-12">
                     <div class="card bg-c order-card" style="background-color: #888E4A;">
                        <div class="card-block">
                           <center><h6 class="m-b-20">Academic Calender</h6></center>
                           <iframe src="/background-events" height="400px" width="100%"></iframe>
                        </div>
                     </div>
                  </div>

               </div>
               <div class="page-body">
                  <div class="row" style="display:none;">
                     <div class="col-xl-8">
                        <div class="card">
                           <div class="card-header">
                              <h5>Line chart</h5>
                              <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                           </div>
                           <div class="card-block">
                              <div id="main" style="height:300px"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-4">
                        <div class="card">
                           <div class="card-header">
                              <h5>Pie chart</h5>
                              <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                           </div>
                           <div class="card-block">
                              <div id="pie-chart" style="height:300px"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xl-12" >
                        <div class="card" style="background-color: #a09b13;">
                           <div class="card-header">
                              <h5>Chart of Students </h5>
                              <center><span>Students of specific class are given in bar charts.</span></center>
                           </div>
                           <div class="card-block">
                              <div id="bar_chart" style="height:300px"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-4" style="display:none;">
                        <div class="card">
                           <div class="card-header">
                              <h5>Server load</h5>
                              <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                           </div>
                           <div class="card-block">
                              <div id="server-load" style="height:300px"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="page-body">
                  <div class="row">

                     <div class="col-lg-12" style="display: none;">
                        <div class="card">
                           <div class="card-header">
                              <h5>Area chart</h5>
                              <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                           </div>
                           <div class="card-block">
                              <div id="area-example"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-6" style="display: none;">
                        <div class="card">
                           <div class="card-header">
                              <h5>Line chart</h5>
                              <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                           </div>
                           <div class="card-block">
                              <div id="line-example"></div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-12 col-lg-6">
                        <div class="card">
                           <div class="card-header" style="background-color: #4a7549;">
                              <h5>Attendnce of students(Present)</h5>
                           </div>
                           <div class="card-block" style="background-color: #87a06a;">
                              <center><div id="donut-example"></div></center>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-6">
                        <div class="card">
                           <div class="card-header" style="background-color: #4a7549;">
                              <h5>Attendnce of students(Absent)</h5>
                           </div>
                           <div class="card-block" style="background-color: #87a06a;">
                              <div id="donut-example-2"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>


@endsection

@section('footer')
   @parent

   <script src="/files/assets/pages/chart/echarts/js/echarts-all.js"></script>
   <script src="/files/assets/pages/chart/echarts/echart-custom.js"></script>

   <script src="/files/bower_components/raphael/js/raphael.min.js"></script>
   <script src="/files/bower_components/morris.js/js/morris.js"></script>
   <script src="/files/assets/pages/chart/morris/morris-custom-chart.js"></script>


@endsection
