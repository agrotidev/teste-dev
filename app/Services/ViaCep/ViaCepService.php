<?php

namespace App\Services\ViaCep;

use Illuminate\Support\Facades\Http;

class ViaCepService
{
    public function getCep($cep)
    {
        $cep = preg_replace('/[^0-9]/', '', $cep);
        $response = Http::get('https://viacep.com.br/ws/'.$cep.'/json/');

        if ($response->successful()) {
            return $response->json();
        } else {
            return ['error' => 'Não foi possível obter os dados do CEP.'];
        }
    }

}
