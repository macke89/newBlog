<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::get('id');
        $posts = Post::get('id');

        return [
            'user_id' => $this->faker->randomElement($users),
            'post_id' => $this->faker->randomElement($posts),
            'text' => $this->faker->text('300')
        ];
    }
}
