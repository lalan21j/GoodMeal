<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->string('delivery_time', 10)->nullable()->comment('delivery time');
            $table->string('distance', 10)->nullable()->comment('distance');
            $table->integer('sales_day')->nullable()->comment('sales of the day');
            $table->text('large_image')->nullable()->comment('large image');
            $table->text('small_image')->nullable()->comment('small image');
            $table->boolean('favorite')->default(false)->comment('favorite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            //
        });
    }
}
