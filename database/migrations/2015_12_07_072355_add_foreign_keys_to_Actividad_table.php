<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToActividadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Actividad', function(Blueprint $table)
		{
			$table->foreign('tarea_id', 'fk_Actividad_Tarea1')->references('tarea_id')->on('Tarea')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Actividad', function(Blueprint $table)
		{
			$table->dropForeign('fk_Actividad_Tarea1');
		});
	}

}
