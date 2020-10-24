
<?php

date_default_timezone_set('America/Sao_Paulo');

class GerenteModel
{
    public function insertModel(GerenteVO $dados)
    {
        $add = new GerenteDAO();

        $senha = base64_encode($dados->getSenha());
        $dados->setSenha($senha);

        return $add->insert($dados);
    }

    public function updateModel(GerenteVO $dados)
    {
        $upd = new GerenteDAO();

        $senha = base64_encode($dados->getSenha());
        $dados->setSenha($senha);

        return $upd->update($dados);
    }

    public function deleteModel(GerenteVO $dados)
    {
        $del = new GerenteDAO();        
        return $del->delete($dados);
    }

    public function getByIdModel($id)
    {
        $getId = new GerenteDAO();
        $dados = $getId->getById($id);
        
        return $dados;
    }

    public function allModel()
    {
        $all = new GerenteDAO();
        return $all->getAll();
    }

    public function getUserModel(GerenteVO $dados){
        $get = new GerenteDAO();

        $senha = base64_encode($dados->getSenha());
        $dados->setSenha($senha);

        $dados = $get->getUser($dados);
        return $dados;
    }
}
