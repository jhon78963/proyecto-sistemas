var indice=0;
var codigos = [];

$('#btnSubmit').attr("disabled", true);
function agregar()
{
    datoscurso=document.getElementById('idcurso').value.split('_');
    for(c in codigos)
    {
        if(datoscurso[0]==codigos[c])
        {
            alert("Curso ya Seleccionado");
            return false;
        }
    }
    codigos[indice]=datoscurso[0];
    fila='<tr id="fila'+indice+'"><td class="text-center"><input type="hidden" name="IDCURSO[]" value="'+datoscurso[0]+'">'+datoscurso[1]+'</td><td class="text-center">'+datoscurso[2]+'</td><td class="text-center">'+datoscurso[3]+'</td><td class="text-center">'+datoscurso[4]+'</td><td><a href="#" onclick="quitar('+indice+')">Quitar</a></td></tr>';
    $('#detalle').append(fila);
    indice++;
    evaluar();
}

function quitar(item)
{
    $('#fila'+item).remove();
    indice--;
    codigos[item]="";
}

function evaluar()
{
    if(indice>0)
        $('#btnSubmit').attr("disabled", false);
    else
        $('#btnSubmit').attr("disabled", true);
}