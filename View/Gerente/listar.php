<title>Lista de Gerentes</title>
<?PHP
$dados = $_SESSION["dados"];
?>

    <div class="titulo">Lista de Gerentes</div>
    <div class="lista">
        <div class="titulo-lista">#</div>
        <div class="titulo-lista">Nome</div>
        <div class="titulo-lista"></div>
        <div class="titulo-lista">Ações</div>
    </div>

    <?php foreach ($dados as $valor) { ?>
        <div class="lista">
            <div class="titulo-lista"><?php echo $valor[0]; ?></div>
            <div class="titulo-lista"><?php echo $valor[4]; ?></div>
            <div class="titulo-lista"></div>
            <div class="titulo-lista">
                <a href="#" onclick="carregaPagina('?Controller=Gerente&Action=editar&id=<?php echo $valor[0]; ?>')"><img src="img/editar.png" title="Editar Registro" width="50px"></a>
                <a href="#" onclick="apagar('?Controller=Gerente&Action=deletar&id=<?php echo $valor[0]; ?>');"><img src="img/excluir.png" title="ExcluirRegistro" width="50px"></a>
            </div>
        </div>
    <?PHP } ?>