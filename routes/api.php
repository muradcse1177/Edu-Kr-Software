<?php
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::post('savedata', 'MainController@savedata');

    Route::post('listStudentType', 'MainController@getStudentTypeList');
    Route::post('listReligion', 'MainController@getReligionList');
    Route::post('listGender', 'MainController@getGenderList');
    Route::post('listBloodGroup', 'MainController@getBloodGroupList');
    Route::post('listCountry', 'MainController@getCountryList');

    Route::post('listDistrict', 'MainController@getDistrictList');
    Route::post('listUpazilla', 'MainController@getUpazillaList');
    Route::post('listThana', 'MainController@getThanaList');
    Route::post('listPostoffice', 'MainController@getPostofficeList');
    Route::post('listPhotoIdType', 'MainController@getPhotoIdType');
    Route::post('listFnfType', 'MainController@getFnfType');
    Route::post('listBoardNames', 'MainController@getBoardNames');

    Route::post('listSubjectNames', 'MainController@getSubjectNames');
    Route::post('listSession', 'MainController@getSessionList');
    Route::post('listMedium', 'MainController@getMediumList');
    Route::post('listVersion', 'MainController@getVersionList');
    Route::post('listShift', 'MainController@getShiftList');
    Route::post('listClass', 'MainController@getClassList');
    Route::post('listSection', 'MainController@getSectionList');
    Route::post('listGroup', 'MainController@getGroupList');
    Route::post('findClassId', 'MainController@getClassId');
    Route::post('saveClassInfo', 'MainController@storeClassInfo');
    Route::post('saveStdAddress', 'MainController@storeStdAddress');
    Route::post('saveFnfInfo', 'MainController@storeFnfInfo');
    Route::post('savePrevStudyInfo', 'MainController@storePrevStudyInfo');
    Route::post('saveStdAttendance', 'MainController@storeStdAttendance');


    Route::post('showStdInfo', 'MainController@showStudentInfo');
    Route::post('showStdAttendance', 'MainController@showStdAttendance');


//Murad
//Manage Attendance Student
    Route::post('studentAttendance', 'backend\studentController@studentAttendance');


//Hr Api Controller
    Route::post('insertDesignationName', 'backend\hrController@insertDesignationName');
    Route::post('showDesignationList', 'backend\hrController@showDesignationList');
    Route::post('editDesignationName', 'backend\hrController@editDesignationName');
    Route::post('deleteDesignationName', 'backend\hrController@deleteDesignationName');
    Route::post('searchEmployeeInfo', 'backend\hrController@searchEmployeeInfo');
    Route::post('upgradeEmployeeDesig', 'backend\hrController@upgradeEmployeeDesig');
    Route::post('insertleaveName', 'backend\hrController@insertleaveName');
    Route::post('showLeaveList', 'backend\hrController@showLeaveList');
    Route::post('editLeaveName', 'backend\hrController@editLeaveName');
    Route::post('deleteLeaveName', 'backend\hrController@deleteLeaveName');
    Route::post('assignEmployeeLeave', 'backend\hrController@assignEmployeeLeave');
    Route::post('showLeaveAssignList', 'backend\hrController@showLeaveAssignList');
    Route::post('editEmployeeLeave', 'backend\hrController@editEmployeeLeave');
    Route::post('insertTaxValue', 'backend\hrController@insertTaxValue');
    Route::post('showTaxList', 'backend\hrController@showTaxList');
    Route::post('editTaxValue', 'backend\hrController@editTaxValue');
    Route::post('showEmpList', 'backend\hrController@showEmpList');
    Route::post('addBaseSalary', 'backend\hrController@addBaseSalary');
    Route::post('searchemployeeId', 'backend\hrController@searchemployeeId');
    Route::post('editBaseSalary', 'backend\hrController@editBaseSalary');
    Route::post('htmltopdfSalary', array('as' => 'htmltopdfSalary', 'uses' => 'backend\hrController@htmltopdfSalary'));
    Route::post('insertNewAccount', 'backend\hrController@insertNewAccount');
    Route::post('showAccountList', 'backend\hrController@showAccountList');
    Route::post('insertTransaction', 'backend\hrController@insertTransaction');
    Route::post('accountTransaction', 'backend\hrController@accountTransaction');
    Route::post('insertRoleEmp', 'backend\hrController@insertRoleEmp');

