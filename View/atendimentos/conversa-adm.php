<?php
include "View/site/topo.php";
?>

<link href="./css/conversa.css" rel="stylesheet" type="text/css" />

<title>Sala de Atendimento</title>

</head>

<body>
    <div class="main">

        <div class="sala-conversa">
            <div class="rotulo-conversando">Conversando:</div>
            <div class="painel-msg" id="painel-msg">
                <?php
                include "View/atendimentos/conversa.php";

                ?>

            </div>

            <div class="escreve">
                <form action="?Controller=Atendimento&Action=enviaConversaADM" name="frmConversa" method="post">
                    <textarea name=" txtMsg" id="cx-msg" class="cx-texto" cols="35" rows="3" placeholder="Escreva aqui sua mensagem" require></textarea>
                    <input type="image" class="btn-envia" src="./img/envia.png">
                </form>
            </div>
        </div>
    </div>

    <script>
        function mostrarMensagens(retorno) {
            var painelLeitura = document.getElementById('painel-msg');

            painelLeitura.innerHTML = retorno;

            $('.painel-msg').animate({
                scrollTop: $('.painel-msg')[0].scrollHeight
            }, 500);
        }

        $(document).ready(function() {

            $('form[name="frmConversa"]').submit("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    url: "?Controller=Atendimento&Action=enviaConversaADM",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(resposta) {
                        mostrarMensagens(resposta);
                        document.getElementById('cx-msg').value = '';
                    }
                })
            });

            setInterval(function() {
                $.ajax({
                    url: "?Controller=Atendimento&Action=ler",
                    type: "GET",
                    success: function(resposta) {
                        mostrarMensagens(resposta);
                    }
                })
            }, 8000);

        });
    </script>
</body>

</html>