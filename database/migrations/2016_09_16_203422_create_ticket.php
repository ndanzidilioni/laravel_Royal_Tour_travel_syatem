<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('agent_id');
            $table->string('from');
            $table->string('to');
            $table->date('departure');
            $table->string('class');
            $table->integer('qty');
            $table->string('note')->nullable();
            $table->double('amount');
            $table->boolean('received')->default(0);
            $table->double('payment')->nullable();
            $table->boolean('payed')->default(0);
            $table->boolean('terminated')->default(0);
            $table->date('create');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agent')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket');
    }
}
