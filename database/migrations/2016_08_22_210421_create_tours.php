<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours',function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('package_id');
            $table->foreign('package_id')->references('id')->on('package')->onDelete('cascade');
            $table->string('name');
            $table->string('code');
            $table->date('arrival');
            $table->date('departure');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->string('description');
            $table->integer('coustomer_count')->default(0);
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
        Schema::drop('tours');
    }
}
