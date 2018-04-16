<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up()
    {        
        Schema::create('user', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('enterprise_id')->nullable()->unsigned();
            $table->rememberToken();
            $table->nullableTimestamps();
        });
    }

    public function down()
    {
        Schema::drop('user');
    }

}
