<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
			$table->string('name',100);
			$table->string('firstSurname',100);
			$table->string('secondSurname',100);
			$table->integer('age');
			$table->string('gender',12);
		});
		
		 Schema::create('hobbies', function (Blueprint $table) {
			 $table->engine = 'InnoDB';
			 $table->increments('id');
			 $table->timestamps();
			 $table->string('hobbies',120);
			 
			 $table->integer('person_id')->unsigned();
             $table->foreign('person_id')->references('id')->on('persons');
		 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
