<?php

namespace App\Http\Controllers;

use App\Actions\CreateDoctorAction;
use App\Actions\UpdateDoctorAction;
use App\Data\DoctorData;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use Carbon\CarbonImmutable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $doctors = Doctor::query()
            ->select('id', 'name', 'slug', 'title', 'image', 'resignation_date')
            ->get();

        return view('pages.doctors.index', [
            'doctors' => $doctors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request): RedirectResponse
    {
        resolve(CreateDoctorAction::class)->handle(
            new DoctorData(
                name: $request->string('name'),
                title: $request->string('title'),
                email: $request->string('email'),
                joining_date: $request->date('joining_date') ? CarbonImmutable::parse($request->date('joining_date')) : null,
                resignation_date: $request->date('resignation_date') ? CarbonImmutable::parse($request->date('resignation_date')) : null,
                mobile_phone: $request->string('mobile_phone'),
                office_phone: $request->string('office_phone'),
                bio: $request->string('bio'),
                image: $request->file('image'),
                education: $request->string('education'),
                board_certifications: $request->string('board_certifications'),
                field_of_expertise: $request->string('field_of_expertise'),
                years_of_experience: $request->integer('years_of_experience'),
                quote: $request->string('quote'),
            )
        );

        return to_route('doctors.index')
            ->with('success', 'Doctor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor): View
    {
        return view('pages.doctors.edit', [
            'doctor' => $doctor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor): RedirectResponse
    {
        resolve(UpdateDoctorAction::class)->handle(
            new DoctorData(
                name: $request->string('name'),
                title: $request->string('title'),
                email: $request->string('email'),
                joining_date: $request->date('joining_date') ? CarbonImmutable::parse($request->date('joining_date')) : null,
                resignation_date: $request->date('resignation_date') ? CarbonImmutable::parse($request->date('resignation_date')) : null,
                mobile_phone: $request->string('mobile_phone'),
                office_phone: $request->string('office_phone'),
                bio: $request->string('bio'),
                image: $request->file('image'),
                education: $request->string('education'),
                board_certifications: $request->string('board_certifications'),
                field_of_expertise: $request->string('field_of_expertise'),
                years_of_experience: $request->integer('years_of_experience'),
                quote: $request->string('quote'),
            ), $doctor
        );

        return to_route('doctors.index')
            ->with('success', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor): void
    {
        //
    }
}
