<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Fase extends Model
{
	protected $table = 'Fase';
	protected $primaryKey = 'fase_id';
	public $timestamps = false;
	protected $fillable = ['nombre', 'descripcion'];
   
   public function tareas() {
		return $this->belongsToMany('App\Tarea');
	}

	public function getRoles($id) {
		return DB::table('Fase')
					->select('Rol.rol_id', 'rol.nombre')
					->join('fase_tarea', 'Fase.fase_id', '=', 'fase_tarea.fase_id')
					->join('Tarea', 'Tarea.tarea_id', '=', 'fase_tarea.tarea_id')
					->join('rol_tarea', 'Tarea.tarea_id', '=', 'rol_tarea.tarea_id')
					->join('Rol', 'Rol.rol_id', '=', 'rol_tarea.rol_id')
					->where('Fase.fase_id', $id)
					->get();
	}
}
