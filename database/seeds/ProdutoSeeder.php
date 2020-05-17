<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Produto::class, 1)->create([
            'nome' => 'Bolo de amendoim',
            'preco' => 25.5,
            'categoria_id' => 1,
        ]);
        factory(App\Produto::class, 1)->create([
            'nome' => 'Bolo de Cenoura',
            'preco' => 25.5,
            'categoria_id' => 1,
        ]);
        factory(App\Produto::class, 1)->create([
            'nome' => 'Bolo de Morango',
            'preco' => 25.5,
            'categoria_id' => 1,
        ]);
        factory(App\Produto::class, 1)->create([
            'nome' => 'Bolo de Uva',
            'preco' => 25.5,
            'categoria_id' => 1,
        ]);
        factory(App\Produto::class, 1)->create([
            'nome' => 'Bolo de Abacaxi com limão',
            'preco' => 25.5,
            'categoria_id' => 1,
        ]);

    }
}
