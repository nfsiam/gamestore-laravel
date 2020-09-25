<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postreports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('postid');
            $table->string('reporter');
            $table->string('reporttype');
            $table->integer('rtime');
            $table->string('status',20)->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postreports');
    }
}
