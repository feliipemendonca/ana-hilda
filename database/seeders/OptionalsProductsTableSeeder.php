<?php

namespace Database\Seeders;

use App\Models\CategoryOptionalProducts;
use App\Models\OptionalsProducts;
use Illuminate\Database\Seeder;

class OptionalsProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'title' => 'Lazer e Esporte',
                'optional' => [
                    ['title' => 'Academia'],
                    ['title' => 'Churrasqueira'],
                    ['title' => 'Cinema'],
                    ['title' => 'Espaço gourmet'],
                    ['title' => 'Jardim'],
                    ['title' => 'Piscina'],
                    ['title' => 'Playground'],
                    ['title' => 'Quadra de squash'],
                    ['title' => 'Quadra de tênis'],
                    ['title' => 'Quadra poliesportiva'],
                    ['title' => 'Salão de festas'],
                    ['title' => 'Salão de jogos']
                ]
            ],
            [
                'title' => 'Comodidades e Serviços',
                'optional' => [
                    ['title' => 'Acesso para Deficientes'],
                    ['title' => 'Bicicletário'],
                    ['title' => 'Coworking'],
                    ['title' => 'Elevador'],
                    ['title' => 'Lavanderia'],
                    ['title' => 'Sauna'],
                    ['title' => 'Spa'],
                ]
            ],           
            [
                'title' => 'Segurança',
                'optional' => [
                    ['title' => 'Condomínio fechado'],
                    ['title' => 'Portão eletrônico'],
                    ['title' => 'Portaria 24h'],
                ]
            ],
            [
                'title' => 'Diferenciais',
                'optional' => [
                    ['title' => 'Aceita animais'],
                    ['title' => 'Ar-condicionado'],
                    ['title' => 'Closet'],
                    ['title' => 'Cozinha americana'],
                    ['title' => 'Lareira'],
                    ['title' => 'Mobiliado'],
                    ['title' => 'Varanda gourmet'],
                ]
            ]            
        ];

        foreach ($items as $value) {
            $category = new CategoryOptionalProducts;
            $category->title = $value['title'];
            $category->save();

            foreach($value['optional'] as $item){
                $optional = new OptionalsProducts;
                $optional->category_optional_products_id = $category->id;
                $optional->title = $item['title'];
                $optional->save();
            }
        }
    }
}
