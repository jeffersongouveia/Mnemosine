<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteAdditionalLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_additional_labels', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_note')->unsigned();
            $table->integer('id_vault')->unsigned();

            $table->string('label', 30);
            $table->string('value', 50);

            $table->timestamps();

            $table->foreign('id_note')->references('id')->on('notes');
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
        Schema::dropIfExists('note_additional_labels');
    }
}
