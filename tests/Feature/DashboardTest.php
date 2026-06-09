<?php

use App\Models\User;

test('guests are redirected to the login page', function (): void {
    $this->get('/admin/dashboard')->assertRedirect('/admin/login');
});

test('authenticated users can visit the dashboard', function (): void {
    $this->actingAs($user = User::factory()->create());

    $this->get('/admin/dashboard')->assertStatus(200);
});
