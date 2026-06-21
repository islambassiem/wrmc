<?php

namespace App\Data;

class ServiceData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $name,
        public ?string $slug,
        public ?string $image,
        public ?int $parent_id,
    )
    {
        //
    }
}
