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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_slug')->nullable();
            $table->string('equipment_title')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('firma_id')->nullable();
            $table->text('equipment_desc')->nullable();
            $table->text('equipment_about')->nullable();
            $table->string('equipment_image')->default('media/product/empty-image.png');
            $table->integer('equipment_status')->default(0);
            $table->string('equipment_code')->nullable();
            $table->integer('equipment_price')->nullable();
            $table->integer('equipment_home')->default(0);
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
        Schema::dropIfExists('equipments');
    }
};
