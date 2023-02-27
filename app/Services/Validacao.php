<?php 

namespace App\Services;

class Validacao
{

    public function validaCPF($cpf) { 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public function validaCartaoNacionalSaude($cns){

        //  LIMPO A MASCARA SE HOUVER
        $cns = preg_replace('/[^0-9]/', '', (string) $cns);

        //  VALIDA A QUANTIDADE DE NUMEROS
        if (strlen($cns) != 15) {
            return false;
        }

        // VALIDA SE HÁ REPETIÇÃO DE NÚMEROS
        $invalidos = [
            '000000000000000',
            '111111111111111',
            '222222222222222',
            '333333333333333',
            '444444444444444',
            '555555555555555',
            '666666666666666',
            '777777777777777',
            '888888888888888',
            '999999999999999'
        ];

        if (in_array($cns, $invalidos)) {
            return false;
        }

        // VALIDA A SOMA DO PIS
        $acao = substr($cns, 0, 1);

        switch ($acao):
            case '1':
            case '2':
                $ret = $this->validaCns($cns);
                break;
            case '7':
                $ret = $this->validaCnsProvisorio($cns);
                break;
            case '8':
                $ret = $this->validaCnsProvisorio($cns);
                break;
            case '9':
                $ret = $this->validaCnsProvisorio($cns);
                break;
            default:
                $ret = false;
        endswitch;

        return $ret;
    }

    public function validaCns($cns){
        // VALIDA A SOMA DO PIS
        $pis = substr($cns, 0, 11);
        $soma = 0;

        for ($i = 0, $j = strlen($pis), $k = 15; $i < $j; $i++, $k--) :
            $soma += $pis[$i] * $k;
        endfor;

        $dv = 11 - fmod($soma, 11);
        $dv = ($dv != 11) ? $dv : '0'; // retorna '0' se for igual a 11

        if ($dv == 10) {
            $soma += 2;
            $dv = 11 - fmod($soma, 11);
            $resultado = $pis . '001' . $dv;
        } else {
            $resultado = $pis . '000' . $dv;
        }

        if ($cns != $resultado) {
            return false;
        } else {
            return true;
        }
    }

    public function validaCnsProvisorio($cns){
        $soma = 0;

        for ($i = 0, $j = strlen($cns), $k = $j; $i < $j; $i++, $k--) :
            $soma += $cns[$i] * $k;
        endfor;

        return $soma % 11 == 0 && $j == 15;
    }

}