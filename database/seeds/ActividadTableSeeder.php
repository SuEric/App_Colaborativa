<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ActividadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Actividad::class, 50)->make()->each(function($actividad) {
        	$actividad->tarea()->associate(App\Tarea::find(rand(1,50)));
            $actividad->save();
        });
    }
}
