<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), //create new article with association with a user. maker sure to use app\models\user at top
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'body' => $this->faker->paragraph
        ];
    }
}
// php artisan tinker
// Article::factory()->create();
// $articles = Article::factory()->count(5)->create();
// $articles = Article::factory()->count(5)->create(['user_id' => 17]);

