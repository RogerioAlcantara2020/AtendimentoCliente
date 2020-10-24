<?php
include "Model/DB.php";
include "Model/IDAO.php";
include "Model/Gerente/GerenteDAO.php";
include "Model/Gerente/GerenteModel.php";
include "Model/Gerente/GerenteVO.php";

class GerenteController
{
 

    public function novo()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        };

        include "View/Gerente/insere.php";
    }

    public function salvar()
    {
           if(!isset($_SESSION["gerente_id"])){
        include "View/Gerente/logar.php";   
        exit;
    }

        $model = new GerenteModel();
        $vo = new GerenteVO();

        $vo->setNomeCompleto($_POST["txtNome"]);
        $vo->setEmail($_POST["txtEmail"]);
        $vo->setSenha($_POST["txtSenha"]);

        if ($model->insertModel($vo)) {
            $_SESSION["msg"] = "Gerente Adicionado com sucesso!";
        } else {
            $_SESSION["msg"] = "Não conseguimos incluir esse Gerente. O sistema não Duplicidade de E-mail.";
        }

        header("location: View/gerente/retorno.php");
    }

    public function editar()
    {

        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }
    
        $model = new GerenteModel();
        $vo = $model->getByIdModel($_GET["id"]);

        $_SESSION["id_gerente"] = $_GET["id"];
        $_SESSION["criado_gerente"] = $vo->getCriado();
        $_SESSION["atualizado_gerente"] = $vo->getAtualizado();
        $_SESSION["nome_gerente"] = $vo->getNomeCompleto();
        $_SESSION["email_gerente"] = $vo->getEmail();
        $_SESSION["senha_gerente"] = base64_decode($vo->getSenha());

        include "View/Gerente/editar.php";
    }
    public function listar()
    {

        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }
    
        $model = new GerenteModel();
        $_SESSION["dados"] = $model->allModel();

        include "View/Gerente/listar.php";
    }

    public function atualizar()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }
    
        $model = new GerenteModel();

        $vo = new GerenteVO();
        $vo->setId($_GET["id"]);
        $vo->setNomeCompleto($_POST["txtNome"]);
        $vo->setEmail($_POST["txtEmail"]);


        if ($model->updateModel($vo)) {
            $_SESSION["msg"] = "Gerente atualizado com sucesso!";
        } else {
            $_SESSION["msg"] = "Erro ao  atualizar o Gerente!";
        }
        header("Location: View/gerente/retorno.php");
    }

    public function deletar()
    {
        if(!isset($_SESSION["gerente_id"])){
            include "View/Gerente/logar.php";   
            exit;
        }
    
        $model = new GerenteModel();

        $vo = new GerenteVO();
        $vo->setId($_GET["id"]);

        $verifica = $model->allModel();
        $verifica = count($verifica);


        if ($verifica < 2) {
            $_SESSION["msg"] = "Deve existir pelo menos um gerente cadastrado!<br>Nada foi alterado.";            
            header("Location: View/gerente/retorno.php");
            
        } else {
            if($model->deleteModel($vo)){
                $_SESSION["msg"] = "Gerente excluído.";            
            header("Location: View/gerente/retorno.php");
           }
        }
           
    }

    public function logar()
    {
        include("View/gerente/logar.php");
    }

    public function acessar()
    {
        $model = new GerenteModel();

        $vo = new GerenteVO();

        $vo->setEmail($_POST["txtEmail"]);
        $vo->setSenha($_POST["txtSenha"]);

        if ($model->getUserModel($vo)) {

            $_SESSION["gerente_id"] = $vo->getId();
            $_SESSION["gerente_nome"] = $vo->getNomeCompleto();
            $_SESSION["gerente_email"] = $vo->getEmail();

            $_SESSION["msg"] = "Logado com sucesso!";
            header("Location: View/Gerente/retorno.php");
        } else {
            echo "Erro no acesso. Confira suas informações!";
        }
    }

}
