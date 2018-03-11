<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testLogin(){
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testRegisterAsMedico(){
        $response = $this->get('/register?usserType=medico');
        $response->assertStatus(200);
    }

    public function testRegisterAsUser(){
        $response = $this->get('/register?usserType=user');
        $response->assertStatus(200);
    }
}
