<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TareaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tarea::class, 50)->create();
    }
}
