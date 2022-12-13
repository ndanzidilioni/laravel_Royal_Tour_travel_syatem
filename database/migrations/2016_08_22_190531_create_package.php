<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package',function(Blueprint $table){
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->string('country');
            $table->string('destination');
            $table->integer('days');
            $table->double('price');
            $table->string('description');
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
       Schema::drop('package');
    }
}
