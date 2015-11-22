<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RecursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Recurso::class, 50)->create();
    }
}
