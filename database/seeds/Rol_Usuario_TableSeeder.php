<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Rol_Usuario_TableSeeder extends Seeder
{
    /*
     * @return void
     */
    public function run()
    {
        App\Rol::all()->each(function($rol) {
            $rol->save();
            $rol->usuarios()->attach(App\Usuario::find(rand(1,50)));
        });
    }
}
