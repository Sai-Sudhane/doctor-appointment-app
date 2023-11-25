<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    public function login(Request $request)
   {
    $email = $request->input('email');

    $patient = Patient::where('email', $email)->first();

    if ($patient) {
        // Authentication successful
        $token = $patient->createToken('authToken')->accessToken;
        return response()->json(['token' => $token,'patient'=> $patient], 201);
    } else {
        // Authentication failed
        $msg = "Patient not found";
        return response()->json(['error' => $msg], 404);
    }
   }
 

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $patient = Patient::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return response()->json($patient, 201);
    }
}
