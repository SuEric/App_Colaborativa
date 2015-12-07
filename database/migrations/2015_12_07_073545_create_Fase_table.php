<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Fase', function(Blueprint $table)
		{
			$table->integer('fase_id', true);
			$table->string('nombre', 45);
			$table->text('descripcion')->nullable();
			$table->boolean('prioridad')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Fase');
	}

}
