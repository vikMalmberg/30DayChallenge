<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\CarbonPeriod;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('streak')->default(0);
            $table->json('checkins');
            $table->timestamps();
        });

        Schema::create('challenge_user', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('challenge_id');
            $table->date('failed_at')->nullable()->default(null);
            $table->boolean('completed')->default(false);
            $table->primary(['user_id', 'challenge_id']);

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
        Schema::dropIfExists('challenge_user');
    }
}
