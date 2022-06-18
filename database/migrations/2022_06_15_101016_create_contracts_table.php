<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('contract_number')->nullable();
            $table->double('rent_amout')->nullable();
            $table->string('deposit')->nullable();
            $table->double('price_add_km')->nullable();
            $table->string('fuel_niveau')->nullable();
            $table->integer('rental_period')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('hour_depart')->nullable();
            $table->date('end_date')->nullable();
            $table->double('free_km')->nullable();
            $table->double('km_depart')->nullable();
            $table->double('km_arrival')->nullable();
            $table->double('fuel_arrival')->nullable();
            $table->date('date_arrival')->nullable();
            $table->string('hour_arrival')->nullable();
            $table->double('extra_charges')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
