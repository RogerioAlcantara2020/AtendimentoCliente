 function enviaFormulario(formulario) {

            $(`form[name="${formulario}"]`).submit(function(e) {
                e.preventDefault();

                let endPoint = $('#txtEndPoint').val();
                let divConteudo = document.getElementById("conteudo");

                var form = $(this).serialize(0);
                var dois =form[0];

                console.log(dois);

                $.ajax({
                    url:endPoint,
                    method:'POST',
                    data:$(this).serialize(),
                    success:function(resposta){
                        divConteudo.innerHTML = resposta; 
                        console.log(resposta);
                    }
                    
                })
            })
        }