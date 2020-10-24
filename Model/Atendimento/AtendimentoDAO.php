<?php

 class AtendimentoDAO 
 {

        public function insert(AtendimentoVO $dados) {
        $SQL = "INSERT INTO atendimento ";
        $SQL.="(criado_em,sessao_cliente,nome_cliente,email_cliente,status_atendimento,avaliacao_atendimento)VALUES";
        $SQL.= "(now(),?,?,?,?,?)";

        $DB = new DB();
        $DB->getConnection();

        $pstm = $DB->execSQL($SQL);

        $sessao =$dados->getSessaoCliente();
        $cliente = $dados->getNomeCliente();
        $email = $dados->getEmailCliente();
        $status = 0;
        $avaliacao = 0;

        $pstm->bind_param("sssss",$sessao,$cliente,$email,$status,$avaliacao);
        
        if($pstm->execute())
        return true;
        else
        return false;
     }

     public function update(AtendimentoVO $dados){
         $SQL = "UPDATE atendimento SET ";
         $SQL.="atualizado_em=now(),encerrado_em=now(),id_atendente=?,";
         $SQL.="status_atendimento=?,avaliacao_atendimento=? WHERE sessao_cliente = ?";

         $DB = new DB();
         $DB->getConnection();

         $id= $dados->getId();
         $idAtendente = $dados->getIdAtendente();
         $statusAtendimento = 1;
         $avaliacao = 0;

         $pstm=$DB->execSQL($SQL);
         $pstm->bind_param("iiii",$idAtendente,$statusAtendimento,$avaliacao,$id);

         if($pstm->execute())
         return true;
         else
         return false;
     }

     public function updateTime(AtendimentoVO $dados){
         $SQL = "UPDATE atendimento SET ";
         $SQL.="atualizado_em=now(),encerrado_em=now()";
         $SQL.=" WHERE sessao_cliente = ?";

         $DB = new DB();
         $DB->getConnection();

         $id= $dados->getId();
         
         $idAtendente = $dados->getIdAtendente();
         

         $pstm=$DB->execSQL($SQL);
         $pstm->bind_param("s",$id);

         if($pstm->execute())
         return true;
         else
         return false;
     }

     public function delete(AtendimentoVO $dados){
         $SQL="DELETE from atendimento WHERE id=?";

         $DB = new DB();
         $DB->getConnection();
         $pstm = $DB->execSQL($SQL);
         $pstm->bind_param("i",$dados->getId());

         if($pstm->execute())
         return true;
         else
         return false;

     }

     public function  getById($id){
         $SQL = "SELECT * FROM atendimento WHERE sessao_cliente=?";

         $DB = new DB;
         $DB->getConnection();

         $query = $DB->execReader($SQL);

         $dados = new atendimentoVO();

         while($reg = $query->fetch_array(MYSQLI_ASSOC)){
             $dados->setId($reg["id"]);
             $dados->setCriado($reg["criado_em"]);
             $dados->setEncerrado($reg["encerrado_em"]);
             $dados->setIdAtendente($reg["id_atendente"]);
             $dados->setSessaoCliente($reg["sessao_cliente"]);
             $dados->setNomeCliente($reg["nome_cliente"]);
             $dados->setEmailCliente($reg["email_cliente"]);
             $dados->setStatusAtendimento($reg["status_atendimento"]);
             $dados->setAvaliacaoAtendimento($reg["avaliacao_atendimento"]);
         }
         return $dados;
     }

     public function  getByStatus($id){
         $SQL = "SELECT * FROM atendimento WHERE status_atendimento= ".addslashes($id);

         $DB = new DB;
         $DB->getConnection();

         $query = $DB->execReader($SQL);

         $dados = new atendimentoVO();

         $array = array();
        

         while($reg = $query->fetch_array(MYSQLI_ASSOC)){
            $array[] =  array($reg["id"],
                        $reg["criado_em"],
                        $reg["encerrado_em"],
                        $reg["id_atendente"],
                        $reg["id"],
                        $reg["encerrado_em"],
                        $reg["sessao_cliente"],
                        $reg["nome_cliente"],
                        $reg["email_cliente"],
                        $reg["status_atendimento"],
                        $reg["avaliacao_atendimento"]);
         }

         return $array;
     }

     public function  getAll(){
         $SQL = "SELECT * FROM atendimento ";

         $DB = new DB();
         $DB->getConnection();

         $query = $DB->execReader($SQL);
 
         $array = array();
 
         while($reg = $query->fetch_array()){
             $array []= array($reg["id"],$reg["criado_em"],$reg["nome_cliente"],$reg["sessao_cliente"],$reg["status_atendimento"],$reg["encerrado_em"]);
         }
 
         return $array;
        }


 }