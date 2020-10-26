<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
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
    return view('pages.home');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function(){
    Route::resources([
        'patients' => PatientController::class,
        'doctors' => DoctorController::class,
        'services' => ServiceController::class,

    ]);
    Route::resource('employees', EmployeeController::class)->middleware('superadmin');
    Route::get('patients/confirm-delete/{patient}',[PatientController::class, 'confirmDelete'])->name('patients.confirm-delete');
    Route::get('doctors/confirm-delete/{doctor}',[DoctorController::class, 'confirmDelete'])->name('doctors.confirm-delete');
    Route::get('services/confirm-delete/{service}',[ServiceController::class, 'confirmDelete'])->name('services.confirm-delete');
    Route::get('employees/confirm-delete/{employee}',[EmployeeController::class, 'confirmDelete'])->name('employees.confirm-delete')->middleware('superadmin');
});
