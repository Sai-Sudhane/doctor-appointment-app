<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return response()->json($doctor,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'specialization' => 'required|string',
        ]);

        $doctor = Doctor::create([
            'name' => $request->input('name'),
            'specialization' => $request->input('specialization'),
        ]);

        return response()->json($doctor, 201);
    }

}
