<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_user()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user,'web')
            ->post('/admin/user');
        $response->dump();
        $response->assertStatus(200);
    }
}
