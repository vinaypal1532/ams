<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\Listofholiday;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employee-dashboard', [App\Http\Controllers\HomeController::class, 'teacher_index'])->name('employee-dashboard');
Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');


Route::group(['middleware' => ['auth', 'user-access']], function () {
   
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
 
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

;

 Route::get('emp-list', [TeamController::class, 'index'])->name('emp-list');
 Route::get('add_emp', [TeamController::class, 'create'])->name('add_emp'); 
 Route::post('add_teacherData', [TeamController::class, 'store'])->name('add_teacherData');
 Route::get('teacher_edit/{id}', [TeamController::class, 'edit'])->name('teacher_edit');
 Route::put('update_teacher/{id}', [TeamController::class, 'update'])->name('update_teacher'); 
 Route::delete('user_delete/{id}', [TeamController::class, 'destroy'])->name('user_delete');

 Route::get('emp/{user}', [TeamController::class, 'show'])->name('emp.show');

 Route::get('leave', [LeaveController::class, 'index'])->name('leave');
 Route::get('add_leave', [LeaveController::class, 'create'])->name('add_leave'); 
 Route::post('leave/store', [LeaveController::class, 'store'])->name('leave.store');
 Route::get('leave_edit/{id}', [LeaveController::class, 'edit'])->name('leave_edit');
 Route::put('/leave/{leave}', [LeaveController::class, 'update'])->name('leave.update');

 Route::delete('/leave/{leave}', [LeaveController::class, 'destroy'])->name('leave.destroy');
 Route::get('profile', [HomeController::class, 'profile'])->name('profile');

 Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance');  
 Route::get('add_attendance', [AttendanceController::class, 'create'])->name('add_attendance');  
 Route::get('edit_attendence/{id}', [AttendanceController::class, 'edit'])->name('edit_attendence');
 Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
 Route::get('attendance_calender', [AttendanceController::class, 'show'])->name('attendance_calender');  
 Route::put('/attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');
 Route::delete('/attendance/{attendance}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');
 Route::get('/attendance/download', [AttendanceController::class, 'downloadAttendance'])->name('attendance.download');

 Route::get('payslips', [PayslipController::class, 'index'])->name('payslips.index');
 Route::get('payslips/create', [PayslipController::class, 'create'])->name('payslips.create');
 Route::post('payslips', [PayslipController::class, 'store'])->name('payslips.store');
 Route::get('payslips/{payslip}', [PayslipController::class, 'show'])->name('payslips.show');
 Route::get('payslips/{payslip}/edit', [PayslipController::class, 'edit'])->name('payslips.edit');
 Route::put('payslips/{payslip}', [PayslipController::class, 'update'])->name('payslips.update');
 Route::delete('payslips/{payslip}', [PayslipController::class, 'destroy'])->name('payslips.destroy');
 Route::get('/payslip/{id}/download', [PayslipController::class, 'downloadPayslip'])->name('payslip.download');
 
 Route::get('listofholiday', [Listofholiday::class, 'index'])->name('listofholiday.index');
 Route::get('holiday/create', [Listofholiday::class, 'create'])->name('holiday.create');
 Route::post('holidays', [Listofholiday::class, 'store'])->name('holidays.store');
 Route::get('holiday_edit/{id}', [Listofholiday::class, 'edit'])->name('holiday_edit');
 Route::put('/listofholiday/{id}', [Listofholiday::class, 'update'])->name('listofholiday.update');
 Route::delete('/holiday/{id}', [Listofholiday::class, 'destroy'])->name('holiday.destroy');
});

Auth::routes();