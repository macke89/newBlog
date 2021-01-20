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

    /**
     * A basic feature test example.
     *
     * @return void
     */
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
}
