<?php

// Soma os valores recebidos por parâmetro
function sumScore( $numOne = 0, $numTwo = 0)
{
   return (float) $numOne + $numTwo; 
}

// Calcula a média
function mediaCalculate($qtd, $total) {
    return $total / $qtd;
}

// Arredonda ou não a média
function roundMedia($media, $round = false) {
    return $round ? round($media) : $media ;
}

// Verifica se houve aprovação ou não
// com base na média atingida e média mínima para aprovação
function checkAprovation( $media, $minMedia ) {
    return ($media >= $minMedia);
}

// Invoca a função de somar pontuação
$totalScore = sumScore(6.5, 6.5);

// Invoca função de calcular média
$media = mediaCalculate(2, $totalScore);

// Invoca função de arredondar ou não,
// O parâmetro 2 diz se será arredondado ou não
$mediaRounded = roundMedia($media, true);

// Checa se houve a aprovação ou não
// O parâmetro 2 é a média mínima estabelecida para aprovação
$aprovation = checkAprovation($mediaRounded, 7);

if($aprovation) {
    echo 'Parabéns você foi aprovado com média: '. $mediaRounded;
} else {
    echo 'Tente outra vez... Média: '. $mediaRounded;
}