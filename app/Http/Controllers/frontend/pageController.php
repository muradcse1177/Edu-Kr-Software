<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class pageController extends Controller
{
    //Hr..................................................
    public function designationManagement()
    {
        return View('hr.designationManagement');
    }
    public function leaveManagement()
    {
        return View('hr.leaveManagement');
    }
    public function salaryManagement()
    {
        return View('hr.salaryManagement');
    }
    public function taxManagement()
    {
        return View('hr.taxManagement');
    }
    public function addSalary()
    {
        return View('hr.addSalary');
    }
    public function payslip()
    {
        return View('hr.payslip');
    }
    public function loanManagement()
    {
        return View('hr.loanManagement');
    }
    public function accountManagement()
    {
        return View('hr.accountManagement');
    }
    public function roleManagement()
    {
        return View('hr.roleManagement');
    }

//Academic......................................................
    public function academicCalander()
    {
        return View('academic.academicCalander');
    }
    public function manageDay()
    {
        return View('academic.manageDay');
    }
    public function mangePeriod()
    {
        return View('academic.mangePeriod');
    }
    public function mangePeriodTime()
    {
        return View('academic.mangePeriodTime');
    }
    public function manageClass()
    {
        return View('academic.manageClass');
    }
    public function manageCourse()
    {
        return View('academic.manageCourse');
    }
    public function routine()
    {
        return View('academic.routine');
    }


    //student.............................................
    public function showscnp()
    {
        return View('student.std_create_new_profile');
    }
	public function showssp()
	{
		return View('student.std_show_profile');
	}
    public function showmanat()
    {
        return View('student.manage_attendance');
    }
    public function showattre()
    {
        return View('student.attendance_report');
    }
    public function setCourse()
    {
        return View('student.setCourse');
    }
    public function showCourse()
    {
        return View('student.showCourse');
    }


	//Teacher.............................................
    public function showtcnp()
    {
        return View('teacher.tec_create_new_profile');
    }
    public function showstp()
    {
        return View('teacher.show_teacher_profile');
    }
    public function manageAttandanceTeacher()
    {
        return View('teacher.manageAttandanceTeacher');
    }
    public function attandancereportTeacher()
    {
        return View('teacher.attandancereportTeacher');
    }
    public function setCourseTeacher()
    {
        return View('teacher.setCourseTeacher');
    }
    public function showCourseTeacher()
    {
        return View('teacher.showCourseTeacher');
    }

//Stuff................................................................
    public function showsscnp()
    {
        return View('stuff.tec_create_new_profile');
    }
    public function showsstp()
    {
        return View('stuff.show_teacher_profile');
    }
    public function manageattendanceStuff()
    {
        return View('stuff.manageattendanceStuff');
    }
    public function attandanceReportStuff()
    {
        return View('stuff.attandanceReportStuff');
    }

//Admission...............................................................
    public function manageCircular()
    {
        return View('admission.manageCircular');
    }
    public function applicantProfile()
    {
        return View('admission.applicantProfile');
    }
    public function manageApplicant()
    {
        return View('admission.manageApplicant');
    }
    public function userLogin()
    {
        return View('admission.userLogin');
    }



    //Examination.....................................................
    public function examType()
    {
        return View('examination.examType');
    }
    public function manageGrade()
    {
        return View('examination.manageGrade');
    }
    public function manageExam()
    {
        return View('examination.manageExam');
    }

//Result.................................................................
    public function manageStudentMark()
    {
        return View('result.manageStudentMark');
    }
    public function processExamResult()
    {
        return View('result.processExamResult');
    }


    //Noticeboard..........................................................
    public function manageNotice()
    {
        return View('noticeboard.manageNotice');
    }

//Fees.........................................................................
    public function academicFeesPanel()
    {
        return View('fees.academicFeesPanel');
    }
    public function absLatFinCreate()
    {
        return View('fees.absLatFinCreate');
    }
    public function feesTransactionDetails()
    {
        return View('fees.feesTransactionDetails');
    }

    //Library...........................................................................
    public function barCodeGenerator()
    {
        return View('library.barCodeGenerator');
    }
    public function assignBook()
    {
        return View('library.assignBook');
    }
    public function transactionDetails()
    {
        return View('library.transactionDetails');
    }
    public function returnBook()
    {
        return View('library.returnBook');
    }
    public function bookList()
    {
        return View('library.bookList');
    }
    public function libraryFineReport()
    {
        return View('library.libraryFineReport');
    }

    //Hostel........................................................................
    public function createBuilding()
    {
        return View('hostel.createBuilding');
    }
    public function allocateRoom()
    {
        return View('hostel.allocateRoom');
    }
    public function terminateStudent()
    {
        return View('hostel.terminateStudent');
    }
    public function studentList()
    {
        return View('hostel.studentList');
    }
    public function hostelFeessPanel()
    {
        return View('hostel.hostelFeessPanel');
    }
    public function transactionDetailsHostel()
    {
        return View('hostel.transactionDetailsHostel');
    }

//Transport...............................................................
    public function createTransport()
    {
        return View('transport.createTransport');
    }
    public function assignSTTransport()
    {
        return View('transport.assignSTTransport');
    }
    public function terminaTetransport()
    {
        return View('transport.terminaTetransport');
    }
    public function transportationDetails()
    {
        return View('transport.transportationDetails');
    }
    public function transTranDetails()
    {
        return View('transport.transTranDetails');
    }

//Sms.......................................................................................

    public function sendSmsAllStudent()
    {
        return View('sms.sendSmsAllStudent');
    }
    public function sendSmsSingleStudent()
    {
        return View('sms.sendSmsSingleStudent');
    }

    public function sendSmsClassWiseStudent()
    {
        return View('sms.sendSmsClassWiseStudent');
    }
    public function sendSmsAllTeacher()
    {
        return View('sms.sendSmsAllTeacher');
    }
    public function sendSmsSingleTeacher()
    {
        return View('sms.sendSmsSingleTeacher');
    }
    public function sendSmsDeptWiseTeacher()
    {
        return View('sms.sendSmsDeptWiseTeacher');
    }
    public function sendSmsAllEmployee()
    {
        return View('sms.sendSmsAllEmployee');
    }
    public function sendSmsSingleEmployee()
    {
        return View('sms.sendSmsSingleEmployee');
    }
    public function sendSmsDeptWiseEmployee()
    {
        return View('sms.sendSmsDeptWiseEmployee');
    }

    //Settings.......................................................................

    public function schoolInfo()
    {
        return View('settings.schoolInfo');
    }
    public function bannerImg()
    {
        return View('settings.bannerImg');
    }
    public function principalMessage()
    {
        return View('settings.principalMessage');
    }
    public function noticeBoard()
    {
        return View('settings.noticeBoard');
    }
    public function calenderManagement()
    {
        return View('settings.calenderManagement');
    }
    public function galleryMangement()
    {
        return View('settings.galleryMangement');
    }
    public function teachersTestimonial()
    {
        return View('settings.teachersTestimonial');
    }
    public function teacherInfo()
    {
        return View('settings.teacherInfo');
    }
    public function contactUsLog()
    {
        return View('settings.contactUsLog');
    }
    public function newsletterlog()
    {
        return View('settings.newsletterlog');
    }

}
