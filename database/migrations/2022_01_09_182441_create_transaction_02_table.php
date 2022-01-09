<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaction02Table extends Migration
{
    
    public function up()
    {
        Schema::create('transaction_02', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('category_type')->nullable();
            $table->decimal('income', 10, 2)->nullable();
            $table->decimal('expense', 10, 2)->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('transaction_02');
    }
}
