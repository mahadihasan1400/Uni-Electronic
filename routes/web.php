<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Hash;


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
    //return view('welcome');

$oldpass = Hash::make('123456');
$newpass = '123456';

var_dump(Hash::check($newpass,$oldpass));





});

Route::get('users/login', [UsersController::class, 'login'])->name('users.login');
Route::post('users/save', [UsersController::class, 'save'])->name('users.save');

Route::post('super/admin/signin', [SuperAdminController::class, 'superAdminSignin'])->name('super.admin.signin');
Route::get('/super/admin/logout',[SuperAdminController::class, 'logout'])->name('super.admin.logout');


Route::group(['middleware'=>['SuperAdminAuthCheck']], function(){
    Route::get('super/admin/login', [SuperAdminController::class, 'superAdminLogin'])->name('super.admin.login');
    Route::get('super/admin/data/save/first/time', [SuperAdminController::class, 'superAdminDataSave'])->name('super.admin.data.save');

    Route::get('super/admin/dashboard',[SuperAdminController::class, 'superAdminDashboard'])->name('super.admin.dashboard');
    Route::get('generate/pdf', [PDFController::class, 'generatePDF'])->name('generate.PDF');
    Route::get('appointment/list', [SuperAdminController::class, 'appointmentList'])->name('appointment.list');
    Route::get('generate/appointment/pdf', [PDFController::class, 'generateAppointmentPDF'])->name('generate.appointment.PDF');
    Route::get('appointment/approve/{id}', [SuperAdminController::class, 'approveAppointment'])->name('appointment.approve');
    Route::post('users/approved/appointment/save', [SuperAdminController::class, 'saveApprovedAppointment'])->name('approved.appointment.save');
    Route::get('approved/appointment/list', [SuperAdminController::class, 'approveAppointmentList'])->name('appointment.approve.list');
    Route::get('generate/approved/appointment/pdf', [PDFController::class, 'generateApprovedAppointmentPDF'])->name('generate.approved.appointment.PDF');
    Route::get('appointment/delete/{id}', [SuperAdminController::class, 'deleteAppointment'])->name('appointment.delete');


});

Route::get('users/appointment', [UsersController::class, 'usersAppointment'])->name('users.appointment');
Route::post('users/appointment/save', [UsersController::class, 'saveAppointment'])->name('appointment.save');




