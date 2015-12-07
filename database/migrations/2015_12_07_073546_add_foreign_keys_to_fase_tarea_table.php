<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFaseTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fase_tarea', function(Blueprint $table)
		{
			$table->foreign('fase_id', 'fk_Fase_has_Tarea_Fase1')->references('fase_id')->on('Fase')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('tarea_id', 'fk_Fase_has_Tarea_Tarea1')->references('tarea_id')->on('Tarea')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fase_tarea', function(Blueprint $table)
		{
			$table->dropForeign('fk_Fase_has_Tarea_Fase1');
			$table->dropForeign('fk_Fase_has_Tarea_Tarea1');
		});
	}

}
