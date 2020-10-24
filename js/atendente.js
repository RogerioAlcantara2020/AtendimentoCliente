function adicionaExpediente(dia, fim) {
    var txt = document.getElementById("txtExpediente");
    var inicio = document.getElementById("inicio" + dia).value;
    desabilitarCampos(dia);

    txt.value += `${dia}-${inicio}-${fim}|`;
}

function desabilitarCampos(dia) {
    document.getElementById("" + dia).disabled = true;
    document.getElementById("inicio" + dia).disabled = true;
    document.getElementById("final" + dia).disabled = true;
}

function habilitarCampos(dia) {
    document.getElementById("" + dia).disabled = false;
    document.getElementById("inicio" + dia).disabled = false;
    document.getElementById("final" + dia).disabled = false;
}

function habilitaInicio(dia) {
    var meuDia = document.getElementById("" + dia);

    if (meuDia.checked) {
        document.getElementById("inicio" + dia).disabled = false;
    }else{
        document.getElementById("inicio" + dia).disabled = true;
    }
}

function habilitaFim(dia) 
{
    var meuDia = document.getElementById("" + dia);

    if (meuDia.checked) {
        document.getElementById("final" + dia).disabled = false;
    }else{
        document.getElementById("final" + dia).disabled = true;
    }
}

function resetaCampos()
{
    for(let dia =1;dia < 8;dia++)
    {
        meuDia = document.getElementById(""+dia).disabled = false;
        document.getElementById(""+dia).checked = false;

        document.getElementById("final" + dia).disabled = true;
        document.getElementById("final" + dia).value ='Final';

        document.getElementById("inicio" + dia).disabled = true;
        document.getElementById("inicio" + dia).value = 'Inicial';
        }
}