<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table = 'Usuario';
	protected $primaryKey = 'usuario_id';
	public $timestamps = false;

   public function roles() {
		return $this->belongsToMany('App\Rol');
	}
}
