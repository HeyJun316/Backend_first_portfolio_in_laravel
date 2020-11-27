<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'email'=>$this->faker->randomNumber().$this->faker->safeEmail,
            'sex'=>$this->faker->word,
            'postal_code'=>$this->faker->postcode,
            'address'=>$this->faker->country.$this->faker->streetAddress.$this->faker->buildingNumber,
            'birthday'=>$this->faker->dateTimeAD,
            'password'=>bcrypt("secret")
            
        ];
    }
}
