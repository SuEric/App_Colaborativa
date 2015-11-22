<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
   protected $table = 'Historial';
	protected $primaryKey = 'historial_id';
	public $timestamps = false;

	public function rol() {
		return $this->belongsTo('App\Rol');
	}

	public function tarea() {
		return $this->belongsTo('App\Tarea');
	}

	public function fase() {
		return $this->belongsTo('App\Fase');		
	}

	public function recurso() {
		return $this->belongsTo('App\Recurso');		
	}
}
