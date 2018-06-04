<nav class="pcoded-navbar">
   <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
   <div class="pcoded-inner-navbar main-menu">
      <div class="pcoded-navigation-label">Navigation</div>
      <ul class="pcoded-item pcoded-left-item">
         <li class="{{-- pcoded-hasmenu active pcoded-trigger --}}">
            <a href="/indexadminpanel">
               <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
               <span class="pcoded-mtext">Dashboard</span>
               <span class="pcoded-mcaret"></span>
            </a>
            <a href="/">
               <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
               <span class="pcoded-mtext">School Website</span>
               <span class="pcoded-mcaret"></span>
            </a>
            {{--
            <ul class="pcoded-submenu">
               <li class="active">
                  <a href="index-2.html">
                     <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                     <span class="pcoded-mtext">Default</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class="">
                  <a href="dashboard-ecommerce.html">
                     <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                     <span class="pcoded-mtext">Ecommerce</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="dashboard-analytics.html">
                     <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                     <span class="pcoded-mtext">Analytics</span>
                     <span class="pcoded-badge label label-info ">NEW</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
            </ul>
      --}}
         </li>
         @php
            if(isset($_SESSION["role"]) && isset($_SESSION["designation"] )){
               $role= $_SESSION["role"];
               for($i=0; $i<count($role); $i++){
               if($role[$i]['roleName']==1 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">HR</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                        <li class=" ">
                           <a href="/hr/designationManagement">
                              <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                              <span class="pcoded-mtext">Designation Management</span>
                              <span class="pcoded-mcaret"></span>
                           </a>
                        </li>
               @php
                  }
                  if($role[$i]['roleName']==1 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/hr/leaveManagement">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Leave Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==1 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" ">
                        <a href="/hr/accountManagement">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Account Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==1 && $role[$i]['roleValue']==4){
                  @endphp
                     <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Pay Roll</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/hr/salaryManagement">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Salary Management</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                           <li class=" ">
                              <a href="/hr/payslip">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Payslip</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==1 && $role[$i]['roleValue']==5){
                  @endphp
                     <li class=" ">
                        <a href="/hr/taxManagement">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Tax Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==1 && $role[$i]['roleValue']==6){
                  @endphp
                     <li class=" ">
                        <a href="/hr/roleManagement">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Role Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==2 && $role[$i]['roleValue']==1){
                  @endphp
                        </ul>
                     </li>
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Academic</span>

                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/academic/academicCalander">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Academic Calander</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==2 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/academic/manageClass">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Class Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==2 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" ">
                        <a href="/academic/manageCourse">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Course Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==2 && $role[$i]['roleValue']==4){
                  @endphp
                     <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Class Routine</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/academic/manageDay" target="_blank">
                                 <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Day</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                           <li class=" ">
                              <a href="/academic/mangePeriodTime" target="_blank">
                                 <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                 <span class="pcoded-mtext">Period Serial</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                           <li class=" ">
                              <a href="/academic/mangePeriod" target="_blank">
                                 <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Period</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>

                        </ul>
                  @php
                  }
                  if($role[$i]['roleName']==2 && $role[$i]['roleValue']==6){
                  @endphp
                        <li class=" ">
                           <a href="/academic/routine">
                              <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                              <span class="pcoded-mtext">Routine Management</span>
                              <span class="pcoded-mcaret"></span>
                           </a>
                        </li>
                        </li>
                     </ul>
                  </li>
                  @php
                  }
                  if($role[$i]['roleName']==3 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Teacher</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/teacher/create-new-profile">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Create New Profile</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==3 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/teacher/manage-profile">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Show Teacher Profile</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==3 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Attendance</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/teacher/manageAttandanceTeacher">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Attendance</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                           <li class=" ">
                              <a href="/teacher/attandancereportTeacher">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Attendance Report</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==3 && $role[$i]['roleValue']==4){
                  @endphp
                           <li class=" pcoded-hasmenu">
                              <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Course Management</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                              <ul class="pcoded-submenu">
                                 <li class=" ">
                                    <a href="/teacher/setCourseTeacher">
                                       <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                       <span class="pcoded-mtext">Set Course</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="/teacher/showCourseTeacher">
                                       <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                       <span class="pcoded-mtext">Show Course</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==4 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Student</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">

                           <li class=" ">
                              <a href="/student/create-new-profile">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Create New Profile</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==4 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/student/manage-profile">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Manage Student Profile</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==4 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Attendance</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/student/manat">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Attendance</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                           <li class=" ">
                              <a href="/student/attre">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Attendance Report</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==4 && $role[$i]['roleValue']==4){
                  @endphp
                           <li class=" pcoded-hasmenu">
                              <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Course Management</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                              <ul class="pcoded-submenu">
                                 <li class=" ">
                                    <a href="/student/setCourse">
                                       <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                       <span class="pcoded-mtext">Set Course</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="/student/showCourse">
                                       <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                       <span class="pcoded-mtext">Show Course</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==5 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Admission</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/admission/manageCircular">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Circular</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==5 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/admission/applicantProfile">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Applicant Profile</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==5 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" ">
                        <a href="/admission/userLogin">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">User Panel</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==5 && $role[$i]['roleValue']==4){
                  @endphp
                           <li class=" ">
                              <a href="/admission/manageApplicant">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Applicant</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==6 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Examination</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">

                           <li class=" ">
                              <a href="/examination/examType">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Exam Type</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==6 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/examination/manageGrade">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Manage Grade</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==6 && $role[$i]['roleValue']==3){
                  @endphp
                           <li class=" ">
                              <a href="/examination/manageExam">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Exam</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==7 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Result</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/result/manageStudentMark">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Student Mark</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==7 && $role[$i]['roleValue']==2){
                  @endphp
                           <li class=" ">
                              <a href="/result/processExamResult">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Process Exam Result</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==7 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Noticeboard</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/noticeboard/manageNotice">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Manage Notice</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==8 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Fees</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/fees/academicFeesPanel">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Academic Fees Panel</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==8 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/fees/absLatFinCreate">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Absent/Late Fine Create</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==8 && $role[$i]['roleValue']==3){
                  @endphp
                           <li class=" ">
                              <a href="/fees/feesTransactionDetails">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Transaction details</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==9 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Library</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/library/barCodeGenerator">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Barcode Generator</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==9 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/library/assignBook">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Assign Book</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==9 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" ">
                        <a href="/library/returnBook">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Return Book</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==9 && $role[$i]['roleValue']==4){
                  @endphp
                     <li class=" ">
                        <a href="/library/transactionDetails">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Transaction Details</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==9 && $role[$i]['roleValue']==5){
                  @endphp
                     <li class=" ">
                        <a href="/library/bookList">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Book List</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==9 && $role[$i]['roleValue']==6){
                  @endphp
                           <li class=" ">
                              <a href="/library/libraryFineReport">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Library Fine Report</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==10 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Hostel</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/hostel/createBuilding">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Add Hostel</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==10 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/hostel/allocateRoom">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Room Allocate</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==10 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" ">
                        <a href="/hostel/terminateStudent">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Terminate Student</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==10 && $role[$i]['roleValue']==4){
                  @endphp
                     <li class=" ">
                        <a href="/hostel/studentList">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Student List</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==10 && $role[$i]['roleValue']==5){
                  @endphp
                     <li class=" ">
                        <a href="/hostel/hostelFeessPanel">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Hostel Fees Panel</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==10 && $role[$i]['roleValue']==6){
                  @endphp
                           <li class=" ">
                              <a href="/hostel/transactionDetailsHostel">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Transaction Details</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==11 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Transport</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/transport/createTransport">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Transport Create</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==11 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" ">
                        <a href="/transport/assignSTTransport">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Assign Vehicle</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==11 && $role[$i]['roleValue']==4){
                  @endphp
                     <li class=" ">
                        <a href="/transport/terminaTetransport">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Terminate Vehicle</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==11 && $role[$i]['roleValue']==5){
                  @endphp
                     <li class=" ">
                        <a href="/transport/transportationDetails">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Transportation Details</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==11 && $role[$i]['roleValue']==6){
                  @endphp
                           <li class=" ">
                              <a href="/transport/transTranDetails">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Transaction Details</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==12 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Message/SMS</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" pcoded-hasmenu">
                              <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Student</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                              <ul class="pcoded-submenu">
                                 <li class=" ">
                                    <a href="/sms/sendSmsAllStudent" target="_blank">
                                       <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                       <span class="pcoded-mtext">All Student</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="/sms/sendSmsSingleStudent" target="_blank">
                                       <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                       <span class="pcoded-mtext">Single Student</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="/sms/sendSmsClassWiseStudent" target="_blank">
                                       <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                       <span class="pcoded-mtext">Class-Wise</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                  @php
                  }
                  if($role[$i]['roleName']==12 && $role[$i]['roleValue']==2){
                  @endphp
                     <ul class="pcoded-submenu">
                        <li class=" pcoded-hasmenu">
                           <a href="javascript:void(0)">
                              <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                              <span class="pcoded-mtext">Teacher</span>
                              <span class="pcoded-mcaret"></span>
                           </a>
                           <ul class="pcoded-submenu">
                              <li class=" ">
                                 <a href="/sms/sendSmsAllTeacher" target="_blank">
                                    <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                    <span class="pcoded-mtext">All Teacher</span>
                                    <span class="pcoded-mcaret"></span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="/sms/sendSmsSingleTeacher" target="_blank">
                                    <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                    <span class="pcoded-mtext">Single Teacher</span>
                                    <span class="pcoded-mcaret"></span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="/sms/sendSmsDeptWiseTeacher" target="_blank">
                                    <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                    <span class="pcoded-mtext">Department-Wise</span>
                                    <span class="pcoded-mcaret"></span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  @php
                  }
                  if($role[$i]['roleName']==12 && $role[$i]['roleValue']==3){
                  @endphp
                        <ul class="pcoded-submenu">
                           <li class=" pcoded-hasmenu">
                              <a href="javascript:void(0)">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">Employee</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                              <ul class="pcoded-submenu">
                                 <li class=" ">
                                    <a href="/sms/sendSmsAllEmployee" target="_blank">
                                       <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                       <span class="pcoded-mtext">All Employee</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="/sms/sendSmsSingleEmployee" target="_blank">
                                       <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                       <span class="pcoded-mtext">Single Employee</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="/sms/sendSmsDeptWiseEmployee" target="_blank">
                                       <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                       <span class="pcoded-mtext">Department-Wise</span>
                                       <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==1){
                  @endphp
                     <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                           <span class="pcoded-micon"><i class="ti-layout"></i><b>P</b></span>
                           <span class="pcoded-mtext">Website management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                              <a href="/settings/schoolInfo">
                                 <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                 <span class="pcoded-mtext">School Info</span>
                                 <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                  @php
                  }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==2){
                  @endphp
                     <li class=" ">
                        <a href="/settings/bannerImg">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Slide Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==3){
                  @endphp
                     <li class=" ">
                        <a href="/settings/principalMessage">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Principal Message</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  //if($role[$i]['roleName']==13 && $role[$i]['roleValue']==4){
                  @endphp
                     {{--<li class=" ">--}}
                        {{--<a href="/settings/noticeBoard">--}}
                           {{--<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>--}}
                           {{--<span class="pcoded-mtext">Noticeboard Management</span>--}}
                           {{--<span class="pcoded-mcaret"></span>--}}
                        {{--</a>--}}
                     {{--</li>--}}
                  @php
                 // }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==5){
                  @endphp
                     <li class=" ">
                        <a href="/settings/calenderManagement">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Calender Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==6){
                  @endphp
                     <li class=" ">
                        <a href="/settings/galleryMangement">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Gallery Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==7){
                  @endphp
                     <li class=" ">
                        <a href="/settings/teachersTestimonial">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Testimonial Management</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==8){
                  @endphp
                     <li class=" ">
                        <a href="/settings/teacherInfo">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Teacher Info</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==8){
                  @endphp
                     <li class=" ">
                        <a href="/settings/newsletterlog">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Nowsletter Log</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  if($role[$i]['roleName']==13 && $role[$i]['roleValue']==8){
                  @endphp
                     <li class=" ">
                        <a href="/settings/contactUsLog">
                           <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                           <span class="pcoded-mtext">Contact Us Log</span>
                           <span class="pcoded-mcaret"></span>
                        </a>
                     </li>
                  @php
                  }
                  }
               }
               @endphp

               </ul>
            </li>
      </ul>
      <div class="pcoded-navigation-label">Developed By...</div>
      <ul class="pcoded-item pcoded-left-item">
         <li class="">
            <a href="http://www.parallaxsoft.com/" target="_blank">
               <span class="pcoded-micon"><i class="fa fa-globe"></i><b>D</b></span>
               <span class="pcoded-mtext">Parallax Soft Inc.</span>
               <span class="pcoded-mcaret"></span>
            </a>
         </li>
      </ul>
   </div>
</nav>