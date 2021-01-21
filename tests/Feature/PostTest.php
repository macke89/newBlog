<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function testListOfMyPosts()
    {
        // create user
        $user = User::has('posts')->first();
        // log in with that user
        auth()->login($user);
        // load post list
        $response = $this->get('/posts');
        $response->assertStatus(200);
        // check if the list get's shown correctly
        $test = $user->posts->count();
        $this->assertEquals($user->posts->count(), substr_count($response->getContent(), 'phpunit-newposts'));
    }

    public function testCreatePost()
    {
        // get user
        $user = User::has('posts')->first();
        // log in with that user
        auth()->login($user);
        // create Post
//        $response = $this->post('/store', [
//            'title' => 'TestTitle 1234567',
//            'text' => 'Some text 12346',
//            'tags' => '1'
//        ]);
//        $response->assertStatus(302);
        // get Post List
        $response = $this->get('/posts');
        $response->assertStatus(200);
        // check if the list contains created post
        $response->assertSee('TestTitle');
    }
}
