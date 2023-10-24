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
        Schema::table('coffees', function (Blueprint $table) {
            $table->string('coffee_acidity')->nullable();
            $table->string('coffee_body')->nullable();
            $table->integer('coffee_dise')->nullable();
            $table->string('coffee_time')->nullable();
            $table->integer('coffee_yield')->nullable();
            $table->integer('coffee_temp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coffees', function (Blueprint $table) {
            $table->dropColumn('coffee_acidity');
            $table->dropColumn('coffee_body');
            $table->dropColumn('coffee_dise');
            $table->dropColumn('coffee_time');
            $table->dropColumn('coffee_yield');
            $table->dropColumn('coffee_temp');
        });
    }
};