//Setting Api Controller
    Route::post('insertSchoolInfo', 'backend\settingController@insertSchoolInfo');
    Route::post('showSchoolInfo', 'backend\settingController@showSchoolInfo');
    Route::post('editSchoolInfo', 'backend\settingController@editSchoolInfo');
    Route::post('insertSlideImage', 'backend\settingController@insertSlideImage');
    Route::post('showSliderImage', 'backend\settingController@showSliderImage');
    Route::post('editSlideImage', 'backend\settingController@editSlideImage');
    Route::post('deleteSliderImage', 'backend\settingController@deleteSliderImage');
    Route::post('insertMessage', 'backend\settingController@insertMessage');
    Route::post('showMessage', 'backend\settingController@showMessage');
    Route::post('editMessage', 'backend\settingController@editMessage');
    Route::post('deleteMessage', 'backend\settingController@deleteMessage');
    Route::post('insertNotice', 'backend\settingController@insertNotice');
    Route::post('showNotice', 'backend\settingController@showNotice');
    Route::post('editNotice', 'backend\settingController@editNotice');
    Route::post('deleteNotice', 'backend\settingController@deleteNotice');
    Route::post('insertEventDay', 'backend\settingController@insertEventDay');
    Route::post('showEvent', 'backend\settingController@showEvent');
    Route::post('editEvent', 'backend\settingController@editEvent');
    Route::post('deleteEvent', 'backend\settingController@deleteEvent');
    Route::post('insertGalleryFile', 'backend\settingController@insertGalleryFile');
    Route::post('showGallery', 'backend\settingController@showGallery');
    Route::post('editGallery', 'backend\settingController@editGallery');
    Route::post('deleteGallery', 'backend\settingController@deleteGallery');
    Route::post('insertTestimonial', 'backend\settingController@insertTestimonial');
    Route::post('showTestimonial', 'backend\settingController@showTestimonial');
    Route::post('editTestimonial', 'backend\settingController@editTestimonial');
    Route::post('deleteTestimonial', 'backend\settingController@deleteTestimonial');
    Route::post('insertTeacherInfo', 'backend\settingController@insertTeacherInfo');
    Route::post('showTeacherInfo', 'backend\settingController@showTeacherInfo');
    Route::post('editTeacherInfo', 'backend\settingController@editTeacherInfo');
    Route::post('deleteTeacherInfo', 'backend\settingController@deleteTeacherInfo');
    Route::post('insertNewsletter', 'backend\settingController@insertNewsletter');
    Route::post('insertContactUs', 'backend\settingController@insertContactUs');
    Route::post('showNewsletter', 'backend\settingController@showNewsletter');
    Route::post('showContactUs', 'backend\settingController@showContactUs');

//Fees Api Controller
    Route::post('insertFees', 'backend\feesController@insertFees');
    Route::post('showFessName', 'backend\feesController@showFessName');
    Route::post('getClassList', 'backend\feesController@getClassList');
    Route::post('insertFeesName', 'backend\feesController@insertFeesName');
    Route::post('getMonth', 'backend\feesController@getMonth');
    Route::post('getClassName', 'backend\feesController@getClassName');
    Route::post('getYear', 'backend\feesController@getYear');
    Route::get('showFeesList', 'backend\feesController@showFeesList');
    Route::post('editfeesAmount', 'backend\feesController@editfeesAmount');
    Route::post('editFeesStructure', 'backend\feesController@editFeesStructure');
    Route::post('deleteFees', 'backend\feesController@deleteFees');
    Route::post('insertFineSetup', 'backend\feesController@insertFineSetup');
    Route::post('showFineList', 'backend\feesController@showFineList');
    Route::post('editFineSet', 'backend\feesController@editFineSet');
    Route::post('deleteFeesSet', 'backend\feesController@deleteFeesSet');
    Route::post('billGenarator', 'backend\feesController@billGenarator');
    Route::post('getFeesSession', 'backend\feesController@getFeesSession');
    Route::post('getFeesYear', 'backend\feesController@getFeesYear');
    Route::post('billPayment', 'backend\feesController@billPayment');
    Route::post('searchTransaction', 'backend\feesController@searchTransaction');

