<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('adres');
            $table->string('phone');
            $table->boolean('business');
            $table->string('name_representative')->nullable();
            $table->string('adres_representative')->nullable();
            $table->string('phone_representative')->nullable();
            $table->dateTime("from");
            $table->dateTime("till");
            $table->dateTime("decorationtime");
            $table->integer("guests");
            $table->double("rent_room");
            $table->double("rent_security");
            $table->double("rent_sound");
            $table->double("rent_dj");
            $table->double("rent_dj_afterhours");
            $table->double("rent_pioneer-cd");
            $table->double("rent_smokemachine");
            $table->double("rent_lasermachine");
            $table->double("rent_beamer");
            $table->double("rent_standuptables");
            $table->double("rent_stage_parts");
            $table->double("rent_furniture");
            $table->double("buyin_coins");
            $table->double("buyin_liqour");
            $table->double("deposit");
            $table->double("min_bar_revenue");
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
