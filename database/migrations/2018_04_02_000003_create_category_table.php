<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

    public function up()
    {
        Schema::create('category', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->nullableTimestamps();
        });
    }

    public function down()
    {        
        Schema::drop('category');
    }

}
