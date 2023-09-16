<?php

namespace Database\Factories;


use App\Models\Room;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,3),
            'rating' => $this->faker->numberBetween(1,5),
            'content' => $this->faker->text(100),
            'commentable_type'=>$this->faker->randomElement([Room::class,Image::class]),
            'commentable_id' =>$this->faker->numberBetween(1,10)
        ];
    }
}
