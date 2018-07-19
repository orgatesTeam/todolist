<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUTRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UTR', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uer_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->foreign('uer_id')->references('id')->on('users');
            $table->foreign('task_id')->references('id')->on('task');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UTR');
    }
}
