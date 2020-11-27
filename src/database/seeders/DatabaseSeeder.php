<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;//modelを読み込む必要があるから(*)
class DatabaseSeeder extends Seeder
//seederから継承してBlogsTableSeederを作る
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()//DBに追加する処理をこの中に書く
    {
        // \App\Models\Category::factory(10)->create();
        // Category::factory() //eloquent(model)こと(*)
        // ->times(5)
        // ->create();

        // if (\App::emviroment('local')) {
        //     $this->call([
        //         LocalSeeder::class
        //     ]);
        // } elseif (\App::emviroment('production')) {
        //     $this->call([
        //         ProductionSeeder::class
        //     ]);
        // }


         $this->call([
                LocalSeeder::class
                ]);
    }
}
