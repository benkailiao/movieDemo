<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class MovieTest extends TestCase
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

    public function testApiNoToken()
    {
    	$uri = '/login';
        $response = $this->get('/api/movie/1');
        $response
            ->assertRedirect($uri);
    }
    public function testBasicMovie(){

    	$response = $this->json('GET', '/api/movie/1', ['api_token'=>'ZZCEVXzuipUdV4QVVWp42w5hJZNcJCipuN3dxxe5YVY1igiL2OLdK5cijfD8']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
            ]);

    }
}
