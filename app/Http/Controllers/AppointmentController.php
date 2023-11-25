<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }

    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment);
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_datetime' => 'required|date',
        ]);

        $appointment = Appointment::create([
            'doctor_id' => $request->input('doctor_id'),
            'patient_id' => $request->input('patient_id'),
            'appointment_datetime' => $request->input('appointment_datetime'),
        ]);

        return response()->json($appointment, 201);
    }
}
