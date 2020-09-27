<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rechargerequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechargerequest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requester');
            $table->string('amount');
            $table->string('status');
            $table->string('actionby');
            $table->timestamps('actionat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rechargerequest');
    }
}