//Library Api Controller
    Route::post('bookInsert', 'backend\libraryController@bookInsert');
    Route::post('searchBookInfo', 'backend\libraryController@searchBookInfo');
    Route::post('searchStudentInfo', 'backend\libraryController@searchStudentInfo');
    Route::post('bookAssign', 'backend\libraryController@bookAssign');
    Route::post('returnBook', 'backend\libraryController@returnBook');
    Route::post('libBooksTransaction', 'backend\libraryController@libBooksTransaction');
    Route::post('searchBookList', 'backend\libraryController@searchBookList');
    Route::post('bookUpdate', 'backend\libraryController@bookUpdate');
    Route::post('deleteBooks', 'backend\libraryController@deleteBooks');
    Route::post('insertLibFineSetup', 'backend\libraryController@insertLibFineSetup');
    Route::post('showFineInfoList', 'backend\libraryController@showFineInfoList');
    Route::post('editFineInfoSet', 'backend\libraryController@editFineInfoSet');
    Route::post('deleteFeesInfoSet', 'backend\libraryController@deleteFeesInfoSet');
    Route::post('libFineTransaction', 'backend\libraryController@libFineTransaction');

//Exam Api Controller
    Route::post('showExamList', 'backend\examController@showExamList');
    Route::post('insertExamSetup', 'backend\examController@insertExamSetup');
    Route::post('editExamSetup', 'backend\examController@editExamSetup');
    Route::post('deleteExamNameSet', 'backend\examController@deleteExamNameSet');
    Route::post('insertGradesetup', 'backend\examController@insertGradesetup');
    Route::post('showGradeList', 'backend\examController@showGradeList');
    Route::post('editGradeSetup', 'backend\examController@editGradeSetup');
    Route::post('deleteGradeSet', 'backend\examController@deleteGradeSet');
    Route::post('getClassNameExam', 'backend\examController@getClassNameExam');
    Route::post('gradeListSelect', 'backend\examController@gradeListSelect');
    Route::post('subjectListSelect', 'backend\examController@subjectListSelect');
    Route::post('showGradeListGroup', 'backend\examController@showGradeListGroup');
    Route::get('showSubjectListResult', 'backend\examController@showSubjectListResult');
    Route::post('updateExamInfo', 'backend\examController@updateExamInfo');
    Route::get('showExamDateTime', 'backend\examController@showExamDateTime');
    Route::post('updateExamDateTime', 'backend\examController@updateExamDateTime');
    Route::post('examList', 'backend\examController@examList');
    Route::post('getCourseList', 'backend\examController@getCourseList');
    Route::post('insertExaminationSetup', 'backend\examController@insertExaminationSetup');
    Route::post('insertExaminationMarksSetup', 'backend\examController@insertExaminationMarksSetup');
    Route::post('insertExaminationTimeSetup', 'backend\examController@insertExaminationTimeSetup');
    Route::post('getExamNameList', 'backend\examController@getExamNameList');
    Route::post('getclassNameList', 'backend\examController@getclassNameList');
    Route::post('getExamId', 'backend\examController@getExamId');
    Route::post('showExamUpdateData', 'backend\examController@showExamUpdateData');
    Route::post('teacherList', 'backend\examController@teacherList');


