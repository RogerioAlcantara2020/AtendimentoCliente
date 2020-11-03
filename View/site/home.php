<?php
include_once "./View/site/topo.php";
?>

<script>
function apagar(acao){
    if(window.confirm('Deseja realmente apagar esse Registro?')){
carregaPagina(acao);
    }
}
</script>
<body>
    <input type="checkbox" id="bt_menu_site">
    <label for="bt_menu_site">&#9776;</label>
    <nav class="menu-site">
        <ul class="listaMenu">
            <li><a href="#">Atendentes</a>
                <ul>
                    <li><a href="#" onclick="carregaPagina('?Controller=Atendente&Action=novo')">Cadastrar</a></li>
                    <li><a href="#" onclick="carregaPagina('?Controller=Atendente&Action=listar')">Listar</a></li>
                </ul>
            </li>
            <li><a href="#">Gerente</a>
                <ul>
                    <li><a href="#" onclick="carregaPagina('?Controller=Gerente&Action=novo')">Cadastrar</a></li>
                    <li><a ref="#" onclick="carregaPagina('?Controller=Gerente&Action=listar')">Listar</a></li>
                </ul>
            </li>
            <li><a href="#"> Atendimento</a>
                <ul>
                    <li><a href="#" onclick="carregaPagina('?Controller=Atendimento&Action=listar')">Listar</a></li>
                    <li><a href="#" onclick="carregaPagina('?Controller=Atendimento&Action=novo')">Solicitar Suporte</a></li>
                    <li><a href="#" onclick="carregaPagina('?Controller=Atendimento&Action=gerenciar')">Prestar Suporte</a></li>
                </ul>
            </li>
            <?php
            if(isset($_SESSION["atendente_email"]) ||isset($_SESSION["gerente_email"]) ){
            ?>
            <li><a href="#" onclick="carregaPagina('?Controller=Home&Action=sair')">Sair</a></li>
            <?php
           }
            ?>
        </ul>
    </nav>

    <div id="conteudo">

    </div>

<!-- <footer>
Desenvolvido por Rogério Alcântara -@2020
</footer> -->

    <script>
        function carregaPagina(pagina) {
            var divConteudo = document.getElementById("conteudo");
            $.ajax({
                url: pagina,
                type: "GET",
                success: function(resposta) {
                    divConteudo.innerHTML = resposta;
                }
            })
        }

    </script>
</body>