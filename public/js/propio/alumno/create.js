$( document ).ready(function(){

});
$(function(){
    $('#PAIS').on('change', paisCambio);
    $('#DEPARTAMENTO').on('change', departamentoCambio);
    $('#PROVINCIA').on('change', provinciaCambio);
    $('#DOMDEPARTAMENTO').on('change', domdepartamentoCambio);
    $('#DOMPROVINCIA').on('change', domprovinciaCambio);
});

function paisCambio(){
    var pais_id = $(this).val();

    $.get('/api/pais/'+pais_id+'/departamentos', function(data){
        var html_select = '<option value="">Seleccione departamento</option>'
        for(var i=0;i<data.length;i++)
            html_select += '<option value="'+data[i].IDDEPARTAMENTO+'">'+data[i].DEPARTAMENTO+'</option>';
        $('#DEPARTAMENTO').html(html_select);
        $('#DOMDEPARTAMENTO').html(html_select);
    });
}

function departamentoCambio(){
    var departamento_id = $(this).val();

    $.get('/api/departamento/'+departamento_id+'/provincias', function(data){
        var html_select = '<option value="">Seleccione provincia</option>'
        for(var i=0;i<data.length;i++)
            html_select += '<option value="'+data[i].IDPROVINCIA+'">'+data[i].PROVINCIA+'</option>';
        $('#PROVINCIA').html(html_select);
    });
}

function provinciaCambio(){
    var provincia_id = $(this).val();

    $.get('/api/provincia/'+provincia_id+'/distritos', function(data){
        var html_select = '<option value="">Seleccione distrito</option>'
        for(var i=0;i<data.length;i++)
            html_select += '<option value="'+data[i].IDDISTRITO+'">'+data[i].DISTRITO+'</option>';
        $('#DISTRITO').html(html_select);
    });
}

function domdepartamentoCambio(){
    var departamento_id = $(this).val();

    $.get('/api/departamento/'+departamento_id+'/provincias', function(data){
        var html_select = '<option value="">Seleccione provincia</option>'
        for(var i=0;i<data.length;i++)
            html_select += '<option value="'+data[i].IDPROVINCIA+'">'+data[i].PROVINCIA+'</option>';
        $('#DOMPROVINCIA').html(html_select);
    });
}

function domprovinciaCambio(){
    var provincia_id = $(this).val();

    $.get('/api/provincia/'+provincia_id+'/distritos', function(data){
        var html_select = '<option value="">Seleccione distrito</option>'
        for(var i=0;i<data.length;i++)
            html_select += '<option value="'+data[i].IDDISTRITO+'">'+data[i].DISTRITO+'</option>';
        $('#DOMDISTRITO').html(html_select);
    });
}
