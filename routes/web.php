<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
})->name('/');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/students', App\Http\Livewire\All\Students::class)->name('students');
    Route::get('/bulk-student-upload', App\Http\Livewire\Modals\BulkStudent::class)->name('bulk-student-upload');
    Route::get('/teachers', App\Http\Livewire\All\Teachers::class)->name('teachers');
    Route::get('/notifications', App\Http\Livewire\All\Notifications::class)->name('notifications');;
    Route::get('/class-arm', App\Http\Livewire\All\Arms::class)->name('class-arm');
    Route::get('/mails', App\Http\Livewire\All\MailBlasts::class)->name('mails');
    Route::get('/guardians', App\Http\Livewire\All\Guardians::class)->name('guardians');
    Route::get('/admins', App\Http\Livewire\All\Admins::class)->name('admins');
    Route::get('/complains', App\Http\Livewire\All\Complains::class)->name('complains');
    Route::get('/subjects', App\Http\Livewire\All\Subjects::class)->name('subjects');
    Route::get('/assign-subjects', App\Http\Livewire\Modals\AssignSubject::class)->name('assign-subjects');
    Route::get('/add-unit', [App\Http\Controllers\HomeController::class, 'addUnit'])->name('add-unit');
    Route::post('/create-unit', [App\Http\Controllers\HomeController::class, 'createUnit'])->name('create-unit');
    Route::post('/edit-unit', [App\Http\Controllers\HomeController::class, 'editUnit'])->name('edit-unit');
    Route::post('/delete-unit', [App\Http\Controllers\HomeController::class, 'deleteUnit'])->name('delete-unit');
    Route::get('/classes', App\Http\Livewire\All\Classes::class)->name('classes');
    Route::get('/sections', App\Http\Livewire\All\Sections::class)->name('sections');
    Route::get('/terms', App\Http\Livewire\All\Terms::class)->name('terms');
    Route::get('/fees', App\Http\Livewire\All\Fees::class)->name('fees');
    Route::get('/my-profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('my-profile');
    Route::get('/result-upload', App\Http\Livewire\Modals\Result::class)->name('result-upload');
    Route::get('/view-result/{id}', [App\Http\Controllers\HomeController::class, 'viewStudentResult'])->name('view-student-result');
    Route::get('/view-result', [App\Http\Controllers\HomeController::class, 'viewResult'])->name('view-result');
    Route::post('/my-result', [App\Http\Controllers\HomeController::class, 'getStudentResult'])->name('my-result');

    Route::get('/admin/view-result', [App\Http\Controllers\HomeController::class, 'adminViewResult'])->name('admin/view-result');
    Route::post('/admin/all-result', [App\Http\Controllers\HomeController::class, 'adminGetStudentResult'])->name('admin/all-result');
    /**payment routes */
    Route::get('/fee-payment', [App\Http\Controllers\PaymentController::class, 'paymentForm'])->name('fee-payment');
    Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'initialize'])->name('pay');
    Route::get('/all-payments', [App\Http\Controllers\PaymentController::class, 'allFees'])->name('all-payments');
    Route::get('/verify/{id}', [App\Http\Controllers\PaymentController::class, 'verify']);
    Route::get('/verify-confirmed', [App\Http\Controllers\PaymentController::class, 'confirmed'])->name('verify-confirmed');
});
