<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToActividadRecursoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actividad_recurso', function(Blueprint $table)
		{
			$table->foreign('actividad_id', 'fk_Recurso_has_Actividad_Actividad1')->references('actividad_id')->on('Actividad')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('recurso_id', 'fk_Recurso_has_Actividad_Recurso1')->references('recurso_id')->on('Recurso')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('actividad_recurso', function(Blueprint $table)
		{
			$table->dropForeign('fk_Recurso_has_Actividad_Actividad1');
			$table->dropForeign('fk_Recurso_has_Actividad_Recurso1');
		});
	}

}
