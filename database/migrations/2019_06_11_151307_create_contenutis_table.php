<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenutis', function (Blueprint $table) {
            $table->unsignedBigInteger('Raccolte_id');
            $table->string('Track_id');
            $table->string('Track_name');
            $table->string('artista');
            $table->string('album');
            $table->string('UrlImg');
            $table->timestamps();

            $table->foreign('Raccolte_id')->references('id')->on('Raccoltes')->onDelete('cascade');
            $table->primary(['Track_id', 'Raccolte_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenutis');
    }
}
