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
            $table->double("rent_room")->default(0,0);
            $table->double("rent_security")->default(0,0);
            $table->double("rent_sound")->default(0,0);
            $table->double("rent_dj")->default(0,0);
            $table->double("rent_dj_afterhours")->default(0,0);
            $table->double("rent_pioneer_cd")->default(0,0);
            $table->double("rent_smokemachine")->default(0,0);
            $table->double("rent_lasermachine")->default(0,0);
            $table->double("rent_beamer")->default(0,0);
            $table->double("rent_standuptables")->default(0,0);
            $table->double("rent_stage_parts")->default(0,0);
            $table->double("rent_furniture")->default(0,0);
            $table->double("buyin_coins")->default(0,0);
            $table->double("coin_price")->default(2);
            $table->double("buyin_liqour")->default(0,0);
            $table->double("deposit");
            $table->double("min_bar_revenue");
            $table->double("cost");
            $table->unsignedInteger("user_id");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
