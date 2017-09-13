<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->integer('console_id')->unsigned()->index();
            $table->date('published')->nullable();
            $table->integer('publisher_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->string('url')->nullable();
            $table->string('coverimage')->nullable();
            $table->string('metagamescore')->nullable();
            $table->timestamps();
            $table->foreign('console_id')->references('id')->on('consoles');
            $table->foreign('publisher_id')->references('id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
