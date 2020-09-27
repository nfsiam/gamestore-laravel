<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostdelreqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postdelreqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('postid');
            $table->string('username');
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
        Schema::dropIfExists('postdelreqs');
    }
}
