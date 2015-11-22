<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Rol_Tarea_TableSeeder extends Seeder
{
    /*
     * @return void
     */
    public function run()
    {
        App\Rol::all()->each(function($rol) {
            $rol->tareas()->attach(App\Tarea::find(rand(1,50)));
            $rol->save();
        });
    }
}
