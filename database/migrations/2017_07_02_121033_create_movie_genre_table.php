<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_genre', function (Blueprint $table) {


            $table->increments('id');
            $table->integer('movie_id')->unsigned()->nullable();
            $table->foreign('movie_id')->references('id')
                ->on('movies')->onDelete('cascade');

            $table->integer('genre_id')->unsigned()->nullable();
            $table->foreign('genre_id')->references('id')
                ->on('genres')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_genre');
    }
}
