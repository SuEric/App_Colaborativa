<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
	protected $table = 'Recurso';
	protected $primaryKey = 'recurso_id';
	public $timestamps = false;
	protected $fillable = ['nombre', 'descripcion'];

	public function actividades() {
		return $this->belongsToMany('App\Actividad');
	}
}
