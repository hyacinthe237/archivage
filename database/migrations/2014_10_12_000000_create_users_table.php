<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->bigIncrements('id');
          $table->integer('role_id')->default(3);
          $table->bigInteger('number')->index();
          $table->string('firstname');
          $table->string('lastname')->nullable();
          $table->string('phone')->nullable();
          $table->string('email')->unique();
          $table->string('password');
          $table->string('sex')->nullable();
          $table->boolean('is_active')->default(true);
          $table->string('photo')->nullable();
          $table->string('api_token')->index();
          $table->rememberToken();
          $table->timestamps();
          $table->softDeletes();
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
