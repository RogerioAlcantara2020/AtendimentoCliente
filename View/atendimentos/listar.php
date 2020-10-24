<?php
$objeto = $_SESSION['todos_atendimentos'];

function calcularData($inicio,$final){
$dataInicial= new DateTime("{$inicio}");
$retorno = $dataInicial->diff(new DateTime("{$final}"));

if($retorno->d > 0 ) echo $retorno->d.' Dias ';
if($retorno->h > 0 ) echo $retorno->h.' Hrs ';
if(($retorno->i) > 0 ) echo $retorno->i.' min ';

}

?>

<div class="titulo">Sala de Espera</div>
<div class="lista">
    <div class="titulo-lista">Dia e Hora Inicio</div>
    <div class="titulo-lista">Dia e Hora Fim</div>
    <div class="titulo-lista">Nome</div>
    <div class="titulo-lista">Ações</div>
</div>

<?php foreach ($objeto as $valor) {
    
    ?>
    <div class="lista">
        <div class="titulo-lista"><?php echo  date("d-m-Y  H:i ", strtotime($valor[1])); ?></div>
        <div class="titulo-lista"><?php echo  date("d-m-Y  H:i ", strtotime($valor[5])); ?><br><?php calcularData($valor[1],$valor[5]); ?></div>
        <div class="titulo-lista"><?php echo $valor[2]; ?></div>
        <div class="titulo-lista">
            <?php if ($valor[4] == 0) { ?>
                <a href="?Controller=Atendimento&Action=atender&id=<?php echo $valor[3]; ?>" target="_blank"><?php echo $valor[4]; ?><img src="img/ver.png" title="Ver a Sala" width="50px"></a>
            <?php } else { ?>
                <img src="img/ver_inativo.png" title="Ver a Sala (Atendimento iniciado)" width="50px">


            <?php } ?>
        </div>
    </div>
<?PHP } ?>