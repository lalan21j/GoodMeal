<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('name store');
            $table->dateTime('hours_operation_start')->default(now());
            $table->dateTime('hours_operation_end')->default(now());
            $table->foreignId('type_delivery_id')->comment('foreign type_deliveries')->constrained();
            $table->text('direction')->comment('direction store');
            $table->integer('rating')->nullable()->comment('rating store');
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
        Schema::dropIfExists('stores');
    }
}
