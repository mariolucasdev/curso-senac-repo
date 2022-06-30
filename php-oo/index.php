<?php

require_once 'src/Conta.php';

// Instancia de um objeto conta
$contaBradesco = new Conta('Bradesco', 0, 'Conta Corrente');

// Buscando o nome da conta e passando para variável nome
$nome = $contaBradesco->nome;

// Buscando tipo de conta
$tipo = $contaBradesco->consultarTipoDeConta();

// Realizando um depósito de 155
$contaBradesco->depositar(155);

// Realizando um saque de 50
$contaBradesco->saque(50);

// Consultando Saldo da Conta
$saldo = $contaBradesco->consultarSaldo();

// Consultando Extrato
$movimentacoes = $contaBradesco->consultarExtrato();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta em POO</title>
</head>
<body>
    <h1> Informações da Conta </h1>
    <p> Descrição: <?= $nome ?> </p>
    <p> Tipo de Conta: <?= $tipo ?> </p>
    <p> Saldo atual: R$ <?= number_format($saldo, 2, '.', ',') ?> </p>

    <h1> Últimas Movimentações </h1>
    <?php if(!empty($movimentacoes)):?>
        <ul>
            <?php foreach($movimentacoes as $movimento): ?>
                <li> <?= $movimento ?> </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
</body>
</html>