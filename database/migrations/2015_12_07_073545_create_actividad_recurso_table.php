<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActividadRecursoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actividad_recurso', function(Blueprint $table)
		{
			$table->integer('recurso_id')->index('fk_Recurso_has_Actividad_Recurso1_idx');
			$table->integer('actividad_id')->index('fk_Recurso_has_Actividad_Actividad1_idx');
			$table->primary(['recurso_id','actividad_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actividad_recurso');
	}

}
