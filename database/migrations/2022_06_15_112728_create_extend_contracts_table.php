<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtendContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extend_contracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contract_id')->unsigned()->nullable();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->BigInteger('extend_days')->nullable();
            $table->BigInteger('new_free_kms')->nullable();
            $table->BigInteger('free_kms')->nullable();

            $table->date('new_arrival_date')->nullable();
            $table->double('extend_price')->nullable();
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
        Schema::dropIfExists('extend_contracts');
    }
}
