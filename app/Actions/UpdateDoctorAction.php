<?php

namespace App\Actions;

use App\Data\DoctorData;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class UpdateDoctorAction
{
    public function handle(DoctorData $data, Doctor $doctor): Doctor
    {
        $path = $data->image?->storeAs(
            'doctors',
            Str::slug($data->name ?? $doctor->name).'.'.$data->image->getClientOriginalExtension(),
            'public');
        $oldImage = $doctor->image;

        try {
            $doctor->update([
                'name' => $data->name,
                'slug' => Str::slug($data->name ?? $doctor->name),
                'title' => $data->title,
                'joining_date' => $data->joining_date?->format('Y-m-d'),
                'resignation_date' => $data->resignation_date?->format('Y-m-d'),
                'email' => $data->email,
                'mobile_phone' => $data->mobile_phone,
                'office_phone' => $data->office_phone,
                'bio' => $data->bio,
                'image' => $path ?? $oldImage,
                'education' => $data->education,
                'board_certifications' => $data->board_certifications,
                'field_of_expertise' => $data->field_of_expertise,
                'years_of_experience' => $data->years_of_experience,
                'order' => $data->order,
                'quote' => $data->quote,
            ]);

            if ($path && $doctor->wasChanged('image') && $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            return $doctor;
        } catch (Throwable $throwable) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }

            throw $throwable;
        }
    }
}
