<?php

namespace App\Actions;

use Illuminate\Http\UploadedFile;
use App\Data\ServiceData;
use App\Models\Service;
use Illuminate\Support\Str;

class CreateServiceAction
{
    public function handle(ServiceData $data): Service
    {
        $imagePath = null;

        if ($data->image instanceof UploadedFile) {
            $imagePath = $data->image->store('services', 'public');
        }

        return Service::query()->create([
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'parent_id' => $data->parent_id ?? null,
            'image' => $imagePath,
        ]);
    }
}
