<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportWheelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_wheels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('damage_report_id')->unsigned()->nullable();
            $table->foreign('damage_report_id')->references('id')->on('damage_reports')->onDelete('cascade');
            $table->string('wheel_type')->nullable();
            $table->bigInteger('damage_type_id')->unsigned()->nullable();
            $table->foreign('damage_type_id')->references('id')->on('damage_types')->onDelete('cascade');
            $table->string('wheel_marque')->nullable();
            $table->string('tire_size')->nullable();
            $table->string('mm')->nullable();

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
        Schema::dropIfExists('report_wheels');
    }
}
