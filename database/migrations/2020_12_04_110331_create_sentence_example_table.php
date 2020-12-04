<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentenceExampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentence_example', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('describe_id')->unsigned();
            $table->string('content', 191);
            $table->timestamps();

            $table->foreign('describe_id')->references('id')->on('describe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentance_example');
    }
}
