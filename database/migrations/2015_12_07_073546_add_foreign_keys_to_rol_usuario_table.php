<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rol_usuario', function(Blueprint $table)
		{
			$table->foreign('rol_id', 'fk_Usuario_has_Rol_Rol1')->references('rol_id')->on('Rol')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('usuario_id', 'fk_Usuario_has_Rol_Usuario1')->references('usuario_id')->on('Usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rol_usuario', function(Blueprint $table)
		{
			$table->dropForeign('fk_Usuario_has_Rol_Rol1');
			$table->dropForeign('fk_Usuario_has_Rol_Usuario1');
		});
	}

}
