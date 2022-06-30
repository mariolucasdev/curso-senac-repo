<?php

class Conta {

    /**
     * @var string $nome Recebe o nome da conta 
     */
    public string $nome;
    /**
     * @var string $saldo Recebe o
     * saldo inicial da conta 
     */
    public float $saldo;
    /**
     * @var string $tipo Recebe o tipo
     * de conta corrente|poupança 
     */
    public string $tipo;
    /**
     * @var array $extrato Recebe registro
     * de log de todas as movimentações da contao 
     */
    public array $extrato;

    public function __construct($nome, $saldo, $tipo)
    {
        $this->nome = $nome;
        $this->saldo = $saldo;
        $this->tipo = $tipo;
        $this->extrato = array();
    }

    /**
     * @author Mário Lucas | mariolucasdev@gmail.com
     * @since 29 de Junho de 2022
     * Verifica o tipo de conta e
     * retorna um string com o tipo de
     * conta do objeto em questão
     * 
     * Gera o histórico da consulta do tipo
     * de conta
     * @return string
     */
    public function consultarTipoDeConta() :string
    {
        $this->gerarHistorico('Consulta do tipo de conta');
        return $this->tipo;
    }
    
    /**
     * @author Mário Lucas | mariolucasdev@gmail.com
     * @since 29 de Junho de 2022
     * Gera o histórica da consulta
     * Retorna o valor do saldo atual da conta
     * @return float
     */
    public function consultarSaldo() :float
    {
        $this->gerarHistorico('Consulta de saldo');
        return $this->saldo;
    }
    
    /**
     * @author Mário Lucas | mariolucasdev@gmail.com
     * @since 29 de Junho de 2022
     * Gera o histórica da consulta
     * Retorna boolean afirmando que correu tudo
     * bem no processo de depósito
     * @return boolean
     */
    public function depositar( float $valor ) :bool
    {
        $this->saldo += $valor;
        $this->gerarHistorico('Deposito realizado');
        return true;
    }
    
    /**
     * @author Mário Lucas | mariolucasdev@gmail.com
     * @since 29 de Junho de 2022
     * Primeiro verfica se o valor do saldo está 
     * disponível para saque, caso não esteja
     * marca o array com status false, seta uma mensagem de
     * erro e gera o histórico caso contrário, gera o histórico,
     * preenche o array e retorna o array
     * @param float $valor
     * @return array
     */
    public function saque( float $valor) :array
    {
        if(!$this->saldoDisponivel($this->saldo, $valor)):
            $this->gerarHistorico('Tetantiva de Saque, saldo insuficiente');
            return array(
                'status' => false,
                'message' => 'Saldo insuficiente'
            );
        endif;
        
        $this->saldo -= $valor;
        $this->gerarHistorico('Saque realizado');
        return array(
            'status' => true,
            'message' => 'Saque realizado!'
        );;
    }

    /**
     * @author Mário Lucas | mariolucasdev@gmail.com
     * @since 29 de Junho de 2022
     * Método que retorna o extrato
     * @return array
     */
    public function consultarExtrato() :array
    {
        return $this->extrato;
    }

    /**
     * @author Mário Lucas | mariolucasdev@gmail.com
     * @since 29 de Junho de 2022
     * Insere mensagem de histórico no array de histórico
     * @param string $message
     * @return void
     */
    private function gerarHistorico(string $message) :void
    {
        $horaAtual = date('d/m/Y H:i:s');
        $message = $horaAtual .' - '.$message;
        array_push($this->extrato, $message);
    }
    
    /**
     * @author Mário Lucas | mariolucasdev@gmail.com
     * @since 29 de Junho de 2022
     * retorna disponibilidade do saque
     * @param float $saldo
     * @param float $saque
     * @return bool
     */
    public static function saldoDisponivel(float $saldo, float $saque) :bool
    {
        return $saldo < $saque ? false : true;
    }
}