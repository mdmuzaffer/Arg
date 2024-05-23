<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginSocialController;
use App\Http\Controllers\Auth\AuthOtpController;
use App\Http\Controllers\{
    HomeController,
    TestController,
    FacebookController,
    PatientController,
    PushnotificationController,
    UserscheduleController,
    DoctorController,
    InternController,
    InternPatientController,
    DoctorPatientController,
    LangSwitchController,
    ForgetPassword
};

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('adminLogin');
});

Route::get('/mytest', function () {
    echo phpinfo();
});

Route::match(['get','post'],'/forget-password', [ForgetPassword::class, 'index'])->name('forget.password');

Route::get('/test', [HomeController::class, 'index']);
Route::get('/privacy-policy', [TestController::class, 'privacy']);
Route::get('/service', [TestController::class, 'policy']);
Auth::routes();


Route::group(['middleware' => ['admin']],function(){
    Route::get('dashboard',[HomeController::class, 'index'])->name('dashboard');
    Route::get('profile',[HomeController::class, 'profileAdmin'])->name('adminProfile');
    Route::post('admin-password-change',[HomeController::class, 'adminPasswordChange'])->name('adminPasswordChange');
    Route::post('admin-profile-update',[HomeController::class, 'adminProfileUpdate'])->name('adminProfileUpdate');
    Route::get('doctors',[HomeController::class, 'doctors'])->name('doctors');

    Route::get('doctors/{id?}', [HomeController::class, 'doctorView'])->name('doctorview');
    Route::get('doctor-delete/{id?}', [HomeController::class, 'doctorDelete'])->name('doctorDelete');
    Route::match(['get','post'],'doctor-add', [HomeController::class, 'doctoradd'])->name('doctoradd');
    Route::match(['get','post'],'doctor-update/{id}', [HomeController::class, 'doctorupdate'])->name('doctorupdate');

    //confilic url
    Route::get('interns',[HomeController::class, 'interns'])->name('interns');
    Route::get('interns/{id?}',[HomeController::class, 'internView'])->name('internView');
    Route::get('intern-delete/{id?}',[HomeController::class, 'internDelete'])->name('internDelete');
    Route::match(['get','post'],'intern-add',[HomeController::class, 'internAdd'])->name('addInterns');
    Route::match(['get','post'],'intern-update/{id}',[HomeController::class, 'internUpdate'])->name('internUpdate');

    Route::get('patients',[HomeController::class, 'patients'])->name('patients');

    Route::get('departments',[HomeController::class, 'Department'])->name('departments');
    Route::match(['get','post'],'add-department/{id?}',[HomeController::class, 'addDepartment'])->name('addDepartment');
    Route::match(['get','post'],'delete-department/{id}',[HomeController::class, 'deleteDepartment'])->name('deleteDepartment');

    Route::get('sections',[HomeController::class, 'Sections'])->name('sections');
    Route::match(['get','post'],'add-section/{id?}',[HomeController::class, 'addSection'])->name('addSection');
    Route::match(['get','post'],'delete-section/{id}',[HomeController::class, 'deleteSection'])->name('deleteSection');

    Route::get('therapy',[HomeController::class, 'Therapy'])->name('therapy');
    Route::get('slider',[HomeController::class, 'HomeSlider'])->name('homeslider');

    Route::get('weekly-schedule',[HomeController::class, 'weeklySchedule'])->name('weeklyschedule');
    Route::match(['get','post'],'add-weekly-schedule/{id?}',[HomeController::class, 'addweeklySchedule'])->name('addweeklyschedule');

    Route::match(['get','post'],'delete-day-therapy/{id?}',[HomeController::class, 'deletedayTherapy'])->name('deleteTherapyweekly');

    Route::match(['get','post'],'day-schedule/{id?}',[HomeController::class, 'daySchedule'])->name('daySchedule');

    //Slider
    Route::match(['get','post'],'slider-update/{id?}',[HomeController::class, 'sliderUpdate'])->name('sliderUpdate');
    Route::match(['get','post'],'add-slider',[HomeController::class, 'addSlider'])->name('addSlider');
    Route::match(['get','post'],'delete-slider/{id}',[HomeController::class, 'sliderDelete'])->name('sliderDelete');
    Route::match(['get','post'],'view-slider/{id}',[HomeController::class, 'viewSlider'])->name('viewSlider');

    //Therapy
    Route::match(['get','post'],'add-therapy/{id?}',[HomeController::class, 'addTherapy'])->name('addTherapy');
    Route::match(['get','post'],'delete-therapy/{id?}',[HomeController::class, 'deleteTherapy'])->name('deleteTherapy');

    // accommodation
    Route::match(['get','post'],'accommodation',[HomeController::class, 'accommodation'])->name('accommodation');
    Route::match(['get','post'],'add-accommodation/{id?}',[HomeController::class, 'addAccommodation'])->name('addAccommodation');
    Route::match(['get','post'],'delete-accommodation/{id?}',[HomeController::class, 'deleteAccommodation'])->name('deleteAccommodation');

    //Route::get('user-profile/{id}',[PatientController::class, 'userProfile'])->name('userProfile');
    Route::get('user-profile-update/{id}',[PatientController::class, 'userProfileUpdate'])->name('userProfileUpdate');
    Route::get('all-patients',[PatientController::class, 'allPatients'])->name('allPatients');

    Route::get('user-profile-approve/{id}',[PatientController::class, 'userProfileApprove'])->name('userProfileApprove');
    Route::get('deny-patients',[PatientController::class, 'Denypatients'])->name('Denypatients');
    Route::get('notification',[PushnotificationController::class, 'notification'])->name('notification');
    Route::post('sendnotification',[PushnotificationController::class, 'sendnotification'])->name('sendnotification');

    //Route::get('user-schedule/{id}',[UserscheduleController::class, 'userSchedule'])->name('userSchedule');
    Route::post('usertherapyschedule',[UserscheduleController::class, 'usertherapyschedule'])->name('usertherapyschedule');

    Route::post('userVisite',[UserscheduleController::class, 'userVisite'])->name('userVisite');
    Route::post('getTharapistWithdepartment',[UserscheduleController::class, 'getTharapistWithdepartment'])->name('getTharapistWithdepartment');
    Route::post('userTharapy',[UserscheduleController::class, 'userTharapy'])->name('userTharapy');
    Route::post('userDiets',[UserscheduleController::class, 'userDiets'])->name('userDiets');
    Route::post('userTreatmentpdfUploadfile',[UserscheduleController::class, 'userTreatmentpdfUploadfile'])->name('userTreatmentpdfUploadfile');

    //Route::match(['get','post'],'user-section-update/{id}',[PatientController::class, 'userSectionUpdate'])->name('userSectionUpdate');

    //User department 
    Route::get('approve-department',[PatientController::class, 'approveDepartment'])->name('approveDepartment');
    Route::get('decline-department',[PatientController::class, 'declineDepartment'])->name('declineDepartment');
    //Route::get('/user-department-pending',[PatientController::class, 'patientDepartmentPending'])->name('userDepartmentPending');
    Route::get('/inactive-patients',[PatientController::class, 'inactivePatients'])->name('inactivePatients');
    Route::get('approve-patients',[PatientController::class, 'approvePatients'])->name('approvePatients');

    //App Icone
    Route::match(['get','post'],'app-icone',[HomeController::class, 'appconeList'])->name('appIcone');
    Route::match(['get','post'],'add-appicone/{id?}',[HomeController::class, 'addAppicone'])->name('addAppicone');
    Route::match(['get','post'],'delete-appicone/{id?}',[HomeController::class, 'deleteAppicone'])->name('deleteAppicone');

    //Languages
    Route::match(['get','post'],'app-language',[HomeController::class, 'appLanguages'])->name('appLanguages');
    Route::match(['get','post'],'add-language/{id?}',[HomeController::class, 'addLanguage'])->name('addLanguage');
    Route::match(['get','post'],'delete-language/{id?}',[HomeController::class, 'deleteLanguage'])->name('deleteLanguage');

    // Payment details
    Route::match(['get','post'],'payment-detail',[HomeController::class, 'paymentDetails'])->name('paymentDetail');
    Route::match(['get','post'],'add-payment/{id?}',[HomeController::class, 'addPayment'])->name('addPayment');
    Route::match(['get','post'],'delete-payment/{id?}',[HomeController::class, 'deletePayment'])->name('deletePayment');


    // Tereapist
    Route::get('therapist',[HomeController::class, 'therapist'])->name('therapist');
    Route::match(['get','post'],'therapist-add',[HomeController::class, 'addTherapists'])->name('addTherapist');
    Route::match(['get','post'],'therapist-update/{id}',[HomeController::class, 'therapistsUpdate'])->name('therapistUpdate');
    Route::get('therapist/{id?}',[HomeController::class, 'therapistsView'])->name('therapistView');
    Route::get('therapist-delete/{id?}',[HomeController::class, 'therapistsDelete'])->name('therapistDelete');
    Route::get('users-log',[HomeController::class, 'usersLog'])->name('usersLog');


});

