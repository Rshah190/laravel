<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamageReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->string('damage_slug')->nullable();
            $table->string('steering_wheel')->nullabel();
            $table->string('dashboard')->nullable();
            $table->string('centre_console')->nullable();
            $table->string('driver_seat')->nullable();
            $table->string('floor_mat')->nullable();
            $table->string('back_seat')->nullable();
            $table->string('passenger_seat')->nullable();
            $table->string('windows')->nullable();
            $table->string('airco')->nullable();
            $table->string('working_enging')->nullable();
            $table->string('start_enging')->nullable();
            $table->string('hand_brake')->nullable();
            $table->string('exhaust')->nullable();
            $table->string('battery')->nullable();
            $table->string('power_steering')->nullable();
            $table->string('sound_motor')->nullable();
            $table->string('gear')->nullable();
            $table->string('controle_gear')->nullable();
            $table->string('light')->nullable();
            $table->string('windshield_wipers')->nullable();
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
        Schema::dropIfExists('damage_reports');
    }
}
