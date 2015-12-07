<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActividadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Actividad', function(Blueprint $table)
		{
			$table->integer('actividad_id', true);
			$table->string('nombre', 45);
			$table->text('descripcion')->nullable();
			$table->integer('tarea_id')->index('fk_Actividad_Tarea1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Actividad');
	}

}
