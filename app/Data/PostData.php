<?php

declare(strict_types=1);

namespace App\Data;

class PostData
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public string $title,
        public string $body,
        public int $category_id,
        public ?string $status,
    ) {
        //
    }
}
