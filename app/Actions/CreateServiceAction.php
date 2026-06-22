<?php

namespace App\Actions;

use App\Data\ServiceData;
use App\Models\Service;
use Illuminate\Support\Str;

class CreateServiceAction
{
    public function handle(ServiceData $data): Service
    {
        $imagePath = null;

        if ($data->image) {
            $imagePath = $data->image->store('services', 'public');
        }

        return Service::create([
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'parent_id' => $data->parent_id,
            'image' => $imagePath,
        ]);
    }
}
