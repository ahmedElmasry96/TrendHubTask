<?php

namespace Tests\Feature;

use App\Models\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        try {

            $users = User::factory()->count(5)->create();


            foreach($users as $user) {
                $attributes = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt($user->password),
                    'pin' => random_int(1000, 9999),
                ];

                $this->postJson(route('user.create'), $attributes)->assertCreated()->json();


                $this->assertDatabaseHas('users', $attributes);
            }
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
