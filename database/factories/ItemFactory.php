<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lexify('Item????'),
            'item_image' => 'dummy.png',
            'price' => 0,
            'comment' => $this->faker->realText(),
            'user_id' => rand(1, 251),
            'category_id' => rand(1, 19)
        ];
    }
}
