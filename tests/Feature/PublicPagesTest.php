<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAbout()
    {
        $response = $this->get('about');

        $response->assertStatus(200);
    }

    public function testShowPost()
    {
        $post = Post::first();

        $response = $this->get('/posts/show/' . $post->id);

        $response->assertStatus(200);
    }
}
