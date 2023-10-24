<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->integer('order_id');
            $table->string('coffee_id')->nullable();
            $table->string('coffee_name')->nullable();
            $table->string('coffee_code')->nullable();
            $table->string('coffee_image')->nullable();
            $table->string('coffee_weight')->nullable();
            $table->string('coffee_grind')->nullable();
            $table->string('coffee_qty')->nullable();
            $table->string('coffee_price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
