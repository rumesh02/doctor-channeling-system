<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\ChanneledDoctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Channel a doctor
    public function channel(Doctor $doctor)
    {
        ChanneledDoctor::create([
            'user_id' => auth()->id(),
            'doctor_id' => $doctor->id,
        ]);

        return redirect()->back()->with('success', 'Doctor channeled successfully!');
    }

    // Delete channeled doctor
    public function deleteChanneled($id)
    {
        $channeledDoctor = ChanneledDoctor::find($id);

        if ($channeledDoctor && $channeledDoctor->user_id === auth()->id()) {
            $channeledDoctor->delete();
            return redirect()->back()->with('success', 'Channeled doctor removed!');
        }

        return redirect()->back()->with('error', 'Unauthorized action!');
    }
}
