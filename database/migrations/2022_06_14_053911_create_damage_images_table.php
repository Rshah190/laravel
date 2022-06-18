<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamageImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('damage_report_id')->unsigned()->nullable();
            $table->foreign('damage_report_id')->references('id')->on('damage_reports')->onDelete('cascade');
            $table->string('image')->nullbale();
            $table->integer('type')->comment('1 for Side1 ,2 for Side2,3 for front,4 for back and 5 for interior');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('damage_images');
    }
}
