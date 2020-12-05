<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; //modelを読み込む必要があるから(*)
class DatabaseSeeder extends Seeder
{
    //seederから継承してBlogsTableSeederを作る
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([LocalSeeder::class]);
    }
}
