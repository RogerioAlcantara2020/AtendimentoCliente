<?php

class AtendenteDAO
{

    public function insert(AtendenteVO $dados)
    {

        $SQL = "INSERT INTO atendente";
        $SQL .= "(criado_em,nome_completo,email,senha,expediente)VALUES";
        $SQL .= "(now(),?,?,?,?)";

        $DB = new DB();
        $DB->getConnection();

        $pstm = $DB->execSQL($SQL);
        $nome = $dados->getNomeCompleto();
        $email = $dados->getEmail();
        $senha = $dados->getSenha();
        $expediente = $dados->getExpediente();

        $pstm->bind_param("ssss", $nome, $email, $senha, $expediente);

        if($pstm->execute())
            return true; 
            else
            return false;
   
    }


    public function update(AtendenteVO $dados)
    {

        $SQL = "UPDATE atendente SET ";
        $SQL .= "atualizado_em=now(), nome_completo=?,email=?,senha=?,expediente=? WHERE id =?";

        $DB = new DB();
        $DB->getConnection();

        $pstm = $DB->execSQL($SQL);
        $nome = $dados->getNomeCompleto();
        $email = $dados->getEmail();
        $senha = $dados->getSenha();
        $expediente = $dados->getExpediente();
        $id = $dados->getId();

        $pstm->bind_param("ssssi", $nome, $email, $senha,$expediente, $id);

        if ($pstm->execute())
            return true;
             else
            return false;
       
    }

    public function delete(AtendenteVO $id)
    {

        $SQL = "DELETE FROM atendente WHERE id =?";

        $DB = new DB();
        $DB->getConnection();

        $pstm = $DB->execSQL($SQL);
        $pstm->bind_param("i", $id->getId());

        if ($pstm->execute())
            return true;
        else
            return false;
    }


    public function getById($id)
    {
        $SQL = "SELECT * FROM atendente  WHERE id = " . addslashes($id);

        $DB = new DB();
        $DB->getConnection();

        $query = $DB->execReader($SQL);

        $dados = new atendenteVO();

        while ($reg = $query->fetch_array(MYSQLI_ASSOC)) {
            $dados->setId($reg["id"]);
            $dados->setCriado($reg["criado_em"]);
            $dados->setAtualizado($reg["atualizado_em"]);
            $dados->setNomeCompleto($reg["nome_completo"]);
            $dados->setEmail($reg["email"]);
            $dados->setSenha($reg["senha"]);
          
            $dados->setExpediente($reg["expediente"]);
        }

        return $dados;
    }

    public function getUser(AtendenteVO $dados)
    {
        $email = $dados->getEmail();
        $senha = $dados->getSenha();

        $SQL = "SELECT * FROM atendente WHERE email ='{$email}' and senha='{$senha}'";

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
            $dados->setExpediente($reg["expediente"]);
            $count++;
        }

        if ($count < 1)
            return false;
        else
            return $dados;
    }

    public function getAll()
    {
        $SQL = "SELECT * FROM atendente";

        $DB = new DB();
        $DB->getConnection();
        $query = $DB->execReader($SQL);

        $array = array();

        while ($row = $query->fetch_array()) {
            $array[] = array($row["id"], $row["criado_em"], $row["atualizado_em"], $row["ultimo_acesso"], $row["nome_completo"]);
        }

        return $array;
    }
}
