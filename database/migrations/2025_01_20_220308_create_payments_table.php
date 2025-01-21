<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('transaction_id')->unique();
            $table->unsignedInteger('order_id')->nullable();
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
            $table->string('method')->default('Recibo');
            $table->string('status')->default('Pendente');
            $table->string('reference')->nullable();
            $table->string('receipt_image')->nullable();
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
