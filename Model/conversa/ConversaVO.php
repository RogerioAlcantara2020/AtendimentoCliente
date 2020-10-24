<?php

class ConversaVO
{
    private $id;
    private $id_conversa;
    private $origem_dialogo;
    private $mensagem;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getIdConversa()
    {
        return $this->id_conversa;
    }

    public function setIdConversa($id_conversa)
    {
        $this->id_conversa = $id_conversa;
    }



    public function getOrigemDialogo()
    {
        return $this->origem_dialogo;
    }

    public function setOrigemDialogo($origem_dialogo)
    {
        $this->origem_dialogo = $origem_dialogo;
    }

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }
}
