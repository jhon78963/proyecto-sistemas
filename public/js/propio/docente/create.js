$(function(){
    $('#IDDOCENTE').on('change', docenteCambio);
});
function docenteCambio(){
    var IDDOCENTE = $(this).val();
    $.get('/api/docente/'+IDDOCENTE, function(data){
        $('#APENOM').val(data.APENOM);
    });
}
