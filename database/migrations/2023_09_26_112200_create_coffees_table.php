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
        Schema::create('coffees', function (Blueprint $table) {
            $table->id();
            $table->string('coffee_slug')->nullable();
            $table->string('coffee_title')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('grind_id')->nullable();
            $table->integer('weight_id')->nullable();
            $table->text('coffee_desc')->nullable();
            $table->text('coffee_about')->nullable();
            $table->string('coffee_aroma')->nullable();
            $table->string('coffee_finish')->nullable();
            $table->string('coffee_image')->default('media/product/empty-image.png');
            $table->integer('coffee_status')->default(0);
            $table->string('coffee_code')->nullable();
            $table->integer('coffee_price')->nullable();
            $table->integer('coffee_home')->default(0);
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
        Schema::dropIfExists('coffees');
    }
};
