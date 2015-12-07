<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tarea', function(Blueprint $table)
		{
			$table->integer('tarea_id', true);
			$table->string('nombre', 45);
			$table->text('descripcion', 65535)->nullable();
			$table->boolean('prioridad')->nullable();
			$table->boolean('tipo')->nullable();
			$table->integer('precedente_id')->nullable()->index('fk_Tarea_Tarea1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Tarea');
	}

}
