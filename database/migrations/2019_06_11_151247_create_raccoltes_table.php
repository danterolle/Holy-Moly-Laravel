<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaccoltesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Raccoltes', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('Titolo');
            $table->string('UrlImg');
            $table->unsignedBigInteger('User_id');
            $table->timestamps();

            $table->foreign('User_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Raccoltes');
    }
}
