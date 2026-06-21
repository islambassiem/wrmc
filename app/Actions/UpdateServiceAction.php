<?php

namespace App\Actions;

use App\Data\ServiceData;
use App\Models\Service;
use Illuminate\Support\Str;

class UpdateServiceAction
{
    public function handle(ServiceData $data, Service $service): Service
    {
        $service->update([
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'parent_id' => $data->parent_id,
            'image' => $data->image,
        ]);

        return $service;
    }
}
