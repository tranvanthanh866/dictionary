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
            $table->bigInteger('describe_id')->unsigned();
            $table->string('mp3_uk', 191);
            $table->string('ogg_uk', 191);
            $table->string('mp3_us', 191);
            $table->string('ogg_us', 191);
            $table->string('uk_ipa', 191);
            $table->string('us_ipa', 191);
            $table->timestamps();

            $table->foreign('describe_id')->references('id')->on('describe')->onDelete('cascade');
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
