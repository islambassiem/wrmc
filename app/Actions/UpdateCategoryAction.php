<?php

declare(strict_types=1);

namespace App\Actions;

use App\Data\CategoryData;
use App\Models\Category;
use Illuminate\Support\Str;

class UpdateCategoryAction
{
    public function handle(CategoryData $data, Category $category): Category
    {
        $category->update([
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'type' => $data->type,
        ]);

        return $category;
    }
}
