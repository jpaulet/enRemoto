<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterpriseTable extends Migration {

    public function up()
    {
        Schema::create('enterprise', function(Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('link');
            $table->boolean('validated')->default(false);
            $table->text('description');
            $table->integer('user_id')->unsigned();
            
            $table->nullableTimestamps();
        });

        Schema::table('enterprise', function($table) {
           $table->foreign('user_id')->references('id')->on('user');
        });

    }

    public function down()
    {

        Schema::drop('enterprise');
    }

}
