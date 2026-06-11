<?php

use App\Enums\Permission;
use App\Enums\Role;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

use function Pest\Laravel\assertDatabaseHas;

test('categories route protected by auth', function (): void {
    $response = $this->get('admin/categories');

    $response->assertRedirect('/admin/login');
});

test('non permitted users cannot access categories', function (): void {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('admin/categories');

    $response->assertStatus(403);
});

test('auth and authorized users can access resource', function (): void {
    $user = User::factory()->create();
    givePermissionToUserThroughRole(
        Permission::CATEGORY_VIEW_ALL->value,
        $user,
        Role::ADMIN->value
    );

    $response = $this
        ->actingAs($user)
        ->get('admin/categories');

    $response->assertStatus(200);
});

test('unathorized user cannot create a category', function (): void {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/admin/categories', [
            'name' => 'category name',
            'type' => 'service',
        ]);

    $response->assertStatus(403);
});

test('unathorized user cannot update a category', function (): void {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $response = $this
        ->actingAs($user)
        ->put('/admin/categories/'.$category->id, [
            'name' => 'category name',
            'type' => 'service',
        ]);

    $response->assertStatus(403);
});

test('authorized user can create a category', function (): void {
    $user = User::factory()->create();
    givePermissionToUserThroughRole(
        Permission::CATEGORY_CREATE->value,
        $user,
        Role::ADMIN->value
    );

    $response = $this
        ->actingAs($user)
        ->post('/admin/categories', [
            'name' => 'category name',
            'type' => 'service',
        ]);

    $response->assertRedirect('/admin/categories');
    assertDatabaseHas('categories', [
        'name' => 'category name',
        'slug' => Str::slug('category name'),
        'type' => 'service',
    ]);
});

test('authorized user can update a category', function (): void {
    $user = User::factory()->create();
    $category = Category::factory()->create();
    givePermissionToUserThroughRole(
        Permission::CATEGORY_UPDATE->value,
        $user,
        Role::ADMIN->value
    );

    $response = $this
        ->actingAs($user)
        ->put('/admin/categories/'.$category->id, [
            'name' => 'category name updated',
            'type' => 'service',
        ]);

    $response->assertRedirect('/admin/categories');
    assertDatabaseHas('categories', [
        'name' => 'category name updated',
        'slug' => Str::slug('category name updated'),
        'type' => 'service',
    ]);
});
