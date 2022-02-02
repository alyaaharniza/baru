<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class UserLogin extends TestCase
{
    use DatabaseMigrations{
        runDatabaseMigrations as baseRunDatabaseMigrations;
    }
 
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseRunDatabaseMigrations();
        $this->artisan('db:seed');
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    //testLoginWithEmptyEmail

    public function testLoginWithEmptyEmail()
    {
        $data = [
            'email' => '',
            'password' => 'salah'
        ];

        $this->post('/api/login', $data)
        ->assertStatus(401);
    }

    public function testLoginWithEmptyPassword()
    {
        $data = [
            'email' => 'ada',
            'password' => ''
        ];

        $this->post('/api/login', $data)
        ->assertStatus(401);
    }
  
    public function testLoginWithInvalidEmail()
    {
        $data = [
            'email' => 'invalid@gmail.com',
            'password' => '123123'
        ];

        $this->post('/api/login', $data)
        ->assertStatus(401);
    }

    public function testLoginWithInvalidPassword()
    {
        $data = [
            'email' => 'alyaaharniza@gmail.com',
            'password' => 'salah'
        ];

        $this->post('/api/login', $data)
        ->assertStatus(401);
    }

    public function testLoginWithValidPassword()
    {
        $data = [
            'email' => 'alyaaharniza@gmail.com',
            'password' => '123123'
        ];

        $this->post('/api/login', $data)
        ->assertStatus(200);
    }
 
}
