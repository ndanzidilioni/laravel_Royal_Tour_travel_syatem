<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent',function (Blueprint $table){
            $table->increments('id');
            $table->string('registered')->unique();
            $table->string('name');
            $table->string('number');
            $table->string('email');
            $table->boolean('terminated')->default(0);
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
        Schema::drop('agent');
    }
}
