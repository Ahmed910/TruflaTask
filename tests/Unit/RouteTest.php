<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $req= $this->get('/all_movies');
        $req->assertStatus(200);
        $response=$this->json('GET','/all_movies');
        $response->assertStatus(200);
    }
}
