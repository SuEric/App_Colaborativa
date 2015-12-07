<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rol_tarea', function(Blueprint $table)
		{
			$table->foreign('rol_id', 'fk_Rol_has_Tarea_Rol1')->references('rol_id')->on('Rol')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('tarea_id', 'fk_Rol_has_Tarea_Tarea1')->references('tarea_id')->on('Tarea')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rol_tarea', function(Blueprint $table)
		{
			$table->dropForeign('fk_Rol_has_Tarea_Rol1');
			$table->dropForeign('fk_Rol_has_Tarea_Tarea1');
		});
	}

}
