<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Http\UploadedFile;

class ServiceData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $name,
        public ?UploadedFile $image,
        public ?int $parent_id,
        public ?string $slug = null,
    )
    {
        //
    }
}
