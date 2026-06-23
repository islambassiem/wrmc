<?php

namespace App\Actions;

use App\Data\ServiceData;
use App\Models\Service;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateServiceAction
{
    public function handle(ServiceData $data, Service $service): Service
    {
        $oldPath = $service->image;

        $updateData = [
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'parent_id' => $data->parent_id,
        ];

        if ($data->image instanceof UploadedFile) {
            $updateData['image'] = $data->image->store('services', 'public');
        }

        $service->update($updateData);

        if (isset($updateData['image']) && $oldPath) {
            Storage::disk('public')->delete($oldPath);
        }

        return $service;
    }
}
