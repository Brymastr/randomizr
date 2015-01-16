<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('codes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code')->unique();
			$table->nullableTimestamps();
		});

		Schema::create('links', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('link');
			$table->foreign('code')->references('code')->on('codes');

			$table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('links');
		Schema::dropIfExists('codes');
	}

}
