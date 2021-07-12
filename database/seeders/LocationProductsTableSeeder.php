<?php

namespace Database\Seeders;

use App\Models\LocationProducts;
use Illuminate\Database\Seeder;

class LocationProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Apartamento'],
            ['title' => 'Casa'],
            ['title' => 'Casa de vila'],
            ['title' => 'Casa de condomínio'],
            ['title' => 'Casa de Paraia'],
            ['title' => 'Comercial'],
            ['title' => 'Ponto Comercial/Loja/Box'],
            ['title' => 'Hotel/Motel/Pousada'],
            ['title' => 'Garagem'],
            ['title' => 'Galpão/Depósito/Armazém'],
            ['title' => 'Escritório'],
            ['title' => 'Estudio'],
            ['title' => 'Prédio/Edifício Inteiro'],
            ['title' => 'Lote/Terreno'],
            ['title' => 'Loft'],
            ['title' => 'Kitnet/Conjugado'],
            ['title' => 'Fazenda/Sítio/Chácara'],
            ['title' => 'Cobertura'],
            ['title' => 'Terreno'],
            ['title' => 'Flat'],
            ['title' => 'Rural'],
            ['title' => 'Outros'],
        ];

        foreach ($items as $value) {
            LocationProducts::create($value);
        }
    }
}
