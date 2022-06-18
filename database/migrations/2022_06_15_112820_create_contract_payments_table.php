<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contract_id')->unsigned()->nullable();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->bigInteger('extend_id')->unsigned()->nullable();
            $table->foreign('extend_id')->references('id')->on('extend_contracts')->onDelete('cascade');
            $table->double('amount')->nullable();
            $table->date('payment_date');
            $table->string('payment_type');
            $table->string('payment_description');
            $table->tinyInteger('type')->default(1)->comment('2 for extentded');
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
        Schema::dropIfExists('contract_payemts');
    }
}
