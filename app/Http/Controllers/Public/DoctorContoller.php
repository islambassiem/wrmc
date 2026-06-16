<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\View\View;

class DoctorContoller extends Controller
{
    public function __invoke(Doctor $doctor): View
    {
        return view('pages.public.doctors.index', [
            'doctor' => $doctor,
        ]);
    }
}
