<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Fase::class, 50)->create();
    }
}
