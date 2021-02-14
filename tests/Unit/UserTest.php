<?php

namespace Tests\Feature\Unauthenticated;

use App\Repository\Eloquent\UserRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithoutMiddleware;
    use WithFaker;

    public const END_POINT = '/api/users';

    public function testStore()
    {
        $dataArray = [
            'email' => $this->faker->unique()->safeEmail,
            'name' => $this->faker->name,
            'password' => '12345678',
        ];

        $this->postJson(self::END_POINT, $dataArray)
            ->assertCreated()
            ->assertJsonStructure([
                'created_at',
                'email',
                'id',
                'name',
            ])
            ;
    }

    public function testIndex()
    {
        $this->get(self::END_POINT)
            ->assertOk()
            ->assertJsonStructure([
                    '*' => [
                        'created_at',
                        'email',
                        'id',
                        'name',
                    ]
            ])
            ;
    }
}
