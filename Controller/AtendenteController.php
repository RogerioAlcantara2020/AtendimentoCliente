<?php
include "Model/DB.php";
include "Model/Atendente/AtendenteModel.php";
include "Model/Atendente/AtendenteVO.php";
include "Model/Atendente/AtendenteDAO.php";

class AtendenteController
{
    public function novo()
    {
        if(!isset($_SESSION["gerente_id"]))
        include "View/Gerente/logar.php"; 
        else
        include "View/atendentes/insere.php";
    }

    public function salvar()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }

        include "View/Gerente/logar.php"; 
        $model = new AtendenteModel();
        $vo = new AtendenteVO();
        $vo->setNomeCompleto($_POST["txtNome"]);
        $vo->setEmail($_POST["txtEmail"]);
        $vo->setSenha($_POST["txtSenha"]);
        $vo->setExpediente($_POST["txtExpediente"]);

        if ($model->insertModel($vo)) {
            $_SESSION["msg"] = "Atendente cadastrado com sucesso!";
        } else {
            $_SESSION["msg"] = "Erro ao  cadastrar o Atendente! <br>O sistema não permite E-mail duplicado.";
        }

        header("location: View/atendentes/retorno.php");
    }


    public function atualizar()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }

        $model = new AtendenteModel();

        $vo = new AtendenteVO();
        $vo->setId($_GET["id"]);
        $vo->setNomeCompleto($_POST["txtNome"]);
        $vo->setEmail($_POST["txtEmail"]);

        if (!empty($_POST["txtSenha"]))
            $vo->setSenha($_POST["txtSenha"]);

        $vo->setExpediente($_POST["txtExpediente"]);

        if ($model->updateModel($vo)) {
            $_SESSION["msg"] = "Atendente atualizado com sucesso!";
        } else {
            $_SESSION["msg"] = "Erro ao  atualizar o Atendente! <br>O sistema não permite E-mail duplicado.";
        }
        header("Location: View/atendentes/retorno.php");
    }


    public function editar()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }

        $model = new AtendenteModel();
        $vo = $model->getByIdModel($_GET["id"]);
        $_SESSION["id_atendente"] = $_GET["id"];
        $_SESSION["criado_atendente"] = $vo->getCriado();
        $_SESSION["atualizado_atendente"] = $vo->getAtualizado();
        $_SESSION["nome_atendente"] = $vo->getNomeCompleto();
        $_SESSION["email_atendente"] = $vo->getEmail();
        $_SESSION["senha_atendente"] = base64_decode($vo->getSenha());
        $_SESSION["txtExpediente"] = $vo->getExpediente();

        include("View/atendentes/edita.php");
    }

    public function listar()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }

        $model = new AtendenteModel();
        $_SESSION["dados"] = $model->allModel();

        include("View/atendentes/listar.php");
    }

    public function deletar()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }
        
        $model = new AtendenteModel();
        $vo = $model->getByIdModel($_GET["id"]);

        if ($model->deleteModel($vo)) {
            header("Location: ?Controller=Atendente&Action=listar");
        }
    }

    public function logar()
    {
        include("View/atendentes/logar.php");
    }

    public function acessar()
    {
        $model = new AtendenteModel();

        $vo = new AtendenteVO();

        $vo->setEmail($_POST["txtEmail"]);
        $vo->setSenha($_POST["txtSenha"]);

        if ($model->getUserModel($vo)) {

            $_SESSION["atendente_id"] = $vo->getId();
            $_SESSION["atendente_nome"] = $vo->getNomeCompleto();
            $_SESSION["atendente_email"] = $vo->getEmail();

            header("Location: ?Controller=Atendimento&Action=gerenciar");
        } else {
            echo "Erro no acesso. Confira suas informações!";
        }
    }
}
