<?php

namespace Database\Seeders;

use App\Models\Pages;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
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
                'title' => 'Quem somos?',
                'description' => '
                    <h1>Ana Hilda Negócios Imobiliários</h1>
                    <p>Proporcionar à seus cliente soluções, conclusões e realizações nas suas transações Imobiliárias. 
                    Esta é a missão da Ana Hilda Negócios Imobiliários é uma empresa que atua no mercado de Natal e Grande Natal 
                    há cinco anos e que, apesar da "pouca idade", possui uma carta de clientes fiéis, conquistada devido ao trabalho 
                    sério e honesto</p>
                    <p>Além de realizar negociações de compra e venda de imóveis, a Ana Hilda também administra, loca e avalia seu imóvel, 
                    e ainda indica construtores, engenheiros e arquitetos de confiança para a construção do seu projeto.</p>
                    <p>Tendo como um de seus proprietários, Ana Hilda Muniz Lemos, cuja experiência profissional esteve sempre ligada a área 
                    de vendas. Natural do Rio de Janeiro, gerenciou uma grande empresa de locação de automóveis, quando ainda morava naquela 
                    cidade. Tal contato comercial fez toda a diferença para que ele conseguisse ocupar o seu espaço no mercado potiguar.<p>
                    <br>
                '
            ]
        ];

        foreach($items as $item):
            Pages::create($item);
        endforeach;
    }
}
