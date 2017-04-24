<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupVaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_vaults', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_group')->unsigned();
            $table->integer('id_vault')->unsigned();

            $table->boolean('deleted')->default(false);
            $table->timestamps();

            $table->foreign('id_group')->references('id')->on('groups');
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
        Schema::dropIfExists('group_vaults');
    }
}
