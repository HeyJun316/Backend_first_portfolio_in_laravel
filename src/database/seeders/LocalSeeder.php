<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Bland;
use App\Models\Users;
use App\Models\History;
use App\Models\Product;
use App\Models\Cart;
use Carbon\Traits\Date;
use App\Models\Category;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //簡単なテストデータ用
        // Users::factory([
        //     'name' => 'test',
        //     'email' => 'test@test.com',
        // ])->create();

        $blands = [
            ['bland_name' => 'リーガル'],
            ['bland_name' => 'スコッチグレイン'],
            ['bland_name' => 'ユニオンインペリアル'],
            ['bland_name' => '三陽山長'],
            ['bland_name' => 'シェットランドフォックス'],
            ['bland_name' => 'エドワードグリーン'],
            ['bland_name' => 'チャーチ'],
            ['bland_name' => 'トリッカーズ'],
            ['bland_name' => 'クロケットジョーンズ'],
            ['bland_name' => 'ジョンロブ'],
        ];
        DB::table('blands')->insert($blands);

        $categories = [
            ['name_jp' => 'ストレートチップ'],
            ['name_jp' => 'ウイングチップ'],
            ['name_jp' => 'ダブルモンク'],
            ['name_jp' => 'ローファー'],
        ];
        DB::table('categories')->insert($categories);
        $sizes = [
            ['size' => '24.5'],
            ['size' => '25.0'],
            ['size' => '25.5'],
            ['size' => '26.0'],
            ['size' => '26.5'],
            ['size' => '27.0'],
            ['size' => '27.5'],
            ['size' => '28.0'],
            ['size' => '28.5'],
        ];
        DB::table('sizes')->insert($sizes);

        $blands = Bland::all();
        $sizes = Size::all();
        $categories = Category::all();

        $products = [
            [
                'product_name' => '商品1',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品2',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品3',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品4',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品5',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品6',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品7',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品8',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品9',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品10',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品11',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品12',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品13',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品14',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品15',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品16',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品17',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品18',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品19',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品20',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品21',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品22',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品23',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品24',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品25',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品26',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品27',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品28',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品29',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品30',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品31',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品32',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品33',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品34',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品35',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品36',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品37',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品38',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品39',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品40',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品41',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品42',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品43',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品44',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品45',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品46',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品47',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品48',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品49',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品50',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品51',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品52',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品53',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品54',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品55',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品56',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品57',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品58',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品59',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品60',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品61',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品62',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品63',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品64',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品65',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品66',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品67',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品68',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品69',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品70',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品71',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品72',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品73',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品74',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品75',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品76',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品77',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品78',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品79',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品80',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品81',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品82',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品83',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品84',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品85',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品86',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品87',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品88',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品89',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品90',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品91',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品92',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品93',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品94',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品95',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品96',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品97',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品98',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品99',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
            [
                'product_name' => '商品100',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'aaa',
                'stock' => 10,
            ],
        ];

        DB::table('products')->insert($products);

        // foreach ($products as $product) {
        //     DB::table('products')->insert([
        //         [
        //             'product_name' => $product,
        //             'size_id' => $sizes->pluck('id')[
        //                 rand(0, $sizes->count() - 1)
        //             ],
        //             'bland_id' => $blands->pluck('id')[
        //                 rand(0, $blands->count() - 1)
        //             ],
        //             'category_id' => $categories->pluck('id')[
        //                 rand(0, $categories->count() - 1)
        //             ],
        //             'price' => 10000,
        //             'detail' => 'aaa',
        //             'image' => 'aaa',
        //             'stock' => 10,
        //         ],
        //     ]);
        // }
        // Product::factory()->create([
        //     'product_name' => $product,
        //     // 'bland_id' => $blands->pluck('id')[
        //     //     rand(0, $blands->count() - 1)
        //     // ],
        //     // 'category_id' => $categories->pluck('id')[
        //     //     rand(0, $categories->count() - 1)
        //     // ],
        //     // 'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
        // ]);

        $users = Users::factory()->create([
            'email' => 'test@example.com',
        ]);

        // $users = Users::factory()
        //     ->times(2)
        //     ->create();
        // //======
        // //これ↓必要？→これがなかたら、historyの重複コレクションを作るときにエラーが出る
        // $products = Product::factory()
        //     ->times(2)
        //     ->create();
        // //======

        // foreach ($blands as $bland) {
        //     $bland = Bland::factory()->create([
        //         'bland_name' => $bland,
        //     ]);

        //     foreach ($sizes as $size) {
        //         $size = Size::factory()->create([
        //             'size' => $size,
        //         ]);
        //         foreach ($categories as $category) {
        //             $category = Category::factory()->create([
        //                 'name_jp' => $category,
        //             ]);
        //             Product::factory()->create([
        //                 'bland_id' => $bland->id,
        //                 'category_id' => $category->id,
        //                 'size_id' => $size->id,
        //             ]);
        //         }
        //     }
        // }

        // //Cartテーブルの重複したデータを持つロジ
        // foreach ($products as $index => $product) {
        //     if ($index > 0) {
        //         break;
        //     }
        //     foreach ($users as $user) {
        //         Cart::factory()
        //             ->times(2)
        //             ->create([
        //                 'user_id' => $user->id,
        //                 'product_id' => $product->id,
        //             ]);
        //     }
        // }

        // //Hitoryテーブルの重複したデータを持つロジ
        // foreach ($users as $index => $user) {
        //     if ($index > 0) {
        //         break;
        //     }
        //     foreach ($products as $product) {
        //         History::factory()
        //             ->times(2)
        //             ->create([
        //                 'user_id' => $user->id,
        //                 'product_id' => $product->id,
        //             ]);
        //     }
        // }
    }
}
//Productsの重複した外部キーデータを持つロジ
// foreach ($blands as $index => $bland) {
//     if ($index > 0) {
//         break;
//     }
//     foreach ($sizes as $index => $size) {
//         if ($index > 0) {
//             break;
//         }
//         foreach ($categories as $category) {
//             Product::factory()
//                 ->times(2)
//                 ->create([

//                     'bland_id' => $bland->id,
//                     'category' => $category->id,
//                     'size_id' => $size->id,
//                 ]);
//         }
//     }
// }

//Hitoryテーブルの重複したデータを持つロジ
// foreach ($users as $index => $user) {
//     if ($index > 0) {
//         break;
//     }
//     foreach ($products as $product) {
//         History::factory()
//             ->times(3)
//             ->create([
//                 //===
//                 'user_id' => $user->id,
//                 'product_id' => $product->id,
//                 //↑がよく分からん(解決済み)
//                 //$userのuser_idをHistoryテーブル内に重複してデータを作る？？
//                 //user_id=1 purchased_date 2020/11/11
//                 //user_id=1 purchased_date 2019/5/14 みたい感じ？
//                 //OK!!あってるぜ！
//                 //===

//             ]);
//     }
// }？？