Route::group(['middleware' => ['doctor'],'prefix' => 'doctor'],function(){
    Route::get('/',[DoctorController::class, 'index'])->name('doctor');
    Route::match(['get','post'],'/profile',[DoctorController::class, 'DoctorProfile'])->name('doctor.profile');
    Route::post('/doctor-password-change',[DoctorController::class, 'doctorPasswordChange'])->name('doctorPasswordChange');
    Route::post('/profile-image-delete',[DoctorController::class, 'doctotprofileImageDelete'])->name('doctotprofileImageDelete');

    //Patient
    Route::get('/approve-patients',[DoctorPatientController::class, 'doctorapprovePatients'])->name('doctor.approvePatients');
    Route::get('/inactive-patient',[DoctorPatientController::class, 'doctorDenypatients'])->name('doctor.Denypatients');

    Route::get('/patient-profile-update/{id}',[DoctorPatientController::class, 'doctorProfileUpdate'])->name('doctor.patientProfileUpdate');
    Route::get('patient-profile-approve/{id}',[DoctorPatientController::class, 'doctorProfileApprove'])->name('doctorProfileApprove');
    Route::get('/patient-profile/{id}',[DoctorPatientController::class, 'doctorInternProfile'])->name('doctor.userProfile');
    Route::match(['get','post'],'/patient-department-update/{id}',[DoctorPatientController::class, 'doctorDepartmentUpdate'])->name('doctor.patientDepartmentUpdate');
    Route::get('all-patients',[DoctorPatientController::class, 'doctorallPatients'])->name('doctorallPatients');

    // patient
     Route::get('/patient-department-pending',[DoctorPatientController::class, 'patientDepartmentPending'])->name('doctor.userDepartmentPending');
     Route::get('/approve-department',[DoctorPatientController::class, 'approveDepartment'])->name('doctor.approveDepartment');
     Route::get('/decline-department',[DoctorPatientController::class, 'declineDepartment'])->name('doctor.declineDepartment');
    //patient schedule
     Route::get('/patient-schedule/{id}',[DoctorPatientController::class, 'userSchedule'])->name('doctor.userSchedule');
});



