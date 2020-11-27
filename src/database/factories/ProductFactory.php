<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Size;
use App\Models\Bland;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->word . $this->faker->randomFloat(),
            'size_id' => Size::factory()->create()->id,
            'bland_id' => Bland::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
            'price' => $this->faker->randomNumber(),
            'detail' => $this->faker->text(),
            'image' => $this->faker->image,
            'stock' => $this->faker->randomDigit,
        ];
    }
}
