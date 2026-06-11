<?php

namespace App\Actions;

use App\Data\CategoryData;
use App\Models\Category;
use Illuminate\Support\Str;

class CreateCategoryAction
{
    public function handle(CategoryData $data): Category
    {
        return Category::query()->create([
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'type' => $data->type,
        ]);
    }
}
