<?php

namespace App\Actions;

use Throwable;
use App\Data\DoctorData;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateDoctorAction
{
    public function handle(DoctorData $data): Doctor
    {
        $path = $data->image?->store('doctors', 'public');
        try {
            return Doctor::query()->create([
                'name' => $data->name,
                'slug' => Str::slug($data->name),
                'title' => $data->title,
                'email' => $data->email,
                'mobile_phone' => $data->mobile_phone,
                'office_phone' => $data->office_phone,
                'bio' => $data->bio,
                'image' => $path,
                'education' => $data->education,
                'board_certifications' => $data->board_certifications,
                'field_of_expertise' => $data->field_of_expertise,
                'years_of_experience' => $data->years_of_experience,
                'quote' => $data->quote,
            ]);
        } catch (Throwable $throwable) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }

            throw $throwable;
        }

    }
}
