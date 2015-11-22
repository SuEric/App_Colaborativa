<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsuarioTableSeeder extends Seeder
{
    /*
     * @return void
     */
    public function run()
    {
        factory(App\Usuario::class, 50)->create();
    }
}
