<?php

namespace Database\Seeders;

use App\Models\TypeProducts;
use Illuminate\Database\Seeder;

class TypeProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Lançamentos'],
            ['title' => 'Imóveis'],
            ['title' => 'Terrenos'],
        ];

        foreach ($items as $value) {
            TypeProducts::create($value);
        }
    }
}
