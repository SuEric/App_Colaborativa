<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Rol', function(Blueprint $table)
		{
			$table->integer('rol_id', true);
			$table->string('nombre', 45);
			$table->text('descripcion')->nullable();
			$table->boolean('privilegio')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Rol');
	}

}
