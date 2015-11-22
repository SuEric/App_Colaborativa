<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rol_tarea', function(Blueprint $table)
		{
			$table->integer('rol_id')->index('fk_Rol_has_Tarea_Rol1_idx');
			$table->integer('tarea_id')->index('fk_Rol_has_Tarea_Tarea1_idx');
			$table->primary(['rol_id','tarea_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rol_tarea');
	}

}
