<?php

class AtendimentoModel
{
    public function insertModel(AtendimentoVO $dados)
    {
        $add = new AtendimentoDAO();
        return $add->insert($dados);
    }

    public function updateModel(AtendimentoVO $dados)
    {
        $upd = new AtendimentoDAO();
        return $upd->update($dados);
    }

    public function updateTimeModel(AtendimentoVO $dados)
    {
        $upd = new AtendimentoDAO();
        return $upd->updateTime($dados);
    }

    public function delete($id)
    {
        $del = new AtendimentoDAO();
        return $del->delete($id);
    }

    public function getById($id)
    {
        $getId = new AtendimentoDAO();
        return $getId->getById($id);
    }

    public function getByStatus($id){
        $getStatus = new AtendimentoDAO();
        return $getStatus->getByStatus($id) ;    
    }

    public function getAllModel()
    {      
        $getAll = new AtendimentoDAO();
        return $getAll->getAll();
    }
}