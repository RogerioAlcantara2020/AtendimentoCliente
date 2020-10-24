<?php

class AtendenteVO
{
    private $id;
    private $criado_em;
    private $atualizado_em;
    private $ultimo_acesso;
    private $nome_completo;
    private $operador;
    private $email;
    private $senha;
    private $expediente;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCriado(){
        return $this->criado_em;
    }
    public function setCriado($criado_em){
        $this->criado_em = $criado_em;
    }

    public function getAtualizado(){
        return $this->atualizado_em;
    }
    public function setAtualizado($atualizado_em){
        $this->atualizado_em = $atualizado_em;
    }

    public function getUltimoAcesso(){
        $this->ultimo_acesso;
    }

    public function setUltimoAcesso($ultimo_acesso){
        $this->ultimo_acesso = $ultimo_acesso;
    } 


    public function getNomeCompleto(){
        return $this->nome_completo;
    }

    public function setNomeCompleto($nome_completo){
        $this->nome_completo = $nome_completo;
    }
    
    public function getOperador(){
        return $this->operador;
    }

    public function setOperador($operador){
        $this->operador = $operador;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getExpediente(){
        return $this->expediente;
    }

    public function setExpediente($expediente){
        $this->expediente = $expediente;
    }
}


