<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Atendentes</title>
    <script type="text/javascript" src="./js/jquery-1.9.1.js"></script>
</head>
<body>

<div class="titulo">Formulário para Editar Atendente</div>

    <form name='frmAtualizaAtendente' id="" o method="post">

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="text" name="txtNome" id="txtNome" placeholder="Nome*" title="Nome*" maxlength="100" value="<?PHP echo $_SESSION["nome_atendente"]; ?>" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="email" value="<?PHP echo $_SESSION["email_atendente"]; ?>" name="txtEmail" id="txtEmail" placeholder="E-mail*" title="E-mail*" maxlength="100" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="password" name="txtSenha" id="txtSenha" value="<?PHP echo $_SESSION["senha_atendente"]; ?>" placeholder="Senha*" title="Senha*" maxlength="12" minlength="6" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="expediente">

            <div class="campo-grupo">
                <div class="rotulo-cadastro">
                    <div class="input-cadastro-box">

                        <?php
                        for ($dia = 1; $dia < 8; $dia++) {
                            switch ($dia) {

                                case (1):
                                    $diaSemana = "Domingo";
                                    break;

                                case (2):
                                    $diaSemana = "Segunda-feira";
                                    break;

                                case (3):
                                    $diaSemana = "Terça-feira";
                                    break;

                                case (4):
                                    $diaSemana = "Quarta-feira";
                                    break;

                                case (5):

                                    $diaSemana = "Quinta-feira";
                                    break;
                                case (6):

                                    $diaSemana = "Sexta-feira";
                                    break;

                                case (7):
                                    $diaSemana = "Sábado";
                                    break;
                            }

                            $meusDias = $_SESSION["txtExpediente"];

                        ?>

                            <Label class="rotulo-check"> <input type="checkbox" <?php if (preg_match("%\b{$dia}-\b%", $meusDias)) echo "checked";  ?> name="<?php echo $dia; ?>" id="<?php echo $dia; ?>" onclick="habilitaInicio(this.id)" disabled /><?php echo $diaSemana; ?></Label><br>

                            <select name="inicio<?php echo $dia; ?>" id="inicio<?php echo $dia; ?>" class="select-cadastro" title="Horário Inicial de <?php echo $diaSemana ?>" onchange="habilitaFim(<?php echo $dia; ?>)" disabled>
                                <option>Inicio</option>
                                <?php
                                for ($i = 1; $i < 24; $i++) { ?>
                                    <option value="<?php echo "{$dia}I{$i}:00"; ?>" <?php if (preg_match("%\b{$dia}I{$i}:00\b%", $meusDias)) echo "selected";  ?>><?php echo $i ?>:00</option>
                                <?php  } ?>
                            </select>

                            <select name="final<?php echo $dia; ?>" title="Horário final de <?php echo $diaSemana ?>" id="final<?php echo $dia; ?>" class="select-cadastro" onchange="adicionaExpediente(<?php echo $dia; ?>,this.value)" disabled>
                                <option>Final</option>
                                <?php
                                for ($i = 1; $i < 24; $i++) { ?>
                                    <option value="<?php echo "{$dia}F{$i}:00"; ?>" <?php if (preg_match("%\b{$dia}F{$i}:00\b%", $meusDias)) echo "selected";  ?>><?php echo $i ?>:00</option>
                                <?php  } ?>
                            </select>
                            <hr class="hr-separa">
                        <?php }  ?>

                        <input type="hidden" name="txtEndPoint" class="btn-frm" value="?Controller=Atendente&Action=atualizar&id=<?PHP echo $_SESSION["id_atendente"]; ?>" id="txtEndPoint" required />
                        <input type="hidden" name="txtExpediente" class="btn-frm" value="<?PHP echo $meusDias; ?>" id="txtExpediente" required />
                    </div>
                </div>
            </div>

        </div>


        <input type="hidden" name="txtOperador" value="12" id="txtOperador" />
        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="button" class="button-cadastro" onclick="resetaCampos()" title="Alterar limpará todos os campos" value="Alterar Escala" />
                    <input type="submit" class="button-cadastro"  onclick="enviaFormulario('frmAtualizaAtendente')"  value="Atualizar!" />
                </div>
            </div>
        </div>

    </form>
</body>

</html>