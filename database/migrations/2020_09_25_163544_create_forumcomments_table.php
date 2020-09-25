<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forumcomments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('postid');
            $table->string('username');
            $table->text('comment');
            $table->integer('ctime');
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
        Schema::dropIfExists('forumcomments');
    }
}
