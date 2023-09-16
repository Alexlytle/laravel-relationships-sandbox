<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'path'=>$this->faker->imageUrl(),
            'imageable_id'=>$this->faker->numberBetween(1,3),
            'imageable_type'=>$this->faker->randomElement([User::class,City::class]),
        ];
    }
}
