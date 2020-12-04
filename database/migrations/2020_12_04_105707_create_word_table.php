<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('language_id')->unsigned();
            $table->string('name', 50)->index();
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('language')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word');
    }
}
