<?php

namespace App\Actions;

use App\Data\ServiceData;
use App\Models\Service;
use Illuminate\Support\Str;

class CreateServiceAction
{
    public function handle(ServiceData $data): Service
    {
        return Service::create([
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'parent_id' => $data->parent_id,
            'image' => $data->image,
        ]);
    }
}
