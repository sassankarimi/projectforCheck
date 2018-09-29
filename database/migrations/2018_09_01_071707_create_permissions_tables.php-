<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePermissionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('permissions', function (Blueprint $table) {

           // $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->timestamps();

        });
        //Schema::table('permissions', function($table) {

        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
