<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSynonymTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synonym', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('word_id')->unsigned();
            $table->timestamps();

            $table->foreign('word_id')->references('id')->on('word')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('synonym');
    }
}
