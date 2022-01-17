<?php

function validaCPF($documento)
{

    // Extrai somente os números
    $documento = preg_replace('/[^0-9]/is', '', $documento);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($documento) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $documento)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $documento[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($documento[$c] != $d) {
            return false;
        }
    }
    return true;
}
