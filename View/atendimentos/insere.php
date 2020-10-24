<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Janela de Atendimento</title>
</head>

<body>

<div class="titulo">Solicitar Atendimento</div>

    <form name="frmIniciaAtendimento" method="post" action="?Controller=Atendimento&Action=iniciar" target="_blank">
    <input type="hidden" name="txtEndPoint" class="btn-frm" value=" id="txtEndPoint" required />
        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="text" name="txtNome" id="txtNome" placeholder="Nome*" title="Nome*" maxlength="100" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="text" name="txtEmail" id="txtEmail" placeholder="E-mail*" title="E-mail*" maxlength="100" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="submit"   value="Solicitar!" />
                    <!-- <input type="submit"  onclick="enviaFormulario('frmIniciaAtendimento')"  value="Solicitar!" /> -->
                </div>
                <!-- </div> -->
            </div>
        </div>

    </form>

</body>

</html>