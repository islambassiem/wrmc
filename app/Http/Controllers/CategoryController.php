<?php

namespace App\Http\Controllers;

use App\Actions\CreateCategoryAction;
use App\Actions\UpdateCategoryAction;
use App\Data\CategoryData;
use App\Enums\CategoryType;
use App\Enums\Permission;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        Gate::authorize(Permission::CATEGORY_VIEW_ALL);

        $categories = Category::query()
            ->latest('updated_at')
            ->paginate(10);
        $types = CategoryType::cases();

        return view('pages.categories', [
            'types' => $types,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Gate::authorize(Permission::CATEGORY_CREATE);

        resolve(CreateCategoryAction::class)->handle(
            new CategoryData(
                name: $request->string('name'),
                type: CategoryType::from($request->string('type')),
            )
        );

        return to_route('categories.index')->with('success', 'Category saved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        Gate::authorize(Permission::CATEGORY_UPDATE);

        resolve(UpdateCategoryAction::class)->handle(
            new CategoryData(
                name: $request->string('name'),
                type: CategoryType::from($request->string('type')),
            ), $category);

        return to_route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): void
    {
        //
    }
}
