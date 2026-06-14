<?php

namespace App\Actions;

use Throwable;
use App\Data\DoctorData;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateDoctorAction
{
    public function handle(DoctorData $data, Doctor $doctor): Doctor
    {
        $path = $data->image?->store('doctors', 'public');
        $oldImage = $doctor->image;

        try {
            $doctor->update([
                'name' => $data->name,
                'slug' => Str::slug($data->name ?? $doctor->name),
                'title' => $data->title,
                'email' => $data->email,
                'mobile_phone' => $data->mobile_phone,
                'office_phone' => $data->office_phone,
                'bio' => $data->bio,
                'image' => $path ?? $oldImage,
                'education' => $data->education,
                'board_certifications' => $data->board_certifications,
                'field_of_expertise' => $data->field_of_expertise,
                'years_of_experience' => $data->years_of_experience,
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
