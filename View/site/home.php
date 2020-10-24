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
            <li><a href="#" onclick="carregaPagina('?Controller=Home&Action=sair')">Sair</a></li>
        </ul>
    </nav>

    <div id="conteudo">

    </div>
    <!-- <a href="?Controller=Atendimento&Action=novo">Quero Atendimento</a><br>
    <a href="?Controller=Atendente&Action=logar">Logar no Sistema</a> -->

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

        // function enviaFormulario(formulario) {

        //     $(`form[name="${formulario}"]`).submit(function(e) {
        //         e.preventDefault();

        //         let endPoint = $('#txtEndPoint').val();
        //         let divConteudo = document.getElementById("conteudo");

        //         var form = $(this).serialize(0);
        //         var dois =form[0];

        //         console.log(dois);

        //         $.ajax({
        //             url:endPoint,
        //             method:'POST',
        //             data:$(this).serialize(),
        //             success:function(resposta){
        //                 divConteudo.innerHTML = resposta; 
        //                 console.log(resposta);
        //             }
                    
        //         })
        //     })
        // }
    </script>
</body>