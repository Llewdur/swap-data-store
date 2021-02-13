<?php

namespace Tests\Feature\Unauthenticated;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    public const END_POINT = '/api/users';

    public function testStore()
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        $dataArray = [
            'email' => $this->faker->unique()->safeEmail,
            'name' => $this->faker->name,
            'password' => '12345678',
        ];

        $this->post(self::END_POINT, $dataArray, $headers)
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure(['data']);
    }
}
