<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->timestamps();

        });
        Schema::create('permission_role', function (Blueprint $table) {
           // $table->engine = 'InnoDB';
            $table->integer('role_id')->unsigned();
            $table->integer('permission_id')->unsigned();

           //  $table->primary(['role_id','permission_id']);
            $table->foreign('permission_id')
                  ->references('id')
                  ->on('permissions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamps();

        });
        Schema::create('role_user', function (Blueprint $table) {
           // $table->engine = 'InnoDB';

            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
           // $table->primary(['role_id','user_id']);
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
           $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
