<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 10)->comment('Order number');
            $table->foreignId('product_id')->comment('foreign product')->constrained();
            $table->float('amount_total', 8, 3)->comment('amount total');
            $table->date('schedule')->default(now());
            $table->date('retirement_date')->default(now())->comment('retirement date');
            $table->json('list_products')->default('[]')->comment('list products');
            $table->float('delivery', 8, 3)->comment('delivery total');
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
        Schema::dropIfExists('order_lists');
    }
}
