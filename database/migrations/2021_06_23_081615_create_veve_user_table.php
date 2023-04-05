<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeveUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('veve_user');
        Schema::create('veve_user', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_email');
            $table->integer('user_phonenumber');
            $table->string('user_password');
            $table->date('UserBirthDate')->nullable();
            $table->string('user_address');
            $table->unsignedTinyInteger('IsUserMale');
            $table->string('UserImage')->default('/vev/content/user/user-default/user.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veve_user');
    }
}
