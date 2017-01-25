<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginAdditionalLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_additional_labels', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_login')->unsigned();
            $table->integer('id_vault')->unsigned();

            $table->string('label', 30);
            $table->string('value', 50);

            $table->timestamps();

            $table->foreign('id_login')->references('id')->on('logins');
            $table->foreign('id_vault')->references('id')->on('vaults');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_additional_labels');
    }
}
