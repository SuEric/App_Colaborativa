<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistorialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Historial', function(Blueprint $table)
		{
			$table->dateTime('fecha');
			$table->string('tarea_id', 45);
			$table->string('rol_id', 45);
			$table->string('fase_id', 45);
			$table->integer('recurso_id')->index('fk_Historial_Recurso1_idx');
			$table->primary(['tarea_id','rol_id','fase_id','recurso_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Historial');
	}

}
