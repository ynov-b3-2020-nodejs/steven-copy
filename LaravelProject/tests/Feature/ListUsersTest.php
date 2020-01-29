<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ListUsersTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUrlUsersResponseWell()
    {
        $res = $this->get('/users');
        $res->assertStatus(200);
    }

    public function testEmptyWhenNoUsers()
    {
        $response = $this->getJson('/users');
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertExactJson([
            'users' => []
        ]);
    }

    public function testHasAUser()
    {
        //GIVEN
        $user = factory(\App\User::class)->create();
        //DO
        $response = $this->getJson('/users');
        //ASSERT
        $response->assertExactJson([
            'users' => $users->sortBy('id')->map(function(User $user) {

            }) [
                [
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ]
        ]);
    }
}

