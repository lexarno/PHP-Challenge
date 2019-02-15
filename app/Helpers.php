<?php

function convertToDecimal($valor) {
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", ".", $valor);
    return $valor;
}

function cleanCPF($cpf)
{
    $cpf = str_replace(".", "", $cpf);
    return str_replace("-", "", $cpf);
}

function convertToMoney($valor) {
    return number_format($valor, 2, ",", ".");
}

function convertDate($date){
    $ex = explode("/",$date);
    $date = $ex[2].'-'.$ex[1].'-'.$ex[0];
    return $date;
}

function prepareSearch($search){
    $ex = explode(' ', $search);
    $result = '%';
    foreach ($ex as $item){
        $result .= $item.'%';
    }
    return $result;
}

function firstCapitalLetter($word){
    return mb_convert_case(mb_strtolower($word), MB_CASE_TITLE, "UTF-8");
}
