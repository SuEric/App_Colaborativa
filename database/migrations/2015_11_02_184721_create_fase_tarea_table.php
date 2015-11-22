<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaseTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fase_tarea', function(Blueprint $table)
		{
			$table->integer('fase_id')->index('fk_Fase_has_Tarea_Fase1_idx');
			$table->integer('tarea_id')->index('fk_Fase_has_Tarea_Tarea1_idx');
			$table->primary(['fase_id','tarea_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fase_tarea');
	}

}
