<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescribeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('describe', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('word_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('content', 191);
            $table->timestamps();

            $table->foreign('word_id')->references('id')->on('word')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('describe');
    }
}
