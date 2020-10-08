$(function(){
    $('#NIVEL').on('change', nivelCambio);
    $('#GRADO').on('change', gradoCambio);
});

function nivelCambio(){
    var nivel_id = $(this).val();

    $.get('/api/nivel/'+nivel_id+'/grados', function(data){
        var html_select = '<option value="">Seleccione Grado</option>'
        for(var i=0;i<data.length;i++)
            html_select += '<option value="'+data[i].IDGRADO+'">'+data[i].GRADO+'</option>';
        $('#GRADO').html(html_select);
    });
}

function gradoCambio(){
    var grado_id = $(this).val();

    $.get('/api/grado/'+grado_id+'/secciones', function(data){
        var html_select = '<option value="">Seleccione Seccion</option>'
        for(var i=0;i<data.length;i++)
            html_select += '<option value="'+data[i].IDSECCION+'">'+data[i].SECCION+'</option>';
        $('#SECCION').html(html_select);
    });
}

