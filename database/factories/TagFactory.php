<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word(20);

        return [
            'name' =>$name,
            'slug' => Str::slug($name),
            'color' => $this->faker->randomElement(['red','green','blue','yellow','purple','indigo','pink'])
        ];
    }
}
