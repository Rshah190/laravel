<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_slug')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('license_no')->nullable();
            $table->datetime('license_date')->nullable();
            $table->date('dob')->nullable();
            $table->string('contact_no')->nullable();
            $table->text('street')->nullable();
            $table->string('house_no')->nullable();
            $table->string('bus_no')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('roles')->onDelete('cascade');
            $table->tinyInteger('company_status')->comment('1 for Yes and 0 for No')->default(0);
            $table->string('company_name')->nullable();
            $table->text('address')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('terms_of_payment')->nullable()->comment('it is in days');
            $table->tinyInteger('status')->default(0)->comment('1 for ACtive and 0 for Inactive');
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
        Schema::dropIfExists('clients');
    }
}
