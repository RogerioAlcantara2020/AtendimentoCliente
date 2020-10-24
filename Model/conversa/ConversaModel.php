<?php

class ConversaModel
{
    public function insertModel(ConversaVO $dados)
    {
        $add = new ConversaDAO();
        return $add->insert($dados);
    }

    public function getByIdConversa($id)
    {
        $getConversa = new ConversaDAO();
        return $getConversa->getById($id);
    }

}