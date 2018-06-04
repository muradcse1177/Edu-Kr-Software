<?php
session_start();
Route::get ( '/register', function () {
    return view ( 'register' );
});
Route::get ( '/login', function () {
    return view ( 'login' );
});
Route::post('/registerweb', 'backend\settingController@register');
Route::post('/loginweb', 'backend\settingController@login');
Route::get('/logout', 'backend\settingController@logout');
Route::get('/background-events', function () {
    return view('web/layout/background-events');
});

if(isset($_SESSION["username"])) {
    Route::get ( '/', function () {
        return view ( 'index' );
    });
    if (isset($_SESSION["role"]) && isset($_SESSION["designation"])) {
        Route::get('/indexadminpanel', function () {
            return view('indexadminpanel');
        });
        $role = $_SESSION["role"];
        for ($i = 0; $i < count($role); $i++) {

            if ($role[$i]['roleName'] == 1 && $role[$i]['roleValue'] == 1) {
                Route::get('/hr/designationManagement', 'frontend\pageController@designationManagement');
            }
            if ($role[$i]['roleName'] == 1 && $role[$i]['roleValue'] == 2) {
                Route::get('/hr/leaveManagement', 'frontend\pageController@leaveManagement');
            }
            if ($role[$i]['roleName'] == 1 && $role[$i]['roleValue'] == 3) {
                Route::get('/hr/accountManagement', 'frontend\pageController@accountManagement');
            }
            if ($role[$i]['roleName'] == 1 && $role[$i]['roleValue'] == 4) {
                Route::get('/hr/salaryManagement', 'frontend\pageController@salaryManagement');
                Route::get('/hr/addSalary', 'frontend\pageController@addSalary');
                Route::get('/hr/payslip', 'frontend\pageController@payslip');
            }
            if ($role[$i]['roleName'] == 1 && $role[$i]['roleValue'] == 5) {
                Route::get('/hr/taxManagement', 'frontend\pageController@taxManagement');
            }
            if ($role[$i]['roleName'] == 1 && $role[$i]['roleValue'] == 6) {
                Route::get('/hr/roleManagement', 'frontend\pageController@roleManagement');
            }
            if ($role[$i]['roleName'] == 2 && $role[$i]['roleValue'] == 1) {
                Route::get('/academic/academicCalander', 'frontend\pageController@academicCalander');
            }
            if ($role[$i]['roleName'] == 2 && $role[$i]['roleValue'] == 2) {
                Route::get('/academic/manageClass', 'frontend\pageController@manageClass');
            }
            if ($role[$i]['roleName'] == 2 && $role[$i]['roleValue'] == 3) {
                Route::get('/academic/manageCourse', 'frontend\pageController@manageCourse');
            }
            if ($role[$i]['roleName'] == 2 && $role[$i]['roleValue'] == 4) {
                Route::get('/academic/manageDay', 'frontend\pageController@manageDay');
                Route::get('/academic/mangePeriod', 'frontend\pageController@mangePeriod');
                Route::get('/academic/mangePeriodTime', 'frontend\pageController@mangePeriodTime');
            }
            if ($role[$i]['roleName'] == 2 && $role[$i]['roleValue'] == 6) {
                Route::get('/academic/routine', 'frontend\pageController@routine');
            }
            if ($role[$i]['roleName'] == 3 && $role[$i]['roleValue'] == 1) {
                Route::get('/teacher/create-new-profile', 'frontend\pageController@showtcnp');
            }
            if ($role[$i]['roleName'] == 3 && $role[$i]['roleValue'] == 2) {
                Route::get('/teacher/manage-profile', 'frontend\pageController@showstp');
            }
            if ($role[$i]['roleName'] == 3 && $role[$i]['roleValue'] == 3) {
                Route::get('/teacher/manageAttandanceTeacher', 'frontend\pageController@manageAttandanceTeacher');
                Route::get('/teacher/attandancereportTeacher', 'frontend\pageController@attandancereportTeacher');
            }
            if ($role[$i]['roleName'] == 3 && $role[$i]['roleValue'] == 4) {
                Route::get('/teacher/setCourseTeacher', 'frontend\pageController@setCourseTeacher');
                Route::get('/teacher/showCourseTeacher', 'frontend\pageController@showCourseTeacher');
            }
            if ($role[$i]['roleName'] == 4 && $role[$i]['roleValue'] == 1) {
                Route::get('/student/create-new-profile', 'frontend\pageController@showscnp');
            }
            if ($role[$i]['roleName'] == 4 && $role[$i]['roleValue'] == 2) {
                Route::get('/student/manage-profile', 'frontend\pageController@showssp');
            }
            if ($role[$i]['roleName'] == 4 && $role[$i]['roleValue'] == 3) {
                Route::get('/student/manat', 'frontend\pageController@showmanat');
                Route::get('/student/attre', 'frontend\pageController@showattre');
            }
            if ($role[$i]['roleName'] == 4 && $role[$i]['roleValue'] == 4) {
                Route::get('/student/setCourse', 'frontend\pageController@setCourse');
                Route::get('/student/showCourse', 'frontend\pageController@showCourse');

            }
            if ($role[$i]['roleName'] == 5 && $role[$i]['roleValue'] == 1) {
                Route::get('/admission/manageCircular', 'frontend\pageController@manageCircular');
            }
            if ($role[$i]['roleName'] == 5 && $role[$i]['roleValue'] == 2) {
                Route::get('/admission/applicantProfile', 'frontend\pageController@applicantProfile');
            }
            if ($role[$i]['roleName'] == 5 && $role[$i]['roleValue'] == 3) {
                Route::get('/admission/manageApplicant', 'frontend\pageController@manageApplicant');
            }
            if ($role[$i]['roleName'] == 5 && $role[$i]['roleValue'] == 4) {
                Route::get('/admission/applicantPanel', 'frontend\pageController@applicantPanel');
            }
            if ($role[$i]['roleName'] == 6 && $role[$i]['roleValue'] == 1) {
                Route::get('/examination/examType', 'frontend\pageController@examType');
            }
            if ($role[$i]['roleName'] == 6 && $role[$i]['roleValue'] == 2) {
                Route::get('/examination/manageGrade', 'frontend\pageController@manageGrade');
            }
            if ($role[$i]['roleName'] == 6 && $role[$i]['roleValue'] == 3) {
                Route::get('/examination/manageExam', 'frontend\pageController@manageExam');
            }
            if ($role[$i]['roleName'] == 7 && $role[$i]['roleValue'] == 1) {
                Route::get('/result/manageStudentMark', 'frontend\pageController@manageStudentMark');
            }
            if ($role[$i]['roleName'] == 7 && $role[$i]['roleValue'] == 2) {
                Route::get('/result/processExamResult', 'frontend\pageController@processExamResult');
            }
            if ($role[$i]['roleName'] == 7 && $role[$i]['roleValue'] == 3) {
                Route::get('/noticeboard/manageNotice', 'frontend\pageController@manageNotice');
            }
            if ($role[$i]['roleName'] == 8 && $role[$i]['roleValue'] == 1) {
                Route::get('/fees/academicFeesPanel', 'frontend\pageController@academicFeesPanel');
            }
            if ($role[$i]['roleName'] == 8 && $role[$i]['roleValue'] == 2) {
                Route::get('/fees/absLatFinCreate', 'frontend\pageController@absLatFinCreate');
            }
            if ($role[$i]['roleName'] == 8 && $role[$i]['roleValue'] == 3) {
                Route::get('/fees/feesTransactionDetails', 'frontend\pageController@feesTransactionDetails');
            }
            if ($role[$i]['roleName'] == 9 && $role[$i]['roleValue'] == 1) {
                Route::get('/library/barCodeGenerator', 'frontend\pageController@barCodeGenerator');
            }
            if ($role[$i]['roleName'] == 9 && $role[$i]['roleValue'] == 2) {
                Route::get('/library/assignBook', 'frontend\pageController@assignBook');
            }
            if ($role[$i]['roleName'] == 9 && $role[$i]['roleValue'] == 3) {
                Route::get('/library/returnBook', 'frontend\pageController@returnBook');
            }
            if ($role[$i]['roleName'] == 9 && $role[$i]['roleValue'] == 4) {
                Route::get('/library/transactionDetails', 'frontend\pageController@transactionDetails');
            }
            if ($role[$i]['roleName'] == 9 && $role[$i]['roleValue'] == 5) {
                Route::get('/library/bookList', 'frontend\pageController@bookList');
            }
            if ($role[$i]['roleName'] == 9 && $role[$i]['roleValue'] == 6) {
                Route::get('/library/libraryFineReport', 'frontend\pageController@libraryFineReport');
            }
            if ($role[$i]['roleName'] == 10 && $role[$i]['roleValue'] == 1) {
                Route::get('/hostel/createBuilding', 'frontend\pageController@createBuilding');
            }
            if ($role[$i]['roleName'] == 10 && $role[$i]['roleValue'] == 2) {
                Route::get('/hostel/allocateRoom', 'frontend\pageController@allocateRoom');
            }
            if ($role[$i]['roleName'] == 10 && $role[$i]['roleValue'] == 3) {
                Route::get('/hostel/terminateStudent', 'frontend\pageController@terminateStudent');
            }
            if ($role[$i]['roleName'] == 10 && $role[$i]['roleValue'] == 4) {
                Route::get('/hostel/studentList', 'frontend\pageController@studentList');
            }
            if ($role[$i]['roleName'] == 10 && $role[$i]['roleValue'] == 5) {
                Route::get('/hostel/hostelFeessPanel', 'frontend\pageController@hostelFeessPanel');
            }
            if ($role[$i]['roleName'] == 10 && $role[$i]['roleValue'] == 6) {
                Route::get('/hostel/transactionDetailsHostel', 'frontend\pageController@transactionDetailsHostel');
            }
            if ($role[$i]['roleName'] == 11 && $role[$i]['roleValue'] == 2) {
                Route::get('/transport/createTransport', 'frontend\pageController@createTransport');
            }
            if ($role[$i]['roleName'] == 11 && $role[$i]['roleValue'] == 3) {
                Route::get('/transport/assignSTTransport', 'frontend\pageController@assignSTTransport');
            }
            if ($role[$i]['roleName'] == 11 && $role[$i]['roleValue'] == 4) {
                Route::get('/transport/terminaTetransport', 'frontend\pageController@terminaTetransport');
            }
            if ($role[$i]['roleName'] == 11 && $role[$i]['roleValue'] == 5) {
                Route::get('/transport/transportationDetails', 'frontend\pageController@transportationDetails');
            }
            if ($role[$i]['roleName'] == 11 && $role[$i]['roleValue'] == 6) {
                Route::get('/transport/transTranDetails', 'frontend\pageController@transTranDetails');
            }
            if ($role[$i]['roleName'] == 12 && $role[$i]['roleValue'] == 1) {
                Route::get('/sms/sendSmsAllStudent', 'frontend\pageController@sendSmsAllStudent');
                Route::get('/sms/sendSmsSingleStudent', 'frontend\pageController@sendSmsSingleStudent');
                Route::get('/sms/sendSmsClassWiseStudent', 'frontend\pageController@sendSmsClassWiseStudent');
            }
            if ($role[$i]['roleName'] == 12 && $role[$i]['roleValue'] == 2) {
                Route::get('/sms/sendSmsAllTeacher', 'frontend\pageController@sendSmsAllTeacher');
                Route::get('/sms/sendSmsSingleTeacher', 'frontend\pageController@sendSmsSingleTeacher');
                Route::get('/sms/sendSmsDeptWiseTeacher', 'frontend\pageController@sendSmsDeptWiseTeacher');
            }
            if ($role[$i]['roleName'] == 12 && $role[$i]['roleValue'] == 3) {
                Route::get('/sms/sendSmsAllEmployee', 'frontend\pageController@sendSmsAllEmployee');
                Route::get('/sms/sendSmsSingleEmployee', 'frontend\pageController@sendSmsSingleEmployee');
                Route::get('/sms/sendSmsDeptWiseEmployee', 'frontend\pageController@sendSmsDeptWiseEmployee');
            }
            if ($role[$i]['roleName'] == 13 && $role[$i]['roleValue'] == 1) {
                Route::get('/settings/schoolInfo', 'frontend\pageController@schoolInfo');
            }
            if ($role[$i]['roleName'] == 13 && $role[$i]['roleValue'] == 2) {
                Route::get('/settings/bannerImg', 'frontend\pageController@bannerImg');
            }
            if ($role[$i]['roleName'] == 13 && $role[$i]['roleValue'] == 3) {
                Route::get('/settings/principalMessage', 'frontend\pageController@principalMessage');
            }
            if ($role[$i]['roleName'] == 13 && $role[$i]['roleValue'] == 4) {
                Route::get('/settings/noticeBoard', 'frontend\pageController@noticeBoard');
            }
            if ($role[$i]['roleName'] == 13 && $role[$i]['roleValue'] == 5) {
                Route::get('/settings/calenderManagement', 'frontend\pageController@calenderManagement');
            }
            if ($role[$i]['roleName'] == 13 && $role[$i]['roleValue'] == 6) {
                Route::get('/settings/galleryMangement', 'frontend\pageController@galleryMangement');
            }
            if ($role[$i]['roleName'] == 13 && $role[$i]['roleValue'] == 7) {
                Route::get('/settings/teachersTestimonial', 'frontend\pageController@teachersTestimonial');
            }
            if ($role[$i]['roleName'] == 13 && $role[$i]['roleValue'] == 8) {
                Route::get('/settings/teacherInfo', 'frontend\pageController@teacherInfo');
                Route::get('/settings/contactUsLog', 'frontend\pageController@contactUsLog');
                Route::get('/settings/newsletterlog', 'frontend\pageController@newsletterlog');
            }
        }
    }
}
else{
    if($_SERVER['REQUEST_URI']='/'){
        Route::get ( '/', function () {
            return view ( 'index' );
        });
    }
    else{
        $actual_link = $_SERVER['REQUEST_URI'];
        Route::get($actual_link, function () {
            return view('login',['msg' => 'Session are not set.Please login.']);
        });
    }
}

