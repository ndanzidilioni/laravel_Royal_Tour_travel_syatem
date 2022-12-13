<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table){
           
            $table->increments('id');
            $table->string('vehicle_name');
            $table->string('reg_no')->unique();
            $table->string('m_year');
            $table->string('color');
            $table->string('type');
            $table->string('b_type');
            $table->double('cost_per_day');
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
        Schema::drop('vehicle');
    }
}
