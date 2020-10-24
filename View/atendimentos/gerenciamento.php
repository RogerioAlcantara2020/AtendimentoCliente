<?php
$objeto = $_SESSION['sala_espera'];
$formataData = new DateTime();
?>

<div class="titulo">Sala de Espera</div>
<div class="lista">
    <div class="titulo-lista">Dia e Hora</div>
    <div class="titulo-lista">Nome</div>
    <div class="titulo-lista">Ações</div>
</div>

<?php foreach ($objeto as $valor) { ?>
    <div class="lista">
        <div class="titulo-lista"><?php echo  date("d-m-Y  H:s ", strtotime($valor[1])); ?></div>
        <div class="titulo-lista"><?php echo $valor[7];?></div>
        <div class="titulo-lista">
            <a href="?Controller=Atendimento&Action=atender&id=<?php echo $valor[6];?>" target="_blank" ><img src="img/ver.png" title="Ver a Sala" width="50px"></a>
        </div>
    </div>
<?PHP } ?>