<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Fase_Tarea_TableSeeder extends Seeder
{
    /*
     * @return void
     */
    public function run()
    {
        App\Fase::all()->each(function($fase) {
            $fase->tareas()->attach(App\Tarea::find(rand(1,50)));
            $fase->save();
        });
    }
}
