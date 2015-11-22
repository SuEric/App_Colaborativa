<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
	protected $table = 'Actividad';
	protected $primaryKey = 'actividad_id';
	public $timestamps = false;
	protected $fillable = ['nombre', 'descripcion'];

	public function tarea() {
		return $this->belongsTo('App\Tarea');
	}

	public function recursos() {
		return $this->belongsToMany('App\Recurso');
	}
}
