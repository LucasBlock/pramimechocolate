<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Categoria::class, 1)->create([
            'nome' => 'Bolos',
        ]);
        factory(App\Categoria::class, 1)->create([
            'nome' => 'Bombons',
        ]);
        factory(App\Categoria::class, 1)->create([
            'nome' => 'Doces de festas',
        ]);
        factory(App\Categoria::class, 1)->create([
            'nome' => 'Gelados',
        ]);
    }
}
