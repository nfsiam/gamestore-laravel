<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermissionRecharge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_recharge', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('permissionstatus');
            $table->string('permittedby');
            $table->timestamps('eventtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_recharge');
    }
}
