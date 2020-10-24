<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção de Atendentes</title>
</head>

<body>
<div class="titulo">Formulário para Cadastrar  Gerente</div>

    <form action=""  name='frmInsereGerente' method="post">

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                <input type="hidden" name="txtEndPoint" class="btn-frm" value="?Controller=Gerente&Action=salvar" id="txtEndPoint" required />

                    <input type="text" name="txtNome" id="txtNome" placeholder="Nome*" title="Nome*" maxlength="100" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="email" name="txtEmail" id="txtEmail" placeholder="E-mail*" title="E-mail*" maxlength="100" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="password" name="txtSenha" id="txtSenha" placeholder="Senha*" title="Senha*" maxlength="12" minlength="6" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="submit" onclick="enviaFormulario('frmInsereGerente')"  value="Cadastrar!" />
                </div>
            </div>
        </div>

    </form>

</body>

</html>