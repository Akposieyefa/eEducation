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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/students', App\Http\Livewire\All\Students::class)->name('students');
Route::get('/teachers', App\Http\Livewire\All\Teachers::class)->name('teachers');
Route::get('/notifications', App\Http\Livewire\All\Notifications::class)->name('notifications');
Route::get('/class', App\Http\Livewire\All\Arms::class)->name('class');
Route::get('/mails', App\Http\Livewire\All\MailBlasts::class)->name('mails');
Route::get('/guardians', App\Http\Livewire\All\Guardians::class)->name('guardians');
Route::get('/admins', App\Http\Livewire\All\Admins::class)->name('admins');

