<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('name product');
            $table->integer('quantity')->default(0)->comment('quantity product');
            $table->float('price', 8, 3)->comment('price product');
            $table->foreignId('store_id')->comment('foreign store')->constrained();
            $table->text('description')->nullable()->comment('description product');
            $table->float('offer_price', 8, 3)->nullable()->comment('offer price product');
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
        Schema::dropIfExists('products');
    }
}
