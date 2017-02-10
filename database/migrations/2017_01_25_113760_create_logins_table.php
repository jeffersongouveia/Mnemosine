<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_vault')->unsigned();

            $table->string('icon');

            $table->string('name', 50);
            $table->string('username', 30);
            $table->string('password', 50);
            $table->smallInteger('strength');
            $table->ipAddress('ip');
            $table->string('dns', 50);
            $table->string('equipment', 30);
            $table->boolean('favorite');

            $table->boolean('deleted');
            $table->timestamps();

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
        Schema::drop('logins');
    }
}
