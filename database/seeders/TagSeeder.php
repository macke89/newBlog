<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Food']);
        Tag::create(['name' => 'Wellness']);
        Tag::create(['name' => 'Sports']);
        Tag::create(['name' => 'Culture']);
        Tag::create(['name' => 'Business']);
        Tag::create(['name' => 'Random']);

        foreach (Post::all() as $post) {
            $tags = Tag::inRandomOrder()->take(rand(1,3))->pluck('id');
            $post->tags()->attach($tags);
        }
    }
}
