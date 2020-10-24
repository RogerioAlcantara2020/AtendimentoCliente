<?php

include "Model/DB.php";
include "Model/Atendimento/AtendimentoDAO.php";
include "Model/Atendimento/AtendimentoVO.php";
include "Model/Atendimento/AtendimentoModel.php";

include "Model/conversa/ConversaDAO.php";
include "Model/conversa/ConversaModel.php";
include "Model/conversa/ConversaVO.php";

class AtendimentoController
{
    public function novo()
    {
        include("View/atendimentos/insere.php");
    }

    public function iniciar()
    {
        $vo = new AtendimentoVO();

        $nome = $_POST["txtNome"];
        $email = $_POST["txtEmail"];
        $sessao = date("Ymdhsi");

        $vo->setNomeCliente($nome);
        $vo->setEmailCliente($email);

        $_SESSION["id_atendimento"] = $sessao;
        $_SESSION["cliente_nome"] = $nome;
        $_SESSION["cliente_email"] = $email;
        $_SESSION["origem_dialogo"] = 1;

        $vo->setSessaoCliente($sessao);

        $model = new AtendimentoModel();
        $model->insertModel($vo);

        include "View/atendimentos/conversa-cliente.php";
    }

    public function gerenciar()
    {
        if (!isset($_SESSION["atendente_nome"])) {
            include "View/atendentes/logar.php";
        } else {

            $modelConversa = new  AtendimentoModel();
            $vo = $modelConversa->getByStatus(0);

            $_SESSION["sala_espera"] = $vo;

            include("View/atendimentos/gerenciamento.php");
        }
    }

    public function atender()
    {
        $vo = new AtendimentoVO();
        $vo->setId($_GET["id"]);
        $vo->setIdAtendente($_SESSION["atendente_id"]);

        $_SESSION["id_atendimento"] = $_GET["id"];
        $_SESSION["origem_dialogo"] = 0;

        $modelAtendimento = new AtendimentoModel();
        $modelAtendimento->updateModel($vo);

        $voMsg = new ConversaVO();
        $voMsg->setIdConversa($_GET["id"]);
        $voMsg->setOrigemDialogo(0);
        $nome = explode(" ", $_SESSION["atendente_nome"]);
        $voMsg->setMensagem("Olá, me chamo {$nome[0]}. Em que posso ajudá-lo? ");

        $modelConversa = new ConversaModel();
        $modelConversa->insertModel($voMsg);

        $voConversa = $modelConversa->getByIdConversa($_GET["id"]);

        $_SESSION["conversa"] = $voConversa;

        header("Location:?Controller=Atendimento&Action=conversaAdm");
    }

    public function conversaAdm()
    {
        include "View/atendimentos/conversa-adm.php";
    }

    public function enviaConversaADM()
    {
        $vo = new ConversaVO();
        $vo->setIdConversa($_SESSION["id_atendimento"]);
        $vo->setOrigemDialogo($_SESSION["origem_dialogo"]);
        $vo->setMensagem($_POST["txtMsg"]);

        $modelConversa = new ConversaModel();
        $modelConversa->insertModel($vo);

        $voConversa = $modelConversa->getByIdConversa($_SESSION["id_atendimento"]);

        $_SESSION["conversa"] = $voConversa;
        include "View/atendimentos/conversa.php";
    }

    public function ler()
    {
        $vo = new ConversaVO();
        $vo->setIdConversa($_SESSION["id_atendimento"]);

        $modelConversa = new ConversaModel();
        $voConversa = $modelConversa->getByIdConversa($vo->getIdConversa());

        $atendVo = new AtendimentoVO();
        $atendVo->setId($_SESSION["id_atendimento"]);

        $modelAtendimento = new AtendimentoModel();
        $modelAtendimento->updateTimeModel($atendVo);
        
        $_SESSION["conversa"] = $voConversa;
        include "View/atendimentos/conversa.php";
    }

    public function listar()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }
    
        $modelConversa = new  AtendimentoModel();
        $vo = $modelConversa->getAllModel();

        $_SESSION["todos_atendimentos"] = $vo;

        include("View/atendimentos/listar.php");
    }
}
