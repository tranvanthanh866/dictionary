<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePronunciationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronunciation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('word_id')->unsigned();
            $table->string('uk', 191);
            $table->string('us', 191);
            $table->string('IPA_uk', 191);
            $table->string('IPA_us', 191);
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
        Schema::dropIfExists('pronunciation');
    }
}
