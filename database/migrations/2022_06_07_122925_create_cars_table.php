<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_code')->nullable();
            $table->text('marque')->nullable();
            $table->string('model')->nullable();
            $table->string('number_plate')->nullable();
            $table->string('age_condition')->nullable();
            $table->string('license_condition')->nullable();
            $table->string('damage_report')->nullable();
            $table->string('classis_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 for Active and 0 for Inactive');
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
        Schema::dropIfExists('cars');
    }
}
