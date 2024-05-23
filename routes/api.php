<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    ApiController,
    LoginSocialController,
    ForgetPasswordController,
    HomeandsliderController,
    UserTreatmentController,
    CasedetailController,
    SummerydetailController,
    WhatsAppController,
    PatientdefaultdailychartController,
};

//use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('mobile-login', [ApiController::class, 'mobileAuthenticate']);
Route::post('mobile-otp', [ApiController::class, 'loginWithMobileOtp']);
Route::post('register', [ApiController::class, 'register']);
Route::post('forget-password',[ForgetPasswordController::class, 'ForgetPassword']);
Route::post('varify-password-otp',[ForgetPasswordController::class, 'varifyPasswordOtp']);
Route::post('whatsapp-login', [WhatsAppController::class, 'whatsappAuthenticate']);
// Translate language api
Route::get('langTranslate', [HomeandsliderController::class, 'langTranslate'])->name('langTranslate');

//sociale login
//Google
//Route::get('/login/google', [LoginSocialController::class, 'redirectToGoogle'])->name('login.google');
//Route::get('/login/google/callback', [LoginSocialController::class, 'handleGoogleCallback']);
//Facebook
//Route::get('/login/facebook', [LoginSocialController::class, 'redirectToFacebook'])->name('login.facebook');
//Route::get('/login/facebook/callback', [LoginSocialController::class, 'handleFacebookCallback']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('user', [ApiController::class, 'get_user']);
    Route::get('user-detail', [ApiController::class, 'userDetail']);
    Route::post('profile-update', [ApiController::class, 'profileUpdate']);
    Route::post('profile-edit', [ApiController::class, 'profileEdit']);
    Route::post('department-update', [ApiController::class, 'departmentUpdate']);
    Route::get('department', [ApiController::class, 'getDepartment']);
    Route::get('state', [ApiController::class, 'getStates']);
    Route::get('language', [ApiController::class, 'getLanguage']);
    Route::get('accommodation', [ApiController::class, 'getAccommodation']);
    Route::get('country', [ApiController::class, 'getCountry']);
    Route::get('getallprofileupdatedata', [ApiController::class, 'getAllProfileUdateData']);
    Route::post('chagePassword',[ForgetPasswordController::class, 'chagePassword'])->name('changepassword');
    Route::get('getallSliderdata', [HomeandsliderController::class, 'getallSliderdata'])->name('slider');
    Route::get('getalldepartmentdata', [HomeandsliderController::class, 'getalldepartmentdata'])->name('department');
    Route::get('homedata', [HomeandsliderController::class, 'HomeData'])->name('homedata');
    Route::get('dailySchedule', [HomeandsliderController::class, 'dailySchedule'])->name('dailySchedule');
    Route::get('dailychart', [HomeandsliderController::class, 'dailychart'])->name('dailychart');
    Route::get('userdietchart', [HomeandsliderController::class, 'userdietchart'])->name('userdietchart');
    Route::get('usertreatment', [UserTreatmentController::class,'usertreatment'])->name('usertreatment');
    Route::get('departmentWiseChart', [UserTreatmentController::class,'departmentWiseChart'])->name('departmentWiseChart');
    Route::post('devicetokenUpdate', [ApiController::class,'devicetokenUpdate'])->name('devicetokenUpdate');
    Route::get('getNotifications', [HomeandsliderController::class, 'getNotifications'])->name('getNotifications');
    Route::get('dailyfoodChart', [HomeandsliderController::class, 'DailyfoodChart'])->name('DailyfoodChart');
    Route::get('dailyReport', [UserTreatmentController::class, 'dailyReport'])->name('dailyReport');
    //Route::get('userWeeklyReport', [UserTreatmentController::class, 'userWeeklyReport'])->name('userWeeklyReport');
    Route::get('CaseDetails', [CasedetailController::class, 'CaseDetails'])->name('CaseDetails');
    Route::get('summaryDetails', [SummerydetailController::class, 'summaryDetails'])->name('summaryDetails');
    Route::post('userTreatmentpdfUpload', [SummerydetailController::class, 'userTreatmentpdfUpload'])->name('userTreatmentpdfUpload');
    Route::get('settings', [SummerydetailController::class, 'Settings'])->name('settings');
    Route::post('payment', [CasedetailController::class, 'Payment'])->name('payment');
    Route::get('paymentDetails', [CasedetailController::class, 'paymentDetails'])->name('paymentDetails');     
    Route::get('paymentWeekly', [CasedetailController::class, 'paymentWeekly'])->name('paymentWeekly');
    Route::get('profileDetails', [CasedetailController::class, 'UserprofileDetails'])->name('profileDetails');
    Route::get('PaymentDropdownOption', [CasedetailController::class, 'PaymentDropdownOption'])->name('PaymentDropdownOption');
    Route::post('notificationStatus', [HomeandsliderController::class, 'notificationStatus'])->name('notificationStatus');
    Route::get('defaultdailychart', [PatientdefaultdailychartController::class, 'defaultdailychart'])->name('default.dailychart');
    Route::get('maplocation', [PatientdefaultdailychartController::class, 'mapLonglat'])->name('map.location');
    Route::get('languageGet', [HomeandsliderController::class, 'languageGet'])->name('languageGet');
    Route::post('changeLanguage', [HomeandsliderController::class, 'changeLanguage'])->name('changeLanguage');
    Route::post('users-log', [ApiController::class, 'usersLog'])->name('userlog');
    
});



