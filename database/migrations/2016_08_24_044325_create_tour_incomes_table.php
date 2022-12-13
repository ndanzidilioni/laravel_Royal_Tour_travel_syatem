<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tour_id')->nullable();
            $table->unsignedInteger('income_id');
            $table->double('amount');
            $table->date('date');
            $table->timestamps();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('set null');
            $table->foreign('income_id')->references('id')->on('incomes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tour_incomes');
    }
}
