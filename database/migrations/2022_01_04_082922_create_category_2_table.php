<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategory_02_Table extends Migration
{
 
    public function up()
    {
        Schema::create('category_2', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->string('type')->nullable();
            $table->string('topic')->nullable();
            $table->integer('user_id')->nullable();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('category_2');
    }
}
