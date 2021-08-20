<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_validated_data()
    {
        $response = $this->json('POST', '/auth/validate', [
            'name'=>'test',
            'email'=>'test@gmail.com',
            'username' => 'test-test1111',
            'password' => 'test123111!*',
            'checkbox'=>'on'
            ]
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data'=>[
                'name',
                'email',
                'username',
                'password'
            ],
            'status'=>[]
        ]);
    }

    public function test_store_validated_data(){
        $response = $this->json('POST', '/auth/store',[
            'name'=>'test',
            'email'=>'test@gmail.com',
            'username' => 'test-test1111',
            'password' => 'test123111!*',
            'checkbox'=>'on'
            ]
        );
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
