<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('photo');
            $table->integer('seat');
            $table->integer('book_status')->nullable();
            $table->string('color')->nullable();
            $table->string('make')->nullable();
            $table->integer('price');
            $table->integer('discount')->default(0)->nullable();
            $table->string('city');
            $table->string('insurance');
            $table->string('rules')->nullable();
            $table->string('sensors')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('control_parking')->nullable();
            $table->string('auto_temp')->nullable();
            $table->string('wireless_co')->nullable();
            $table->string('conditioner')->nullable();
            $table->string('navigator')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('red_id')->nullable();
            $table->unsignedBigInteger('locat_id')->nullable();
          
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('red_id')->references('id')->on('reders')->onDelete('SET NULL');
            $table->foreign('locat_id')->references('id')->on('locations')->onDelete('SET NULL');
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('cars');
    }
}
