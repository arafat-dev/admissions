<?php

use App\Http\Controllers\adminStudentController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeesHeadController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\NewFeeController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\Student\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\Auth\LoginController;
use App\Http\Controllers\Student\Auth\RegisterController;
use App\Http\Controllers\Student\Auth\ResetPasswordController;
use App\Http\Controllers\Student\Auth\VerificationController;

Route::get('/student', [HomeController::class,'home'])->name('student.dashboard');

Route::get('/', [HomeController::class,'home'])->name('student.home');

// Login
Route::controller(LoginController::class)->group(function(){
    Route::get('student/login', 'showLoginForm')->name('student.login');
    Route::post('student/login', 'login');
    Route::get('student/logout', 'logout')->name('student.logout');
});

// Register
Route::controller(RegisterController::class)->group(function(){
    Route::get('student/register', 'showRegistrationForm')->name('student.register');
    Route::post('student/register', 'register');
});

// Passwords
Route::controller(ForgotPasswordController::class)->group(function(){
    Route::post('password/email', 'sendResetLinkEmail')->name('student.password.email');
    Route::get('password/reset', 'showLinkRequestForm')->name('student.password.request');
});

Route::controller(ResetPasswordController::class)->group(function(){
    Route::post('password/reset', 'reset');
    Route::get('password/reset/{token}', 'showResetForm')->name('student.password.reset');
});

// Must verify email
Route::controller(VerificationController::class)->group(function(){
    Route::get('email/verify', 'show')->name('student.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'verify')->name('student.verification.verify');
    Route::post('email/resend', 'resend')->name('student.verification.resend');
});


Route::get('/optimize', function () {
   Artisan::call('optimize:clear');
   return redirect('/');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    // return view('web_front.home');
    return redirect('/student');
});
Route::get('/login', function () {
    return redirect('/student');
});
Route::get('contact', function () {
    return view('web_front.contact');
});

Route::controller(FeedbackController::class)->group(function(){
    Route::get('feedback/create', 'create')->name('feedback/create');
    Route::post('feedbacks.store', 'store')->name('feedbacks.store');
});


Route::group(['middleware' => ['auth:admin']], function () {

	Route::get('feedbacks/index', [FeedbackController::class,'index'])->name('feedbacks.index');
	Route::resource('boards', BoardController::class);
	Route::resource('genders', GenderController::class);
	Route::resource('categories', CategoryController::class);
	Route::resource('courses', CourseController::class);
	Route::resource('feesheads', FeesHeadController::class);
	Route::resource('religions', ReligionController::class);
	Route::resource('admin_students', adminStudentController::class);
	Route::resource('newfees', NewFeeController::class);
	// Route::get('getSMSBalance','adminStudentController@getSMSBalance')->name('getSMSBalance');
	// Route::get('displayStudentApplication/{application}','adminStudentController@showStudentApplication')->name('displayStudentApplication');

});/* End Of Route::group admin*/

Route::group(['middleware' => ['auth:student']], function () {
	// Route::post('ApplicationStore','AdmissionApplicationController@store')->name('ApplicationStore');
	// Route::post('ApplicationUpdateAgree','AdmissionApplicationController@UpdateAgree')->name('ApplicationUpdateAgree');
	// Route::post('ApplicationUpdatePersonal','AdmissionApplicationController@UpdatePersonal')->name('ApplicationUpdatePersonal');
	// Route::post('ApplicationUpdateProfessional','AdmissionApplicationController@UpdateProfessional')->name('ApplicationUpdateProfessional');
	// Route::post('ApplicationUpdateUpload','AdmissionApplicationController@UpdateUpload')->name('ApplicationUpdateUpload');
	// Route::post('ApplicationUpdateSubjects','AdmissionApplicationController@UpdateSubjects')->name('ApplicationUpdateSubjects');
	// Route::post('generateOTP','AdmissionApplicationController@generateOTP')->name('generateOTP');
	// Route::post('verifyOTP','AdmissionApplicationController@verifyOTP')->name('verifyOTP');
	// Route::get('resendOTP','Student\AdmissionApplicationController@resendOTP')->name('resendOTP');

    //New Features
    Route::controller(HomeController::class)->group(function(){
        //Profile
        Route::post('save-profile','saveProfile')->name('profile.save');
        //Programs
        Route::get('programs','programs')->name('programs.index');
        Route::post('save-programs','savePrograms')->name('programs.save');
        //qualifications
        Route::get('qualifications','qualifications')->name('qualifications.index');
        Route::post('save-qualifications','saveQualifications')->name('qualifications.save');
        //documents
        Route::get('documents','documents')->name('documents.index');
        Route::post('save-documents','saveDocuments')->name('documents.save');
        //facilities
        Route::get('facilities','facilities')->name('facilities.index');
        Route::post('save-facilities','saveFacilities')->name('facilities.save');
        //submit
        Route::get('submit','submit')->name('submit.index');
        Route::post('save-submit','saveSubmit')->name('submit.save');
        //downloads
        Route::get('downloads','downloads')->name('downloads.index');
        Route::post('save-downloads','saveDownloads')->name('downloads.save');

        Route::get('/download-pdf-online-application', 'downloadOnlineApplicationPDF')->name('downloadPDF.onlineapplication');

        Route::get('/scholarship-percent', 'scholarshipPercent')->name('scholarship.percent');
    });

	// Route::get('ApplicationUpdateEdit','AdmissionApplicationController@UpdateEdit')->name('ApplicationUpdateEdit');
	// Route::get('displayApplication/{application}','AdmissionApplicationController@show')->name('displayApplication');

});/* End Of Route::group student*/

