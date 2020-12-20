<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::get('id');

        return [
            'title' => $this->faker->text('15'),
//            'title' => $this->faker->randomElement($green),
            'user_id' => $this->faker->randomElement($users),
            'text' => $this->faker->text('1000')
        ];
    }
}
