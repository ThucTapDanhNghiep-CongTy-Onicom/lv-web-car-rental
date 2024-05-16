<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('car_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('SET NULL');
            $table->integer('taxes')->nullable();
            $table->text('address');
            $table->text('address_off')->nullable();
            $table->integer('total_amount')->nullable();
            $table->string('time_start');
            $table->string('time_end');
            $table->string('date_start');
            $table->string('date_end');
            $table->enum('status',['trading','inactive','active'])->default('trading');
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
        Schema::dropIfExists('bookings');
    }
}
