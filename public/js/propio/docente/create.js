$(function(){
    $('#IDDOCENTE').on('change', docenteCambio);
});

function docenteCambio(){
    var IDDOCENTE = $(this).val();
    $.get('/api/docente/'+IDDOCENTE, function(data){
        $('#APENOM').val(data.APENOM);
    });
    $.get('/api/cursosxdocente/'+IDDOCENTE, function (data) {
        var detalle = $('#detallecatedras');
        var html_detalle = '';
        for (let i = 0; i < data.length; i++) {
            html_detalle += '<tr>'+
            '<td class="text-center">'+data[i].IDCURSO+'</td>'+
            '<td class="text-center">'+data[i].APENOM+'</td>'+
            '<td class="text-center">'+data[i].CURSO+'</td>'+
            '<td class="text-center">'+data[i].GRADO+'</td>'+
            '<td class="text-center">'+data[i].SECCION+'</td>'+
        '</tr>';
        }
        detalle.html(html_detalle);
    })
}
