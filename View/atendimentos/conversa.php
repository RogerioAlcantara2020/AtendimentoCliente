<?php

if(empty($_SESSION["conversa"])){
    echo"<span class='rotulo-conversando'>Por favor, aguarde.<br> Em breve você será atendido!</span>";
}

if (isset($_SESSION["conversa"])) {
    $objeto = $_SESSION["conversa"];

    foreach ($objeto as $valor) {

        if ($valor[1] ==  $_SESSION["origem_dialogo"])
            $origem = "origem-fala";
        else $origem = "origem-ouve";

        echo "<div class='{$origem}'>{$valor[2]}</div>";
    }
}

?>

</body>

</html>