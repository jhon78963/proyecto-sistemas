$(function(){
    $('#PERIODO').on('change', periodoCambio);
    $('#ALUMNO').on('change', alumnoCambio);
});

var periodo = 0;

function periodoCambio(){
    periodo = $(this).val();
    $.get('/api/matricula/periodo/'+periodo, function(data){
        var alumnos = '<option value="">Seleccione alumno</option>';
        for (let i = 0; i < data.length; i++){
            var primero = (data.length != 0 && i == 0) ? data[i].IDALUMNO : 0;
            alumnos += '<option value="'+data[i].IDALUMNO+'">'+data[i].NOMBRECOMPLETO+'</option>';
        }
        $('#ALUMNO').html(alumnos);
        // $('#ALUMNO').val(primero);
    });
}

function alumnoCambio(){
    var alumno_id = $(this).val();
    $.get('/api/matricula/'+periodo+'/'+alumno_id, function(data){
        alert(alumno_id);
        alert(data);
        $('#AÑO').val(data.AÑO);
    });
}
