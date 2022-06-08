<?php

//Concatenção de Variáveis

$aluno = "Mário Lucas";
$idade = 27;
$altura = 1.6;
$vacinado = true;

echo "O nome do aluno é: " . $aluno;

$dadosAluno = "Nome: Mário Lucas<br>";
$dadosAluno .= "Idade: 27<br>";
$dadosAluno .= "Altura: 1.6<br>";
$dadosAluno .= "Vacinado: true";

echo $dadosAluno;