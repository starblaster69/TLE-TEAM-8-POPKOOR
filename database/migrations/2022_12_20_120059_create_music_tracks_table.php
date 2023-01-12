<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('music_tracks', function (Blueprint $table) {
            //information
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->string('lyrics')->nullable(); //.doc .docx .txt .pdf
            $table->string('translation')->nullable(); //.doc .docx .txt .pdf
            $table->string('choralDirection')->nullable(); //.doc .docx .txt .pdf
            $table->string('sheetMusic')->nullable(); //.doc .docx .txt .pdf

            //audio files
            $table->string('full')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('instrumental')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('solo')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('soloM')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('soloF')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('high')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('high2')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('highMid')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('highMid2')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('lowMid')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('lowMid2')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('low')->nullable(); //.mp3 .wav .ogg .mid .midi
            $table->string('low2')->nullable(); //.mp3 .wav .ogg .mid .midi

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('music_tracks');
    }
};