//Academic Api Controller
    Route::post('insertNewCourse', 'backend\academicController@insertNewCourse');
    Route::post('insertAcademicSession', 'backend\academicController@insertAcademicSession');
    Route::post('insertAcademicClass', 'backend\academicController@insertAcademicClass');
    Route::post('insertAcademicShift', 'backend\academicController@insertAcademicShift');
    Route::post('insertAcademicGroup', 'backend\academicController@insertAcademicGroup');
    Route::post('insertAcademicMedium', 'backend\academicController@insertAcademicMedium');
    Route::post('insertAcademicSection', 'backend\academicController@insertAcademicSection');
    Route::post('insertAcademicVersion', 'backend\academicController@insertAcademicVersion');
    Route::post('getSession', 'backend\academicController@getSession');
    Route::post('getMedium', 'backend\academicController@getMedium');
    Route::post('getVersion', 'backend\academicController@getVersion');
    Route::post('getShift', 'backend\academicController@getShift');
    Route::post('getSections', 'backend\academicController@getSections');
    Route::post('getClass', 'backend\academicController@getClass');
    Route::post('getGroup', 'backend\academicController@getGroup');
    Route::post('insertAcademicInfo', 'backend\academicController@insertAcademicInfo');
    Route::post('showClassInfoList', 'backend\academicController@showClassInfoList');
    Route::post('editAcademicInfo', 'backend\academicController@editAcademicInfo');
    Route::post('findSubjectList', 'backend\academicController@findSubjectList');
    Route::post('updateNewCourse', 'backend\academicController@updateNewCourse');
    Route::post('insertDayTypeSetup', 'backend\academicController@insertDayTypeSetup');
    Route::post('showDayList', 'backend\academicController@showDayList');
    Route::post('updateDayTypeSetup', 'backend\academicController@updateDayTypeSetup');
    Route::post('insertClassTime', 'backend\academicController@insertClassTime');
    Route::post('searchSubjectList', 'backend\academicController@searchSubjectList');
    Route::post('showSubListForPeriod', 'backend\academicController@showSubListForPeriod');
    Route::post('editPeriodList', 'backend\academicController@editPeriodList');
    Route::post('deletePeriodList', 'backend\academicController@deletePeriodList');
    Route::post('insertSubjectSettings', 'backend\academicController@insertSubjectSettings');
    Route::post('tiffinInfoList', 'backend\academicController@tiffinInfoList');
    Route::post('editTiffinList', 'backend\academicController@editTiffinList');
    Route::post('searchRoutine', 'backend\academicController@searchRoutine');

//Student Api Controller
    Route::post('searchStudentIdForSub', 'backend\studentController@searchStudentIdForSub');
    Route::post('insertCompulsorySub', 'backend\studentController@insertCompulsorySub');
    Route::post('insertOptionalSub', 'backend\studentController@insertOptionalSub');
    Route::post('showAllSubjectList', 'backend\studentController@showAllSubjectList');
    Route::post('updateSubjectType', 'backend\studentController@updateSubjectType');

//Notice Api Controller
    Route::post('insertNewNotice', 'backend\noticeController@insertNewNotice');
    Route::post('showAllNotice', 'backend\noticeController@showAllNotice');
    Route::post('editNewNotice', 'backend\noticeController@editNewNotice');
    Route::post('deleteNoticeList', 'backend\noticeController@deleteNoticeList');
    Route::get('editNotice1stStep', 'backend\noticeController@editNotice1stStep');

//Hostel Api Controller
    Route::post('insertNewHostel', 'backend\hostelController@insertNewHostel');
    Route::post('showHostelList', 'backend\hostelController@showHostelList');
    Route::post('editHostelList', 'backend\hostelController@editHostelList');
    Route::post('deleteHostelList', 'backend\hostelController@deleteHostelList');
    Route::post('getHostelName', 'backend\hostelController@getHostelName');
    Route::post('getHostelFloor', 'backend\hostelController@getHostelFloor');
    Route::post('insertRoomAllocation', 'backend\hostelController@insertRoomAllocation');
    Route::post('searchHostelStudentInfo', 'backend\hostelController@searchHostelStudentInfo');
    Route::post('terminateHostelStudent', 'backend\hostelController@terminateHostelStudent');
    Route::post('getHostelFloorList', 'backend\hostelController@getHostelFloorList');
    Route::post('getHostelRoom', 'backend\hostelController@getHostelRoom');
    Route::post('showHostelStudentList', 'backend\hostelController@showHostelStudentList');
    Route::post('editHosteStdInfo', 'backend\hostelController@editHosteStdInfo');
    Route::post('insertFeesHostel', 'backend\hostelController@insertFeesHostel');
    Route::post('getYearHostel', 'backend\hostelController@getYearHostel');
    Route::post('getMonthHostel', 'backend\hostelController@getMonthHostel');
    Route::get('showFeesListHostel', 'backend\hostelController@showFeesListHostel');
    Route::post('editfeesAmountHostel', 'backend\hostelController@editfeesAmountHostel');
    Route::post('billGenaratorHostel', 'backend\hostelController@billGenaratorHostel');
    Route::post('billPaymentHostel', 'backend\hostelController@billPaymentHostel');
    Route::post('searchTransactionHostel', 'backend\hostelController@searchTransactionHostel');


