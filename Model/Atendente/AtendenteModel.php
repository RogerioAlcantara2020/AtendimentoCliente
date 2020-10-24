<?php

date_default_timezone_set('America/Sao_Paulo');

class AtendenteModel
{
    public function insertModel(AtendenteVO $dados)
    {
        $add = new AtendenteDAO();

        $senha = base64_encode($dados->getSenha());
        $dados->setSenha($senha);
        
        return $add->insert($dados);
    }

    public function updateModel(AtendenteVO $dados)
    {
        $upd = new AtendenteDAO();
       
        $senha = base64_encode($dados->getSenha());
        $dados->setSenha($senha); 
               
        return $upd->update($dados);
    }

    public function deleteModel(AtendenteVO $dados)
    {
        $del = new AtendenteDAO();
        return $del->delete($dados);
    }

    public function getByIdModel($id)
    {
        $getId = new AtendenteDAO();
        $dados = $getId->getById($id);
        
        return $dados;
    }

    public function getUserModel(AtendenteVO $dados){
        $get = new AtendenteDAO();

        $senha = base64_encode($dados->getSenha());
        $dados->setSenha($senha);

        $dados = $get->getUser($dados);
        return $dados;
    }

    public function allModel()
    {
        $all = new AtendenteDAO();
        return $all->getAll();
    }
}
