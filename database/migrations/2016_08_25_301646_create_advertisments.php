<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->unsignedInteger('type_id');
            $table->double('expense');
            $table->string('description');
            $table->binary('file');
            $table->string('sys');
            $table->string('sys_url');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('advertisement_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('advertisements');
    }
}
