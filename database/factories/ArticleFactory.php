<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Mmo\Faker\LoremSpaceProvider($this->faker));
        $nombre = ucfirst($this->faker->words(random_int(2, 4), true));
        return [
            'nombre'=> $nombre,
            'descripcion'=>$this->faker->words(random_int(5, 15), true),
            'pvp'=>$this->faker->randomFloat(2,  1, 999),
            'stock'=>random_int(0, 1),
            'imagen'=>'articles/'.$this->faker->loremSpace('furniture','public/storage/articles', 640, 480, false),
            'slug'=>Str::slug($nombre),
            'user_id'=>User::all()->random()->id
        ];
    }
}