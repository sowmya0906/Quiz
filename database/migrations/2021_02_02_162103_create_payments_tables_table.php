<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_tables', function (Blueprint $table) {
            $table->id();
            $table->String('orderId');
            $table->String('orderAmount');
            $table->String('orderCurrency');
            $table->String('orderNote');
            $table->String('customerName');
            $table->String('customerEmail');
            $table->String('customerPhone');
            $table->boolean('payment_done')->default(false);
            $table->boolean('exam_done')->default(0);
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
        Schema::dropIfExists('payments_tables');
    }
}
