<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('p_transaction_id')->nullable();
            $table->integer('p_user_id')->nullable();
            $table->double('p_money')->nullable();
            $table->string('p_transaction_code')->nullable();
            $table->string('p_note')->nullable();
            $table->string('p_vnp_response_code')->nullable();
            $table->string('p_code_vnpay')->nullable();
            $table->string('p_code_bank')->nullable();
            $table->datetime('p_time')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
