<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Libraryentry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraryentry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gameid');
            $table->string('ratting');
            $table->string('username');
            $table->timestamps('addedat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libraryentry');
    }
}
