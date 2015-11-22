<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HistorialTableSeeder extends Seeder
{
    /*
     * @return void
     */
    public function run()
    {
        factory(App\Historial::class, 2)->make()->each(function($historial) {
            do {
                $recurso = App\Recurso::find(rand(1,50));
            } while (count($recurso->actividades) == 0);
            do {
                $tarea = $recurso->actividades[rand(0, count($recurso->actividades) - 1)]->tarea;
            } while (count($tarea->fases) == 0 || count($tarea->roles) == 0);
            
            $fase = $tarea->fases[rand(0, count($tarea->fases) - 1)];
            $rol = $tarea->roles[rand(0, count($tarea->roles) - 1 )];

            $historial->recurso()->associate($recurso);
            $historial->tarea()->associate($tarea);
            $historial->fase()->associate($fase);
            $historial->rol()->associate($rol);

            $historial->save();
        });
    }
}
