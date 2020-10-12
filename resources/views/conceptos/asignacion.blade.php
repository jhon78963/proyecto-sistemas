@extends('layouts.plantilla')

@section('titulo')
    <h3>Conceptos</h3>
@endsection

@section('contenido')
<div class="x_title">
    <h2>Asignacion de <b>Escala</b></h2>
    <div class="clearfix"></div>
  </div>

  <!-- Contenido -->
    <div class="x_content">
        <div class="col">
            <form action="alumno.update">
                <div class="">
                    <label for="">Periodo</label>
                    <select class="form-control" name="AÑOINGRESO" id="PERIODO">
                        <option value="">Seleccione Periodo</option>
                        @for ($i = 2015; $i <= 2020; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="">
                    <label for="">Alumno</label>
                    <select class="form-control" name="IDALUMNO" id="ALUMNO" autocomplete="off">
                        <option value="">Seleccione alumno</option>
                    </select>
                </div>
                <label for="">Año</label>
                <input type="text" name="" id="AÑO">
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{asset('js/propio/concepto/asignacion.js')}}"></script>
@endsection
