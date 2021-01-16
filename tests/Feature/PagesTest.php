<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAbout()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}
