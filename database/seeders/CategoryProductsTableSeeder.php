<?php

namespace Database\Seeders;

use App\Models\CategoryProducts;
use Illuminate\Database\Seeder;

class CategoryProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Venda'],
            ['title' => 'Aluguel'],
            ['title' => 'Troca'],
            ['title' => 'Temporada'],
        ];

        foreach ($items as $value) {
            CategoryProducts::create($value);
        }
    }
}
