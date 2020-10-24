
<?php

class GerenteDAO
{
    public function insert(GerenteVO $dados)
    {
        $SQL = "INSERT INTO gerente (criado_em,nome_completo,email,senha)VALUES ";
        $SQL.= "(now(),?,?,?)";

        $DB = new DB();
        $DB->getConnection();

        $pstm = $DB->execSQL($SQL);

        $nome= $dados->getNomeCompleto();
        $email = $dados->getEmail();
        $senha = $dados->getSenha();
        
        $pstm->bind_param("sss",$nome,$email,$senha);

        if($pstm->execute())
        return true;
        else
        return false;
    }

    public function update(GerenteVO $dados)
    {
        $SQL = "UPDATE gerente SET ";
        $SQL.= "atualizado_em=now(),nome_completo=?,email=?  WHERE id = ?";

        $DB = new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);

        $id=$dados->getId();
        $nome=$dados->getNomeCompleto();
        $email = $dados->getEmail();

        $pstm->bind_param("ssi",$nome,$email,$id);

        if($pstm->execute())
        return true;
        else
        return false;
    }

    public function delete(GerenteVO $dados)
    {
        $SQL="DELETE FROM gerente WHERE id = ?";
        
        $DB = new DB();
        $DB->getConnection();

        $pstm=$DB->execSQL($SQL);
        $id = $dados->getId();
        $pstm->bind_param("i",$id);

        if($pstm->execute())
        return true;
        else
        return false;

    }

    public function getById($id)
    {
        $SQL = "SELECT * FROM gerente WHERE id=".addslashes($id);

        $DB = new DB();
        $DB->getConnection();

        $query = $DB->execReader($SQL);
        $dados = new GerenteVO();

        while($reg = $query->fetch_array(MYSQLI_ASSOC)){
            $dados->setCriado($reg["criado_em"]);
            $dados->setAtualizado($reg["atualizado_em"]);
            $dados->setUltimoAcesso($reg["ultimo_acesso"]);
            $dados->setNomeCompleto($reg["nome_completo"]);
            $dados->setEmail($reg["email"]);
            $dados->setSenha($reg["senha"]);
        }

        return $dados;
    }

    public function getAll()
    {
        $SQL = "SELECT * FROM gerente";

        $DB = new DB();
        $DB->getConnection();
        $query = $DB->execReader($SQL);

        $array = array();

        while($row = $query->fetch_array()){
            $array []= array($row["id"],$row["criado_em"],$row["atualizado_em"],$row["ultimo_acesso"],$row["nome_completo"],$row["email"]);
        }

        return $array;
    }

    public function getUser(GerenteVO $dados)
    {
        $email = $dados->getEmail();
        $senha = $dados->getSenha();

        $SQL = "SELECT * FROM gerente WHERE email ='{$email}' and senha='{$senha}'";

        $DB = new DB();
        $DB->getConnection();
        $query = $DB->execReader($SQL);
        $count = 0;

        while ($reg = $query->fetch_array()) {
            $dados->setId($reg["id"]);
            $dados->setCriado($reg["criado_em"]);
            $dados->setAtualizado($reg["atualizado_em"]);
            $dados->setNomeCompleto($reg["nome_completo"]);
            $dados->setEmail($reg["email"]);
            $dados->setSenha($reg["senha"]);
            $count++;
        }

        if ($count < 1)
            return false;
        else
            return $dados;
    }


}