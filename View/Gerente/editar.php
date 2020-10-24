<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Gerente</title>
</head>

<body>

    <form name="frmEditaGerente" method="post">
        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="text" name="txtNome" id="txtNome" placeholder="Nome*" title="Nome*" maxlength="100" value="<?PHP echo $_SESSION["nome_gerente"]; ?>" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="email"  value="<?PHP echo $_SESSION["email_gerente"]; ?>" name="txtEmail" id="txtEmail" placeholder="E-mail*" title="E-mail*" maxlength="100" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="password" name="txtSenha"  id="txtSenha" placeholder="Senha*" value="<?PHP echo $_SESSION["senha_gerente"]; ?>" title="Senha*" maxlength="12" minlength="6" class="input-cadastro" required/>
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
            <input type="hidden" name="txtEndPoint" class="btn-frm" value="?Controller=Gerente&Action=atualizar&id=<?PHP echo $_SESSION["id_gerente"]; ?>" id="txtEndPoint" required />

                <div class="input-cadastro-box">
                    <input type="submit" onclick="enviaFormulario('frmEditaGerente')" value="Atualizar!" />
                </div>
            </div>
        </div>

    </form>

</body>

</html>