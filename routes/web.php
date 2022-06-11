<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authentications;
use App\Http\Middleware\UserAdmin;
use App\Http\Middleware\UserDokter;
use App\Http\Middleware\UserKasir;
use App\Http\Middleware\UserPetugas;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\User;
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

Route::get('/login', [AuthController::class, 'getLoginPage']);
Route::post('/login', [AuthController::class, 'postLoginForm']);

Route::middleware([Authentications::class])->group(function () {
    Route::get('/', function () {
        $currentDate = date('Y-m-d');
        $data = [
            'count_users' => User::all()->count(),
            'count_patients_today' => Patient::where('created_at', '>=', $currentDate)->count(),
            'count_patients_month' => Patient::where('created_at', '>=', date('Y-m'))->count(),
            'count_medicines' => Medicine::all()->count()
        ];

        return view('dashboard', $data);
    });

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::middleware([UserAdmin::class])->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/add', [UserController::class, 'getAddUserPage']);
        Route::post('/users/add', [UserController::class, 'postAddUserForm']);
        Route::get('/users/edit/{id}', [UserController::class, 'getEditUserPage']);
        Route::post('/users/edit/{id}', [UserController::class, 'postEditUserForm']);
        Route::get('/users/delete/{id}', [UserController::class, 'postDeleteUserForm']);

        Route::get('/medicines', [MedicineController::class, 'index']);
        Route::get('/medicines/add', [MedicineController::class, 'getAddMedicinePage']);
        Route::post('/medicines/add', [MedicineController::class, 'postAddMedicineForm']);
        Route::get('/medicines/edit/{id}', [MedicineController::class, 'getEditMedicinePage']);
        Route::post('/medicines/edit/{id}', [MedicineController::class, 'postEditMedicineForm']);
        Route::get('/medicines/delete/{id}', [MedicineController::class, 'postDeleteMedicineForm']);
    });

    Route::middleware([UserDokter::class])->group(function () {
        Route::get('/records', [RecordController::class, 'index']);
        Route::post('/records/add', [RecordController::class, 'postAddRecordForm']);
        Route::get('/records/views', [RecordController::class, 'getRecordViewPage']);
        Route::get('/records/views/{patient_id}', [RecordController::class, 'getPatientRecordDetailPage']);
        Route::get('/records/views/delete/{id}', [RecordController::class, 'postDeletePatientRecord']);
    });

    Route::middleware([UserPetugas::class])->group(function () {
        Route::get('/patients/registration', [PatientController::class, 'index']);
        Route::get('patients/registration/all', [PatientController::class, 'getViewAllPatientPage']);
        Route::get('/patients/registration/add', [PatientController::class, 'getAddPatientPage']);
        Route::post('/patients/registration/add', [PatientController::class, 'postAddPatientForm']);
        Route::get('/patients/registration/edit/{id}', [PatientController::class, 'getEditPatientPage']);
        Route::post('/patients/registration/edit/{id}', [PatientController::class, 'postEditPatientForm']);
        Route::get('/patients/registration/delete/{id}', [PatientController::class, 'postDeletePatientForm']);
    });


    Route::middleware([UserKasir::class])->group(function () {
        Route::get('/payments', [PaymentController::class, 'index']);
        Route::get('/payments/all', [PaymentController::class, 'getViewAllPaymentPage']);
        Route::get('/payments/add', [PaymentController::class, 'getAddPaymentPage']);
        Route::get('/payments/update/{id}', [PaymentController::class, 'getUpdatePaymentStatus']);
    });
});
