<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\CategoryType;

class CategoryData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $name,
        public CategoryType $type,
    ) {
        //
    }
}
