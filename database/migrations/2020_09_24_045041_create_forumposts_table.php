<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forumposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('posttype');
            $table->string('gamename');
            $table->string('username');
            $table->string('status',20)->default('pending');
            $table->string('comment',10)->default('on');
            $table->string('starred',10)->default('no');
            $table->integer('viewcount')->default(0);
            $table->text('title');
            $table->mediumText('body');
            $table->text('codes')->nullable();
            $table->string('fname',1000)->nullable();
            $table->integer('ptime');
            $table->integer('dtime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forumposts');
    }
}
