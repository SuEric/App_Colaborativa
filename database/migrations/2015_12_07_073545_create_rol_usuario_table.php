<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rol_usuario', function(Blueprint $table)
		{
			$table->integer('usuario_id')->index('fk_Usuario_has_Rol_Usuario1_idx');
			$table->integer('rol_id')->index('fk_Usuario_has_Rol_Rol1_idx');
			$table->primary(['usuario_id','rol_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rol_usuario');
	}

}
