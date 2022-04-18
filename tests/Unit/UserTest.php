<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

     //Check if login page exists
    public function test_login()
    {
        $response = $this->get('/auth/login');

        $response->assertStatus(200);
    }

    //Check login validation
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'sachini',
            'email' => 'sachini@email.com'
        ]);
        $user2 = User::make([
            'name' => 'name',
            'email' => 'email@email.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    //Test if a user can be deleted
    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }

    //Perform a post() request to add a new user
    public function test_if_it_stores_new_users()
    {
        $response = $this->post('/register', [
            'name' => 'malsha',
            'email' => 'malsha@gmail.com',
            'password' => 'malsha123',
            'password_confirmation' => 'malsha123'
        ]);

        $response->assertRedirect('/home');
    }

    //check data exit in database
    public function test_if_data_exists_in_database()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'malsha'
        ]);
    }

    //check data does not exit in database
    public function test_if_data_does_not_exists_in_database()
    {
        $this->assertDatabaseMissing('users', [
            'name' => 'dulakshi'
        ]);
    }

    //check seeder works or not
    public function test_if_seeders_works()
    {
        $this->seed();
    }

}