Route::group(['middleware' => ['intern'], 'prefix' => 'intern'],function(){
    Route::get('/',[InternController::class, 'index'])->name('intern');
    Route::match(['get','post'],'/profile',[InternController::class, 'InternProfile'])->name('intern.profile');
    Route::post('/intern-password-change',[InternController::class, 'internPasswordChange'])->name('internPasswordChange');
    Route::post('/profile-image-delete',[InternController::class, 'profileImageDelete'])->name('profileImageDelete');

    //Patient 
    Route::get('/patient-profile-update/{id}',[InternPatientController::class, 'patientProfileUpdate'])->name('intern.patientProfileUpdate');
    Route::get('/patient-profile-approve/{id}',[InternPatientController::class, 'patientProfileApprove'])->name('patientProfileApprove');
    Route::get('/patient-profile/{id}',[InternPatientController::class, 'patientProfile'])->name('intern.userProfile');
    Route::match(['get','post'],'/patient-department-update/{id}',[InternPatientController::class, 'patientDepartmentUpdate'])->name('intern.patientDepartmentUpdate');
    Route::get('all-patients',[InternPatientController::class, 'internallPatients'])->name('internallPatients');

    //patient
    Route::get('/patient-department-pending',[InternPatientController::class, 'patientDepartmentPending'])->name('intern.userDepartmentPending');
    Route::get('/approve-department',[InternPatientController::class, 'approveDepartment'])->name('intern.approveDepartment');
    Route::get('/decline-department',[InternPatientController::class, 'declineDepartment'])->name('intern.declineDepartment');
    Route::get('/inactive-patient',[InternPatientController::class, 'doctorDenypatients'])->name('intern.Denypatients');
    Route::get('/approve-patients',[InternPatientController::class, 'internapprovePatients'])->name('intern.approvePatients');

    //patient schedule
    Route::get('/patient-schedule/{id}',[InternPatientController::class, 'userSchedule'])->name('intern.userSchedule');

});