//Admission.............................................................................................
    Route::get('/admission/userLogin', 'frontend\pageController@userLogin');

//Export  Purpose.......................................................................................
    Route::get('htmltopdfview', array('as' => 'htmltopdfview', 'uses' => 'ProductController@htmltopdfview'));
    Route::get('/htmltoexcel', array('as' => 'htmltoexcel', 'uses' => 'ProductController@downloadExcel'));
    Route::get('/htmltopdf', array('as' => 'htmltopdf', 'uses' => 'backend\admissionController@makePdfApplicantProfile'));
    Route::get('/pdfApplicantProfile', array('as' => 'pdfApplicantProfile', 'uses' => 'backend\admissionController@pdfApplicantProfile'));
    Route::get('/pdfAdmitCard', array('as' => 'pdfAdmitCard', 'uses' => 'backend\admissionController@pdfAdmitCard'));
    Route::post('/manageApplicant/dowloadAppliProfile', array('as' => 'dowloadAppliProfile', 'uses' => 'backend\admissionController@dowloadAppliProfile'));
    Route::get('generate-pdf', 'ProductController@pdfview')->name('generate-pdf');
    Route::get('xlsDownload', array('as' => 'xlsDownload', 'uses' => 'backend\resultController@xlsDownload'));
    Route::get('noticeDownload', array('as' => 'noticeDownload', 'uses' => 'backend\noticeController@noticeDownload'));

