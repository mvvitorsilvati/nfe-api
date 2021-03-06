<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $bairros = [
        'Centro',
        'Vila Paris',
        'Vila Nova',
        'São Bento',
        'Interlagos'
    ];

    return [
        'xNome' => $faker->company,
        'CPFCNPJ' => $faker->cnpj(false),
        'active' => true,
        'type' => 'J',

        'xLgr' => $faker->streetName, //Nome do logradouro
        'nro' => rand(100, 800), //Número
        'xCpl' => 'Loja', //Complemento
        'xBairro' => $bairros[rand(0, 4)],
        'cMun' => '852', //Código do Município do Contribuinte, conforme Tabela do IBGE
        'xMun' => $faker->city, //Nome do município
        'UF' => $faker->stateAbbr,
        'CEP' => str_replace('-', '', $faker->postcode),
        'fone' => $faker->phone,
        'user_id' => function () {
            $user = factory(User::class)->create();
            return $user->id;
        }
    ];
});
