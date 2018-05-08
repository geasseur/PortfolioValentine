<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIllustrationPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illustrations', function(Blueprint $table){
          $table->increments('idIllustration');
          $table->string('name',30);
          $table->text('commentaire');
          $table->string('type',10);
          $table->string('src', 255);
          $table->datetime('post');
          $table->datetime('update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('illustrations');
    }
}