Route::match(['get','post'],'/patientsection-status',[HomeController::class, 'patientsectionStatus'])->name('patientsectionStatus');
Route::match(['get','post'],'/therapyasDepartment',[HomeController::class, 'therapyasDepartment'])->name('therapyasDepartment');
Route::match(['get','post'],'/therapyasDepartmentwithGroup',[HomeController::class, 'therapyasDepartmentwithGroup'])->name('therapyasDepartmentwithGroup');
Route::match(['get','post'],'/patientschedule-assign',[UserscheduleController::class, 'patientscheduleAssign'])->name('patientscheduleAssign');

Route::match(['get','post'],'/delete-patient-therapy',[UserscheduleController::class, 'deletePatientTherapy'])->name('deletePatientTherapy');
Route::match(['get','post'],'/delete-multiple-therapy',[UserscheduleController::class, 'deletemultipletTherapy'])->name('deletemultiTherapy');

Route::match(['get','post'],'/patient-daily-reports/{id?}',[UserscheduleController::class, 'patientDailyReport'])->name('patientDailyReport');
Route::match(['get','post'],'/patient-case-details/{id?}',[UserscheduleController::class, 'patientCaseDetails'])->name('patientCaseDetails');
Route::match(['get','post'],'/patient-daily-update/{id}',[UserscheduleController::class, 'patientDailyreportUpdate'])->name('patientDailyreportUpdate');
Route::match(['get','post'],'/patient-daily-delete/{id}',[UserscheduleController::class, 'patientDailyreportDelete'])->name('patientDailyreportDelete');

Route::match(['get','post'],'/patient-case-detail-view/{id}',[UserscheduleController::class, 'patientCasedetailView'])->name('patientCasedetailView');
Route::match(['get','post'],'/patient-case-detail-update/{id}',[UserscheduleController::class, 'patientCasedetailUpdate'])->name('patientCasedetailUpdate');
Route::match(['get','post'],'/patient-case-detail-delete/{id}',[UserscheduleController::class, 'patientCasedetailDelete'])->name('patientCasedetailDelete');

// working on 7 septomber in admin 
Route::get('/patient-details',[PatientController::class, 'patientDetailsWithfilter'])->name('userDepartmentPending');
Route::match(['get','post'],'/search-therapy',[UserscheduleController::class, 'searchTherapy'])->name('searchTherapy');
Route::get('user-schedule/{id}',[UserscheduleController::class, 'userSchedule'])->name('userSchedule');
Route::get('user-profile/{id}',[PatientController::class, 'userProfile'])->name('userProfile');
Route::match(['get','post'],'/user-deparment-vanue',[UserscheduleController::class, 'userDeparmentVanue'])->name('userDeparmentVanue');
Route::match(['get','post'],'/patient-status-change',[PatientController::class, 'patienttatusChange'])->name('patienttatusChange');
Route::match(['get','post'],'/patient-all-therapy/{id}',[UserscheduleController::class, 'patientallTherapy'])->name('patientallTherapy');

Route::post('langSwitch', [LangSwitchController::class, 'switchLanguage'])->name('langSwitch');
Route::match(['get','post'],'user-section-update/{id}',[PatientController::class, 'userSectionUpdate'])->name('userSectionUpdate');


//sociale login
//Google
Route::get('/login/google', [LoginSocialController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginSocialController::class, 'handleGoogleCallback']);

//Facebook
Route::controller(FacebookController::class)->group(function(){
    Route::get('/auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('/auth/facebook/callback', 'handleFacebookCallback');
});

Route::controller(AuthOtpController::class)->group(function(){
    Route::get('otp/login', 'login')->name('otp.login');
    Route::post('otp/generate', 'generate')->name('otp.generate');
    Route::get('otp/verification/{user_id}', 'verification')->name('otp.verification');
    Route::post('otp/login', 'loginWithOtp')->name('otp.getlogin');
});