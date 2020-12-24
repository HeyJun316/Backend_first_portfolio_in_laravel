<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bland_name', 255);
            $table->timestamps();
            $table->unique('bland_name', 'unique_bland_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blands');
    }
}
