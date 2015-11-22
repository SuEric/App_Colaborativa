<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Actividad_Recurso_TableSeeder extends Seeder
{
    /*
     * @return void
     */
    public function run()
    {
        App\Actividad::all()->each(function($actividad) {
            $actividad->recursos()->attach(App\Recurso::find(rand(1,50)));
            $actividad->save();
        });
    }
}
