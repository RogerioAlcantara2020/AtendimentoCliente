<?php

class ConversaDAO
{
    public function insert(ConversaVO $dados)
    {
        $SQL = "INSERT INTO conversa(id_conversa,origem_dialogo,mensagem)VALUES";
        $SQL .= "(?,?,?)";

        $DB = new DB();
        $DB->getConnection();

        $pstm = $DB->execSQL($SQL);

        $idConversa = $dados->getIdConversa();
        $origemDialogo = $dados->getOrigemDialogo();
        $msg = $dados->getMensagem();

        $pstm->bind_param('iis', $idConversa, $origemDialogo, $msg);

        if ($pstm->execute())
            return true;
        else
            return false;
    }

    public function getById($id)
    {
        $SQL = "SELECT * FROM conversa WHERE id_conversa = ".addslashes($id)." ORDER BY id ASC";

        $DB = new DB();
        $DB->getConnection();

        $query = $DB->execReader($SQL);

        $array = array();

        while ($reg = $query->fetch_array(MYSQLI_ASSOC)) {
            $array[]= array($reg["id_conversa"],$reg["origem_dialogo"],$reg["mensagem"]);
        }
        return $array;
    }
}
