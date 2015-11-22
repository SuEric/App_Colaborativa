<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Rol extends Model
{
	protected $table = 'Rol';
	protected $primaryKey = 'rol_id';
	public $timestamps = false;
	protected $fillable = ['nombre', 'descripcion', 'privilegio'];

	public function usuarios() {
		return $this->belongsToMany('App\Usuario');
	}

	public function tareas() {
		return $this->belongsToMany('App\Tarea');
	}

	public function getFases($id) {
		return DB::table('Rol')
		->select('Fase.fase_id', 'Fase.nombre')
		->join('rol_tarea', 'Rol.rol_id', '=', 'rol_tarea.rol_id')
		->join('Tarea', 'Tarea.tarea_id', '=', 'rol_tarea.tarea_id')
		->join('fase_tarea', 'Tarea.tarea_id', '=', 'fase_tarea.tarea_id')
		->join('Fase', 'Fase.fase_id', '=', 'fase_tarea.fase_id')
		->where('Rol.rol_id', $id)->get();
	}
}
