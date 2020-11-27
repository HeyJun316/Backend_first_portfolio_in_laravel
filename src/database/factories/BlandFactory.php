<?php

namespace Database\Factories;

use App\Models\Bland;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bland::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'bland_name'=>$this->faker->word().$this->faker->word().$this->faker->randomFloat()
            'bland_name' => $this->faker->randomElement([
                    'リーガル',
                    'スコッチグレイン',
                    'ユニオンインペリアル',
                    '三陽山長',
                    'シェットランドフォックス',
                    'エドワードグリーン',
                    'チャーチ',
                    'トリッカーズ',
                    'クロケットジョーンズ',
                    'ジョンロブ'
                ])
        ];
    }
}
