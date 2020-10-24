<?php

class AtendimentoVO 
{ 
    private $id;
    private $criado_em;
    private $atualizado_em;
    private $encerrado_em;
    private $id_atendente;
    private $sessao_cliente;
    private $nome_cliente;
    private $email_cliente;
    private $status_atendimento;
    private $avaliacao_atendimento;

    public  function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCriado()
    {
        return $this->criado_em;
    }

    public function setCriado($criado_em)
    {
        $this->criado_em = $criado_em;
    }
    public function getAtualizado(){
        return $this->atualizado_em;
    }

    public function setAtualizado($atualizado_em){
        $this->atualizao_em = $atualizado_em;
    }
    
    public function getEncerrado()
    {
        return $this->id_conversa;
    }

    public function setEncerrado($encerrado_em)
    {
        $this->encerrado = $encerrado_em;
    }


    public function getIdAtendente()
    {
        return $this->id_atendente;
    }

    public function setIdAtendente($id_atendente)
    {
        $this->id_atendente = $id_atendente;
    }

    public function getSessaoCliente()
    {
        return $this->sessao_cliente;
    }

    public function setSessaoCliente($sessao_cliente)
    {
        $this->sessao_cliente = $sessao_cliente;
    }

    public function getNomeCliente()
    {
        return $this->nome_cliente;
    }

    public function setNomeCliente($nome_cliente)
    {
        $this->nome_cliente = $nome_cliente;
    }

    public function getEmailCliente()
    {
        return $this->email_cliente;
    }

    public function setEmailCliente($email_cliente)
    {
        $this->email_cliente =$email_cliente;
    }

    public function getStatusAtendimento()
    {
        return $this->status_atendimento;
    }

    public function setStatusAtendimento($status_atendimento)
    {
        $this->status_atendimento = $status_atendimento;
    }

    public function getAvaliacaoAtendimento()
    {
        return $this->avaliacao_atendimento;
    }

    public function setAvaliacaoAtendimento($avaliacao_atendimento)
    {
        $this->avaliacao_atendimento = $avaliacao_atendimento;
    }


}