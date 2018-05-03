<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration {

    public function up()
    {
        Schema::create('job', function(Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('tags');
            $table->string('salary')->nullable();
            $table->string('type')->nullable;
            $table->string('link')->nullable();
            $table->integer('category')->unsigned();

            $table->string('company');
            $table->string('email');
            $table->string('logo')->nullable();            
            $table->string('editLink');
            
            $table->boolean('promoted')->default(false);            
            $table->nullableTimestamps();            
        });
    }

    public function down()
    {
        Schema::drop('job');
    }

}
