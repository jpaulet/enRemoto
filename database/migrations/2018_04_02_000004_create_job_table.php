<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration {

    public function up()
    {
        Schema::create('job', function(Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->string('position');
            $table->string('tags')->nullable();
            $table->string('salary')->nullable();
            $table->string('type');
            $table->string('link')->nullable();
            $table->integer('enterprise_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->text('description')->nullable();
            $table->boolean('promoted')->default(false);
            
            $table->nullableTimestamps();            
        });

        Schema::table('job', function($table) {
           $table->foreign('enterprise_id')->references('id')->on('enterprise');
        });

        Schema::table('job', function($table) {
           $table->foreign('category_id')->references('id')->on('category');
        });
    }

    public function down()
    {
        Schema::drop('job');
    }

}
