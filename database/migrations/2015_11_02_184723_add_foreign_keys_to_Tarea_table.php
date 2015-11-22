<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Tarea', function(Blueprint $table)
		{
			$table->foreign('precedente_id', 'fk_Tarea_Tarea1')->references('tarea_id')->on('Tarea')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Tarea', function(Blueprint $table)
		{
			$table->dropForeign('fk_Tarea_Tarea1');
		});
	}

}
