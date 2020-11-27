<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Size::class;

    /**
     * Define the model's default state.
     *
     * @return array,
     */
    public function definition()
    {
        return [
            'size'=>$this->faker->randomElement([
                24.5,
                25.0,
                25.5,
                26.0,
                26.5,
                27.0,
                27.5,
                28.0,
                28.5,
                29.0
            ])
        ];
    }
}
