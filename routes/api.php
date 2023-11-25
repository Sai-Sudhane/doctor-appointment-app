<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\WebhookController;



Route::prefix('api')->group(function () {
    Route::post('/webhook/salesiq', [WebhookController::class, 'handleSalesIQWebhook']);

    Route::get('/doctors', [DoctorController::class, 'index']);
    Route::get('/doctors/{id}', [DoctorController::class, 'show']);
    Route::post('/doctorRegister', [DoctorController::class, 'store']);

    Route::get('/patients', [PatientController::class, 'index']);
    Route::post('/patientsLogin', [PatientController::class, 'login']);
    Route::post('/patientRegister', [PatientController::class, 'store']);

    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
    Route::post('/appointmentStore', [AppointmentController::class, 'store']);
});
