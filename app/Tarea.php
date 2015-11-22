<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
	protected $table = 'Tarea';
	protected $primaryKey = 'tarea_id';
	public $timestamps = false;

	protected $fillable = ['nombre', 'descripcion'];

	public function actividades() {
		return $this->hasMany('App\Actividad');
	}

	public function roles() {
		return $this->belongsToMany('App\Rol');
	}

	public function fases() {
		return $this->belongsToMany('App\Fase');
	}

	/*
	public function tarea() {
		return $this->hasOne('App\Tarea', '');
	}
	*/
}
