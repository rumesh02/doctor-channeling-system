<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\ChanneledDoctor;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get all doctors
        $doctors = Doctor::all();

        // Get channeled doctors for the logged-in user
        $channeledDoctors = ChanneledDoctor::with('doctor')
            ->where('user_id', Auth::id())
            ->get();

        // Get the role of the logged-in user
        $user = Auth::user();
        $role = $user->roles->first(); // Assuming each user has one role

        return view('dashboard', compact('doctors', 'channeledDoctors', 'role'));
    }
}
