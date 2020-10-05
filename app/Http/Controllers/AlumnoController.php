<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\Matricula;
use App\Nivel;
use App\Grado;
use App\Pais;
use DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alumnos=Alumno::select(DB::raw("*,CONCAT(PRIMERNOMBRE,' ',OTROSNOMBRES,' ',APELLIDOPATERNO,' ',APELLIDOMATERNO) AS NOMBRECOMPLETO"))->where('estado','=','1')->get();
        $niveles=Nivel::all();
        $grados=Grado::all();
        return view('alumno.index',compact('alumnos','niveles','grados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function create($IDMATRICULA,$APELLIDOPATERNO,$APELLIDOMATERNO,$PRIMERNOMBRE,$OTROSNOMBRES,$ESCALA,$AÑOINGRESO)
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // IMPORTANTE: REGISTRAR ALUMNO ANTES QUE MATRICULA
        $data=request()->validate([
            'MODULAR'=>'required|max:8',
            'DNI'=>'required|max:8',
            'APELLIDOPATERNO'=>'required|max:50',
            'APELLIDOMATERNO'=>'required|max:50',
            'PRIMERNOMBRE'=>'required|max:50',
            'OTROSNOMBRES'=>'required|max:50',
            'SEXO'=>'required',
            'FECNACIMIENTO'=>'required',
            'IDPAIS'=>'required',
            'ESCALA'=>'required|max:1',
            'AÑOINGRESO'=>'required|min:4|max:4',
            'IDDEPARTAMENTO'=>'required',
            'IDPROVINCIA'=>'required',
            'IDDISTRITO'=>'required',
            'LENGUAMAT'=>'required',
            'ESTADOCIVIL'=>'required',
            'RELIGION'=>'required',
            'FECBAUTIZO'=>'required',
            'PARROQUIA'=>'required|max:80',
            'LASTCOLEGIO'=>'required|max:80',
            'DIRECCION'=>'required|max:150',
            'TELEFONO'=>'required|max:9',
            'DOMDEPARTAMENTO'=>'required',
            'DOMPROVINCIA'=>'required',
            'DOMDISTRITO'=>'required',
            'TRANSPORTE'=>'required',
            'TIMETRANSPORTE'=>'required|max:3',
            'MATERIAL'=>'required',
            'ENERGIA'=>'required',
            'AGUA'=>'required',
            'DESAGUE'=>'required',
            'SSHH'=>'required',
            'HABITACIONES'=>'required|max:2',
            'HABITANTES'=>'required|max:2',
            'SITUACION'=>'required',
        ],
        [
            'MODULAR.required'=>'Ingrese MODULAR del alumno',
            'MODULAR.max'=>'Maximo 8 caracteres para el MODULAR del alumno',
            'DNI.required'=>'Ingrese DNI del alumno',
            'DNI.max'=>'Maximo 8 caracteres para el DNI del alumno',
            'APELLIDOPATERNO.required'=>'Ingrese APELLIDO PATERNO del alumno',
            'APELLIDOPATERNO.max'=>'Maximo 50 caracteres para el APELLIDO PATERNO del alumno',
            'APELLIDOMATERNO.required'=>'Ingrese APELLIDO MATERNO del alumno',
            'APELLIDOMATERNO.max'=>'Maximo 50 caracteres para el APELLIDO MATERNO del alumno',
            'PRIMERNOMBRE.required'=>'Ingrese PRIMER NOMBRE del alumno',
            'PRIMERNOMBRE.max'=>'Maximo 50 caracteres para el PRIMER NOMBRE del alumno',
            'OTROSNOMBRES.required'=>'Ingrese OTROS NOMBRES del alumno',
            'OTROSNOMBRES.max'=>'Maximo 50 caracteres para OTROS NOMBRES del alumno',
            'SEXO.required'=>'Seleccione un SEXO',
            'FECNACIMIENTO.required'=>'Ingrese FECHA de NACIMIENTO del alumno',
            'IDPAIS.required'=>'Seleccione un pais',
            'ESCALA.required'=>'Ingrese ESCALA del alumno',
            'ESCALA.max'=>'Maximo 1 caracter para el ESCALA del alumno',
            'AÑOINGRESO.required'=>'Digite AÑO de INGRESO del alumno',
            'AÑOINGRESO.min'=>'Minimo 4 digitos para el AÑOINGRESO del alumno',
            'AÑOINGRESO.max'=>'Maximo 4 digitos para el AÑOINGRESO del alumno',
            'IDDEPARTAMENTO.required'=>'Seleccione un DEPARTAMENTO',
            'IDPROVINCIA.required'=>'Seleccione una PROVINCIA',
            'IDDISTRITO.required'=>'Seleccione un DISTRITO',
            'LENGUAMAT.required'=>'Seleccione LENGUA MATERNA del alumno',
            'ESTADOCIVIL.required'=>'Seleccione ESTADO CIVIL del alumno',
            'RELIGION.required'=>'Seleccione RELIGION del alumno',
            'FECBAUTIZO.required'=>'Ingrese FECHA de BAUTIZO del alumno',
            'PARROQUIA.required'=>'Ingrese PARROQUIA de BAUTIZO del alumno',
            'PARROQUIA.max'=>'Maximo 80 caracteres para la PARROQUIA de BAUTIZO del alumno',
            'LASTCOLEGIO.required'=>'Ingrese ULTIMO COLEGIO del alumno',
            'LASTCOLEGIO.max'=>'Maximo 80 caracteres para el ULTIMO COLEGIO del alumno',
            'DIRECCION.required'=>'Ingrese DIRECCION del alumno',
            'DIRECCION.max'=>'Maximo 150 caracteres para el DIRECCION del alumno',
            'TELEFONO.required'=>'Ingrese TELEFONO del alumno',
            'TELEFONO.max'=>'Maximo 9 digitos para el TELEFONO del alumno',
            'DOMDEPARTAMENTO.required'=>'Seleccione un departamento para el hogar del alumno',
            'DOMPROVINCIA.required'=>'Seleccione una provincia para el hogar del alumno',
            'DOMDISTRITO.required'=>'Seleccione un distrito para el hogar del alumno',
            'TRANSPORTE.required'=>'Seleccione el TIPO DE TRANSPORTE del alumno',
            'TIMETRANSPORTE.required'=>'Digite el  TIEMPO de TRANSPORTE del alumno',
            'TIMETRANSPORTE.max'=>'Maximo 3 digitos para el TIEMPO de TRANSPORTE del alumno',
            'MATERIAL.required'=>'Ingrese MATERIAL del hogar del alumno',
            'ENERGIA.required'=>'Ingrese SERVICIO de ENERGIA del hogar del alumno',
            'AGUA.required'=>'Ingrese SERVICIO de AGUA del hogar del alumno',
            'DESAGUE.required'=>'Ingrese SERVICIO de DESAGUE del hogar del alumno',
            'SSHH.required'=>'Ingrese SERVICIO de SSHH del hogar del alumno',
            'HABITACIONES.required'=>'Ingrese NUMERO de HABITACIONES del hogar del alumno',
            'HABITACIONES.max'=>'Maximo 2 digitos para el NUMERO de HABITACIONES del hogar del alumno',
            'HABITANTES.required'=>'Ingrese NUMERO de HABITANTES del hogar del alumno',
            'HABITANTES.max'=>'Maximo 2 digitos para el NUMERO de HABITANTES del alumno',
            'SITUACION.required'=>'Ingrese SITUACION del alumno',
        ]);
        // Alumno::create($request->all());
        $alu = new Alumno();
        $alu->IDALUMNO=$request->IDALUMNO;
        $alu->MODULAR=$request->MODULAR;
        $alu->DNI=$request->DNI;
        $alu->APELLIDOPATERNO=$request->APELLIDOPATERNO;
        $alu->APELLIDOMATERNO=$request->APELLIDOMATERNO;
        $alu->PRIMERNOMBRE=$request->PRIMERNOMBRE;
        $alu->OTROSNOMBRES=$request->OTROSNOMBRES;
        $alu->SEXO=$request->SEXO;
        $alu->FECNACIMIENTO=$request->FECNACIMIENTO;
        $alu->IDPAIS=$request->IDPAIS;
        $alu->ESCALA=$request->ESCALA;
        $alu->AÑOINGRESO=$request->AÑOINGRESO;
        $alu->IDDEPARTAMENTO=$request->IDDEPARTAMENTO;
        $alu->IDPROVINCIA=$request->IDPROVINCIA;
        $alu->IDDISTRITO=$request->IDDISTRITO;
        $alu->LENGUAMAT=$request->LENGUAMAT;
        $alu->ESTADOCIVIL=$request->ESTADOCIVIL;
        $alu->RELIGION=$request->RELIGION;
        $alu->FECBAUTIZO=$request->FECBAUTIZO;
        $alu->PARROQUIA=$request->PARROQUIA;
        $alu->LASTCOLEGIO=$request->LASTCOLEGIO;
        $alu->DIRECCION=$request->DIRECCION;
        $alu->TELEFONO=$request->TELEFONO;
        $alu->DOMDEPARTAMENTO=$request->DOMDEPARTAMENTO;
        $alu->DOMPROVINCIA=$request->DOMPROVINCIA;
        $alu->DOMDISTRITO=$request->DOMDISTRITO;
        $alu->TRANSPORTE=$request->TRANSPORTE;
        $alu->TIMETRANSPORTE=$request->TIMETRANSPORTE;
        $alu->MATERIAL=$request->MATERIAL;
        $alu->ENERGIA=$request->ENERGIA;
        $alu->AGUA=$request->AGUA;
        $alu->DESAGUE=$request->DESAGUE;
        $alu->SSHH=$request->SSHH;
        $alu->HABITACIONES=$request->HABITACIONES;
        $alu->HABITANTES=$request->HABITANTES;
        $alu->SITUACION=$request->SITUACION;
        $alu->estado='1';
        $alu->save();
        // REGISTRAR MATRICULA
        $mat = new Matricula();
        $mat->IDMATRICULA=$request->IDMATRICULA;
        $mat->IDALUMNO=$request->IDALUMNO;
        $mat->FECMATRICULA=$request->FECMATRICULA;
        $mat->IDNIVEL=$request->IDNIVEL;
        $mat->IDGRADO=$request->IDGRADO;
        $mat->IDSECCION=$request->IDSECCION;
        $mat->AÑOINGRESO=$request->AÑOINGRESO;
        $mat->estado='1';
        $mat->save();
        return redirect()->route('alumno.index')->with('datos','Registro Nuevo Guardado ...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Alumno::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alumno=Alumno::find($id);
        $niveles=Nivel::all();
        $grados=Grado::where('IDNIVEL','=',$alumno->IDNIVEL)->get();
        $paises=Pais::all();
        $departamentos=Departamento::where('IDPAIS','=',$alumno->IDPAIS)->get();
        $provincias=Provincia::where('IDDEPARTAMENTO','=',$alumno->IDDEPARTAMENTO)->get();
        $distritos=Distrito::where('IDPROVINCIA','=',$alumno->IDPROVINCIA)->get();
        $domprovincias=Provincia::where('IDDEPARTAMENTO','=',$alumno->DOMDEPARTAMENTO)->get();
        $domdistritos=Distrito::where('IDPROVINCIA','=',$alumno->DOMPROVINCIA)->get();
        // dd($alumno);
        return view('alumno.edit',compact('alumno','niveles','grados','paises','departamentos','provincias','distritos','domprovincias','domdistritos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Alumno::find($id)->update($request->all());
        return redirect()->route('alumno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $alumno=Alumno::findOrFail($id);
        $alumno->estado='0';
        $alumno->save();
        $matriculas = Matricula::where('IDALUMNO','=',$id)->get();
        foreach ($matriculas as $matricula) {
            $matricula->estado='0';
            $matricula->save();
        }
        return redirect()->route('alumno.index')->with('datos','Registro Eliminado ... !');
    }
}
