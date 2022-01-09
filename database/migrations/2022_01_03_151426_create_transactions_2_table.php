<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactions_02_Table extends Migration
{
   
    public function up()
    {
        Schema::create('transactions_2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('category_type')->nullable();
            $table->integer('income')->nullable();
            $table->integer('expense')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('transactions_2');
    }
}
