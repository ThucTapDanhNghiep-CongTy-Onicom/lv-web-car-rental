<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('otp')->nullable();
            $table->enum('role',['admin','user','mod'])->default('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->string('password');
            $table->text('country_code')->nullable();
            $table->text('referral_code')->nullable();
            $table->text('photo')->nullable();
            $table->integer('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->integer('referral_link_id')->unsigned()->nullable();
            $table->unique(['referral_link_id']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
