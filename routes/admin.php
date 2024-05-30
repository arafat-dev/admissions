<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ReportsController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\AssignFeesController;
use App\Http\Controllers\admin\ProgramAdmissionController;
use App\Http\Controllers\admin\ProgramTypeController;
use App\Http\Controllers\admin\ScholarshipController;
use App\Http\Controllers\admin\SessionController;
use App\Http\Controllers\admin\StudentProfileController;
use App\Http\Controllers\admin\TransportRouteController;
use App\Http\Controllers\admin\TutionFeesController;
use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return redirect('/');
});


Route::name('admin.')->group(function () {

    Route::get('/', [LoginRegisterController::class, 'login'])->name('login');

    Route::controller(LoginRegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
    });

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard');

        Route::get('/tution/fees', [TutionFeesController::class, 'index'])->name('tution.fees');
        Route::get('/reports', [ReportsController::class, 'index'])->name('reports');

        Route::controller(AssignFeesController::class)->prefix('assign/fees')->group(function () {
            Route::get('/{id?}', 'index')->name('assign.fees');
            Route::post('/store/{programType}', 'store')->name('assign.fees.store');
            Route::post('/update/{programeFee}', 'update')->name('assign.fees.update');
            Route::get('/delete/{programeFee}', 'destroy')->name('assign.fees.delete');
        });

        Route::controller(StudentController::class)->prefix('student')->group(function () {
            Route::get('/active', 'index')->name('student.active');
            Route::get('/archieve', 'archievedStudent')->name('student.archieve');
            Route::get('/hostel/record', 'hotelRecord')->name('student.hostel.record');
        });

        Route::controller(StudentProfileController::class)->prefix('student')->group(function () {
            Route::get('/{admissionApplication}/profile', 'index')->name('student.profile.index');
            Route::post('/{admissionApplication}/profile/update', 'profileUpdate')->name('student.profile.update');

            Route::get('/{admissionApplication}/document', 'document')->name('student.profile.document');
            Route::post('/{admissionApplication}/document/store', 'documentUpdate')->name('student.profile.document.update');

            Route::get('/{admissionApplication}/generate-pay-slip', 'generatePaySlip')->name('student.profile.generatepayslip');
            Route::post('/{admissionApplication}/generate-pay-slip', 'generatePaySlipUpdate')->name('student.profile.generatepayslip.update');

            Route::get('/{admissionApplication}/submit-fee-receipts', 'submitFeeReceipt')->name('student.profile.submitfeereceipt');
            Route::post('/{admissionApplication}/submit-fee-receipts', 'submitFeeReceiptFile')->name('student.profile.submitfeereceipt.update');

            Route::get('/{admissionApplication}/promote', 'promote')->name('student.profile.promote');
            Route::post('/{admissionApplication}/promote', 'promoteUpdate')->name('student.profile.promote.update');

            Route::get('/{admissionApplication}/deactivate', 'deactivate')->name('student.profile.deactivate');
            Route::post('/{admissionApplication}/deactivate', 'deactivateUpdate')->name('student.profile.deactivate.update');


            Route::get('/{admissionApplication}/archive', 'archive')->name('student.profile.archive');
            Route::post('/{admissionApplication}/archive', 'archiveUpdate')->name('student.profile.archive.update');
        });

        Route::controller(TransportRouteController::class)->prefix('transport/route')->group(function () {
            Route::get('/', 'index')->name('transport.route');
            Route::post('/store', 'store')->name('transport.route.store');
            Route::post('/update/{transportRoute}', 'update')->name('transport.route.update');
            Route::get('/delete/{transportRoute}', 'destroy')->name('transport.route.delete');
        });

        Route::controller(SessionController::class)->prefix('session')->group(function () {
            Route::get('/', 'index')->name('session');
            Route::post('/store', 'store')->name('session.store');
            Route::post('/update/{session}', 'update')->name('session.update');
            Route::get('/delete/{session}', 'destroy')->name('session.delete');
        });

        Route::controller(ProgramAdmissionController::class)->prefix('program/admission')->group(function () {
            Route::get('/', 'index')->name('program.admission');
            Route::post('/store', 'store')->name('program.admission.store');
            Route::post('/update/{programAdmission}', 'update')->name('program.admission.update');
            Route::get('/delete/{programAdmission}', 'destroy')->name('program.admission.delete');
        });

        Route::controller(ScholarshipController::class)->prefix('scholarship')->group(function () {
            Route::get('/', 'index')->name('scholarship');
            Route::post('/store', 'store')->name('scholarship.store');
            Route::post('/update/{scholarship}', 'update')->name('scholarship.update');
            Route::get('/delete/{scholarship}', 'destroy')->name('scholarship.delete');
        });

        Route::controller(ProgramTypeController::class)->prefix('programtype')->group(function () {
            Route::get('/', 'index')->name('programtype');
            Route::post('/store', 'store')->name('programtype.store');
            Route::post('/update/{programType}', 'update')->name('programtype.update');
            Route::get('/delete/{programType}', 'destroy')->name('programtype.delete');
        });

        Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
    });
});
