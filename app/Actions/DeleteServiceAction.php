<?php

namespace App\Actions;

use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Storage;

class DeleteServiceAction
{
    public function handle(Service $service): void
    {
        throw_if(Service::query()->where('parent_id', $service->id)->exists(), Exception::class, 'Cannot delete service with children.');

        if ($service->image) {
            $this->deleteImage($service->image);
        }

        $service->delete();
    }

    private function deleteImage(string $image): void
    {
        if (Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }
    }
}
