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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('make');
            $table->string('year_manufacture');
            $table->string('year_registration');
            $table->string('ownership');
            $table->string('chassis_no');
            $table->string('fuel_type');
            $table->string('reg_no');
            $table->string('mileage');
            $table->string('remarks');
            $table->string('cost');
            $table->string('unit_price');
            $table->string('margin');
            $table->string('availability');
            $table->string('v_image');
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
        Schema::dropIfExists('vehicles');
    }
};
