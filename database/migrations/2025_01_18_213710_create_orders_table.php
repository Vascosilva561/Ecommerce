<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('status');
            $table->float('sub_total');
            $table->float('tax')->default(0);
            $table->float('freight_cost')->default(0);
            $table->float('total');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();

            $table->timestamps();
        });
        // Schema::table('orders', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        //     $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('orders', function (Blueprint $table) {
        //     $table->dropForeign(['user_id']);
        //     $table->dropForeign(['address_id']);
        // });
        Schema::dropIfExists('orders');
    }
}
