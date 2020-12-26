<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table
                ->string('email', 100)
                ->unique()
                ->nullable();
            $table->string('sex', 100);
            $table->string('postal_code', 100);
            $table->string('address', 255);
            $table->date('birthday');
            $table->timestamps();

            $table->softDeletes();

            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->unique(['provider_id', 'provider_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