//Admission Api Controller
    Route::post('insertNewAdCircular', 'backend\admissionController@insertNewAdCircular');
    Route::post('showAllCircular', 'backend\admissionController@showAllCircular');
    Route::post('editNewCircular', 'backend\admissionController@editNewCircular');
    Route::post('deleteCircularList', 'backend\admissionController@deleteCircularList');
    Route::post('saveAdmissionAppInfo', 'backend\admissionController@saveAdmissionAppInfo');
    Route::post('makePdfApplicantProfile', 'backend\admissionController@makePdfApplicantProfile');
    Route::post('applicantLogin', 'backend\admissionController@applicantLogin');
    Route::post('applicantPanel', 'backend\admissionController@applicantPanel');
    Route::post('searchApplicant', 'backend\admissionController@searchApplicant');

//Employee Api Controller
    Route::post('listDesignationNames', 'backend\employeeController@listDesignationNames');
    Route::post('saveEmployeeInfo', 'backend\employeeController@saveEmployeeInfo');
    Route::post('saveEmpAddress', 'backend\employeeController@saveEmpAddress');
    Route::post('saveEmpFnfInfo', 'backend\employeeController@saveEmpFnfInfo');
    Route::post('saveEmpAcaSum', 'backend\employeeController@saveEmpAcaSum');
    Route::post('saveEmpTrainSum', 'backend\employeeController@saveEmpTrainSum');
    Route::post('showEmployeeList', 'backend\employeeController@showEmployeeList');
    Route::post('searchCourseAndTeacher', 'backend\employeeController@searchCourseAndTeacher');
    Route::post('assignSubTeacher', 'backend\employeeController@assignSubTeacher');
    Route::post('searchCourseTeacher', 'backend\employeeController@searchCourseTeacher');
    Route::post('editSubjectTeacher', 'backend\employeeController@editSubjectTeacher');
    Route::post('deleteSubTeacher', 'backend\employeeController@deleteSubTeacher');
    Route::post('teacherAttendance', 'backend\employeeController@teacherAttendance');
    Route::post('saveTeacherAttendance', 'backend\employeeController@saveTeacherAttendance');
    Route::post('searchEmpAttendance', 'backend\employeeController@searchEmpAttendance');

//Result Api Controller
    Route::post('showStudentListForMarkEntry', 'backend\resultController@showStudentListForMarkEntry');
    Route::post('showSubjectList', 'backend\resultController@showSubjectList');
    Route::post('showExamListResult', 'backend\resultController@showExamListResult');
    Route::post('insertResultStd', 'backend\resultController@insertResultStd');
    Route::get('xlsDownload', array('as' => 'xlsDownload', 'uses' => 'backend\resultController@xlsDownload'));
    Route::post('resultFileUpload', 'backend\resultController@resultFileUpload');
    Route::post('showStudentListForMarkEdit', 'backend\resultController@showStudentListForMarkEdit');
    Route::post('updateResultStd', 'backend\resultController@updateResultStd');
    Route::post('genaerateMarkSheet', 'backend\resultController@genaerateMarkSheet');
    Route::post('searchStdReasult', 'backend\resultController@searchStdReasult');
    Route::post('showResultDetails', 'backend\resultController@showResultDetails');

