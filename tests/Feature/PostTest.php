<?php

use App\Actions\CreatePostAction;
use App\Actions\UpdatePostAction;
use App\Data\PostData;
use App\Enums\Permission;
use App\Enums\PostStatus;
use App\Enums\Role;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use TypeError;

test('action can create a post', function (): void {
    $payload = Post::factory()->raw();

    $post = resolve(CreatePostAction::class)->handle(
        new PostData(
            $payload['title'],
            $payload['body'],
            (int) $payload['category_id'],
            $payload['status']->value,
        )
    );

    expect($post->title)->toBe($payload['title']);
    expect($post->body)->toBe($payload['body']);
    expect($post->status->value)->toBe(PostStatus::DRAFT->value);
    expect($post->category_id)->toBe($payload['category_id']);
});

test('create action fails with invalid data', function (): void {
    $payload = Post::factory()->raw();
    $payload['title'] = null;

    expect(fn (): PostData => new PostData(
        $payload['title'],
        $payload['body'],
        (int) $payload['category_id'],
        $payload['status']->value,
    ))->toThrow(TypeError::class);
});

test('action can upate a post', function (): void {
    $payload = Post::factory()->raw();
    $post = Post::factory()->create();
    $post = resolve(UpdatePostAction::class)->handle(
        new PostData(
            $payload['title'],
            $payload['body'],
            (int) $payload['category_id'],
            $payload['status']->value,
        ),
        $post
    );

    expect($post->title)->toBe($payload['title']);
    expect($post->body)->toBe($payload['body']);
    expect($post->status)->toBe($payload['status']);
    expect($post->category_id)->toBe($payload['category_id']);
});

test('user can view create post page', function (): void {
    givePermissionToUserThroughRole(
        Permission::POST_CREATE->value,
        $user = User::factory()->create(),
        Role::ADMIN->value
    );

    $this
        ->actingAs($user)
        ->get('/admin/posts/create')
        ->assertOk()
        ->assertViewIs('pages.posts.create');
});

test('user can view update post page', function (): void {
    givePermissionToUserThroughRole(
        Permission::POST_UPDATE->value,
        $user = User::factory()->create(),
        Role::ADMIN->value
    );
    Post::factory()->create();
    $this
        ->actingAs($user)
        ->get('/admin/posts/1/edit')
        ->assertOk()
        ->assertViewIs('pages.posts.edit');
});

test('user can create a post', function (): void {
    givePermissionToUserThroughRole(
        Permission::POST_CREATE->value,
        $user = User::factory()->create(),
        Role::ADMIN->value
    );

    $payload = [
        'title' => 'My Post',
        'body' => 'Post body',
        'category_id' => Category::factory()->create()->id,
        'status' => 'draft',
    ];

    $this
        ->actingAs($user)
        ->post(route('posts.store'), $payload)
        ->assertRedirect(route('posts.index'));

    $this->assertDatabaseHas('posts', [
        'title' => 'My Post',
        'body' => 'Post body',
    ]);
});

test('user can update a post', function (): void {
    givePermissionToUserThroughRole(
        Permission::POST_UPDATE->value,
        $user = User::factory()->create(),
        Role::ADMIN->value
    );

    $payload = [
        'title' => 'My updated Post',
        'body' => 'Post updated body',
        'category_id' => Category::factory()->create()->id,
        'status' => 'published',
    ];

    $this
        ->actingAs($user)
        ->put(route('posts.update', Post::factory()->create()->id), $payload)
        ->assertRedirect(route('posts.index'));

    $this->assertDatabaseHas('posts', [
        'title' => $payload['title'],
        'body' => $payload['body'],
        'status' => $payload['status'],
    ]);
});
