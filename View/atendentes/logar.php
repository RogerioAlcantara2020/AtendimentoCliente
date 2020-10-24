<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Janela de Atendimento</title>
</head>

<body>
  
<div class="titulo">Login de Atendente</div>

    <form name="frmAtendenteLogar" action="" method="post">   

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
                    <input type="password" name="txtSenha" id="txtSenha" placeholder="Senha*" title="Senha*" maxlength="100" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                <input type="hidden" name="txtEndPoint" class="btn-frm" value="?Controller=Atendente&Action=acessar" id="txtEndPoint" required />

                    <input type="submit" onclick="enviaFormulario('frmAtendenteLogar')" value="Logar!" />
                </div>
            </div>
        </div>

    </form>
    

</body>

</html>