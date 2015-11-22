<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsuarioTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(TareaTableSeeder::class);
        $this->call(FaseTableSeeder::class);
        $this->call(RecursoTableSeeder::class);
        
        $this->call(ActividadTableSeeder::class);

        $this->call(Rol_Usuario_TableSeeder::class);
        $this->call(Rol_Tarea_TableSeeder::class);
        $this->call(Fase_Tarea_TableSeeder::class);
        $this->call(Actividad_Recurso_TableSeeder::class);

        $this->call(HistorialTableSeeder::class);

        Model::reguard();
    }
}
