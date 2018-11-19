<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $actividades;
    private $productos;
    private $usuarios;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->actividades = factory(App\Actividad::class,12)->create()->each(function ($actividad)
        {
            for ($i=0; $i < mt_rand(1,5); $i++) { 
                $instructor = factory(App\Usuario::class)->create([
                    'empleado' => 'instructor'
                ]);                
                $actividad->clases()->save(factory(App\Clase::class)->create([
                    'email' => $instructor,
                    'id_actividad' => $actividad
                ]));
            }


        });
        $this->productos = factory(App\Producto::class,200)->create();
        $this->usuarios = factory(App\Usuario::class,30)->create()->each(function ($usuario)
        {
            
            if($usuario->empleado == 'cliente'){
                for ($i=0; $i < mt_rand(10,20); $i++) { 
                    $usuario->registrosConsumos()->save(factory(App\RegistroConsumo::class)->create([
                        'id_producto' => $this->productos->random(),
                        'id_usuario' => $usuario->email
                    ]));
                }
                for ($i=0; $i < mt_rand(10,20); $i++) { 
                    $usuario->cuentas()->save(
                        factory(App\Cuenta::class)->create([
                            'email' => $usuario->email
                        ]));
                }
                // registrarlos a unas clases
                for ($i=0; $i < mt_rand(1,10); $i++) { 
                    $usuario->clases()->save($this->actividades->random()->clases()->get()->random());
                }
            }
        });

        


    }
}
