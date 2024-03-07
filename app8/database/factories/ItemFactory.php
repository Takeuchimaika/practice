<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'image' => '',
            'name' => $this->faker->realText(10),
            'kakaku' => $this->faker->numberBetween($min = 50, $mix = 999),
            'zaiko' => $this->faker->numberBetween($min = 1, $mix = 100),
            'bunrui' => $this->faker->numberBetween($min = 1, $mix = 3),
            'shosai' => $this->faker->realText(50),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            //
        ];
        
    }
}
