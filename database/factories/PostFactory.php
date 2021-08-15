<?php

namespace Database\Factories;

use App\Models\Post;
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
        return [
            'title' => $this->faker->sentence(mt_rand(3,5)),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(5,10)),
            'body' => collect($this->faker->paragraph(mt_rand(5,10)))->map(fn($p)=>"<p>".$p."</p>")->implode(''),
            'topic_id' => mt_rand(1,4),
            'user_id' => 1,
        ];
    }
}
