<?php

// Função que recebe 03 entradas
// e retorno um array com soma e média
// valores

function sumAndMedia($one, $two, $tree){

    $soma = $one + $two + $tree;
    $media = $soma / func_num_args();

    $result = array(
        "soma" => $soma,
        "media" => round($media)
    );

    return $result;
}

$res = sumAndMedia(1, 2, 3);
print_r($res);