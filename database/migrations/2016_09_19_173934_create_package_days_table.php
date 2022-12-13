<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_days', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id');
            $table->foreign('package_id')->references('id')->on('package')->onDelete('cascade');
            $table->string('day');
            $table->string('description');
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
        Schema::drop('package_days');
    }
}
