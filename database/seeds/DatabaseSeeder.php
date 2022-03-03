<?php

use App\Libro;
use App\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Libro::truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('libro_usuario')->truncate();
        

        $this->call(UsuarioSeeder::class);
        $cantUsuarios = 5000;
        factory(Usuario::class,$cantUsuarios)->create();



        $this->call(LibroSeeder::class);
        $cantLibros = 100;
        factory(Libro::class,$cantLibros)->create();


        for($i = 0;$i<20;$i++){

            $usuario = Usuario::all()->random();
            $libro = Libro::all()->random()->id;
            $usuario->libros()->attach($libro);
        }


        Schema::enableForeignKeyConstraints();
    }
}
