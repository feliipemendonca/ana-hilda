<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
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
                'title' => 'Email contato',
                'description' => "teste@teste.com",
            ],
            [
                'title' => 'Facebook',
                'description' => 'https://facebook.com',
            ],
            [
                'title' => 'Instagram',
                'description' => 'https://instagram.com',
            ],
            [
                'title' => 'YouTube',
                'description' => 'https://youtube.com',
            ],
            [
                'title' => 'Whatsapp',
                'description' => "00000000000",
            ],
            [
                'title' => 'Endereco',
                'description' => "Rua Gregório de Matos, 26, Loja 03 - Gramado Mall II, Nova Parnamirim, Parnamirim/RN
                    <br>
                    <strong>Fone:</strong> (84) 3608-3246 <br>
                    <strong>E-mail:</strong> contato@anahildaimoveis.com.br",
            ],
            [
                'title' => 'Mapa',
                'description' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4197.009463863399!2d-35.212680032487626!3d-6.266750950337974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b28778d5ddd3a7%3A0x4ef2c348712d2324!2sGoianinha%20-%20RN!5e0!3m2!1spt-BR!2sbr!4v1620775498822!5m2!1spt-BR!2sbr" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'
            ],
            [
                'title' => 'Google Analytics Head',
                'description' => '  '
            ],
            [
                'title' => 'Google Analytics Boby',
                'description' => '  '
            ],
            [
                'title' => 'Descricao do site',
                'description' => 'Proporcionar à seus cliente soluções, conclusões e realizações nas suas transações Imobiliárias. Esta é a missão da Ana Hilda Negócios Imobiliários é uma empresa que atua no mercado de Natal e Grande Natal...'
            ],
            [
                'title' => 'Palavras Chaves',
                'description' => 'Imóveis, casa, aluguel, apartamento, quartos, compra, Imobiliária, negócios, imobiliários,'
            ],
            [
                'title' => 'Simulador',
                'description' => 'http://www8.caixa.gov.br/siopiinternet-web/simulaOperacaoInternet.do?method=inicializarCasoUso'
            ],
        ];

        foreach ($items as $value) {
            Settings::create($value);
        }
    }
}
