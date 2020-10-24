<!DOCTYPE html>
<html lang="en">

<head>

    <title>Inserção de Atendentes</title>
</head>

<body>
    <div class="titulo">Formulário para Incluir Atendente</div>

    <form name="frmCadastraAtendente"   action="" method="post">

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
                    <input type="text" name="txtSenha" id="txtSenha" placeholder="Senha*" title="Senha*" maxlength="12" minlength="6" class="input-cadastro" required />
                </div>
            </div>
        </div>

        <div class="expediente">

            <div class="campo-grupo">
                <div class="rotulo-cadastro">
                    <div class="input-cadastro-box">

                        <?php
                        for ($dia = 1; $dia < 8; $dia++) {
                            switch ($dia){

                                case(1):
                                $diaSemana = "Domingo";
                                break;

                                case(2):
                                $diaSemana = "Segunda-feira";
                                break;

                                case(3):
                                $diaSemana = "Terça-feira";
                                break;

                                case(4):
                                $diaSemana = "Quarta-feira";
                                break;

                                case(5):

                                $diaSemana = "Quinta-feira";
                                break;
                                case(6):
                                    
                                $diaSemana = "Sexta-feira";
                                break;

                                case(7):
                                $diaSemana = "Sábado";
                                break;
                            }

                            ?>

                            <Label class="rotulo-check"> <input type="checkbox" name="<?php echo $dia;?>" id="<?php echo $dia;?>" onclick="habilitaInicio(this.id)" /><?php echo $diaSemana;?></Label><br>

                            <select name="inicio<?php echo $dia;?>" id="inicio<?php echo $dia;?>" class="select-cadastro" title="Horário Inicial de <?php echo $diaSemana?>" onchange="habilitaFim(<?php echo $dia;?>)" disabled>
                                <option>Inicio</option>
                                <?php
                                for ($i = 1; $i < 24; $i++) { ?>
                                    <option value="<?php echo "{$dia}I{$i}:00"; ?>"><?php echo $i ?>:00</option>
                                <?php  } ?>
                            </select>

                            <select name="final<?php echo $dia;?>" title="Horário final de <?php echo $diaSemana?>" id="final<?php echo $dia;?>" class="select-cadastro" onchange="adicionaExpediente(<?php echo $dia;?>,this.value)" disabled>
                                <option>Final</option>
                                <?php
                                for ($i = 1; $i < 24; $i++) { ?>
                                    <option  value="<?php echo "{$dia}F{$i}:00"; ?>"><?php echo $i ?>:00</option>
                                <?php  } ?>
                            </select>
                            <hr class="hr-separa">
                        <?php }  ?>
                        <input type="hidden" name="txtEndPoint" class="btn-frm" value="?Controller=Atendente&Action=salvar" id="txtEndPoint" required />

                        <input type="hidden" name="txtExpediente" class="btn-frm" id="txtExpediente" required />
                    </div>
                </div>
            </div>

        </div>

        <div class="campo-grupo">
            <div class="rotulo-cadastro">
                <div class="input-cadastro-box">
                    <input type="button" class="button-cadastro" onclick="resetaCampos()" title="Alterar limpará todos os campos" value="Alterar Escala" />
                    <input type="submit" class="button-cadastro"  onclick="enviaFormulario('frmCadastraAtendente')"  value="Cadastrar!" />
                </div>
            </div>
        </div>

    </form>


</body>

</html>