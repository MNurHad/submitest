<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CutiController;

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
// routes auth
Route::post('login/proses', [App\Http\Controllers\Auth\LoginController::class, 'actionLogin'])->name('action.login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('sysadmin/employee', EmployeeController::class);
    Route::resource('sysadmin/cuti', CutiController::class);
    // route no resource
    Route::get('/sysadmin/employees/member', [App\Http\Controllers\CutiController::class, 'employeeMember'])->name('employee.member');
    Route::get('/sysadmin/cutis/aktif', [App\Http\Controllers\CutiController::class, 'cutiAktif'])->name('cuti.aktif');
    Route::get('/sysadmin/cutis/lebih', [App\Http\Controllers\CutiController::class, 'cutiLebih'])->name('cuti.lebih');
    Route::get('/sysadmin/cutis/sisa', [App\Http\Controllers\CutiController::class, 'cutiSisa'])->name('cuti.sisa');
});
