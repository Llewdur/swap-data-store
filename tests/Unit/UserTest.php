<?php

namespace Tests\Feature\Unauthenticated;

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
            'email' => 'llewellyn@zekini.com',
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

    public function testStoreCheckForUniqueEmail()
    {
        $dataArray = [
            'email' => 'llewellyn@zekini.com',
            'name' => $this->faker->name,
            'password' => '12345678',
        ];

        $this->postJson(self::END_POINT, $dataArray)
            ->assertStatus(422)
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
                ],
            ])
            ;
    }
}
