<?php 

namespace App\WebService;

class ViaCep{

    public static function consultarCep($cep){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://viacep.com.br/ws/'.$cep.'/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $array = json_decode($response, true);

        return isset($array['cep']) ? $array : null;
    }

}