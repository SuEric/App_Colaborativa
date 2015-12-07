<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHistorialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Historial', function(Blueprint $table)
		{
			$table->foreign('recurso_id', 'fk_Historial_Recurso1')->references('recurso_id')->on('Recurso')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Historial', function(Blueprint $table)
		{
			$table->dropForeign('fk_Historial_Recurso1');
		});
	}

}
