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
        Schema::create('swapvehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('contact');
            $table->string('email');
            $table->string('profession');
            $table->string('address');
            $table->string('cus_make');
            $table->string('cus_brand');
            $table->string('cus_model');
            $table->string('cus_year_manufacture');
            $table->string('year_registration');
            $table->string('cus_ownership');
            $table->string('chassis_no');
            $table->string('cus_fuel_type');
            $table->string('mileage');
            $table->string('remarks');
            $table->string('brand');
            $table->string('model');
            $table->string('make');
            $table->string('ownership');
            $table->string('year_manufacture');
            $table->string('fuel_type');
            $table->integer('decision');
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
        Schema::dropIfExists('swapvehicles');
    }
};
