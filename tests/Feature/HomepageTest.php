<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_contains_empty_records_on_table(): void
    {
        $response = $this->get('/');
       $response->assertStatus(200);
       $response->assertSee('No users');
    }

    public function test_homepage_contains_records_on_table(): void
    {
        User::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('No users');
    }
}
