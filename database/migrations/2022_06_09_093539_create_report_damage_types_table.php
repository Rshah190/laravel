<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportDamageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_damage_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('damage_report_id')->unsigned()->nullable();
            $table->foreign('damage_report_id')->references('id')->on('damage_reports')->onDelete('cascade');
            $table->bigInteger('damage_type_id')->unsigned()->nullable();
            $table->foreign('damage_type_id')->references('id')->on('damage_types')->onDelete('cascade');
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
        Schema::dropIfExists('report_damage_types');
    }
}
