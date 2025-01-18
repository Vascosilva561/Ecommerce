<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('sub_total')->after('status')->default(0);
            $table->float('tax')->after('sub_total')->default(0);
            $table->float('freight_cost')->after('tax')->default(0);
            $table->unsignedBigInteger('address_id')->after('user_id')->nullable();
            $table->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('sub_total');
            $table->dropColumn('tax');
            $table->dropColumn('freight_cost');
            $table->dropForeign('orders_address_id_foreign');
            $table->dropColumn('address_id');
        });
    }
}
