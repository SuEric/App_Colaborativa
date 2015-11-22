<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolTableSeeder extends Seeder
{
    /*
     * @return void
     */
    public function run()
    {
        factory(App\Rol::class, 50)->create();
    }
}
