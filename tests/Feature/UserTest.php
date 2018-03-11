<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    use InteractsWithDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCita(){
        do{
            $user = factory(User::class)->make();
        }while($user->esMedico);

        $response = $this->actingAs($user)->get('/cita');
        $response->assertStatus(200);
    }

    public function testProfile(){
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/profile')->assertStatus(200);
    }

    public function testCitas(){
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/citas')->assertStatus(200);
    }
}
