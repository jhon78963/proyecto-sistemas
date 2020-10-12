@extends('layouts.plantilla')

@section('buscador')
    <form class="form-inline my-2 my-lg-0">
        <input name="escala" class="form-control" type="search"  placeholder="Buscar por escala" value="{{$escala}}">
        <input name="descripcion" class="form-control" type="search"  placeholder="Buscar por descripcion" value="{{$descripcion}}">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Buscar</button>
        </span>
    </form>
@endsection

@section('titulo')
    <h3>Conceptos </h3>
@endsection

@section('contenido')
<div class="x_title">
    <h2>Mantenimiento de<b> Conceptos</b></h2>
    <div class="clearfix"></div>
  </div>

  <!-- Contenido -->

    <div class="x_content">
        <div class="col">
            @if(session('datos'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{ session('datos') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped jambo_table bulk_action">
                <thead class="thead-dark">
                    <th>Descripcion</th>
                    <th>Escala</th>
                    <th>Monto</th>
                    <th>Con Mora</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @if ($conceptos->count())
                        @foreach ($conceptos as $concepto)
                            <tr>
                                <td>{{$concepto->descripcion}}</td>
                                <td>{{$concepto->escala}}</td>
                                <td>{{$concepto->monto}}</td>
                                <td>@if($concepto->mora) Si @else No @endif</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-info" href="{{route('concepto.edit',$concepto->id)}}">Editar</a>
                                        <!-- Button trigger modal -->
                                        <a class="btn btn-danger text-white" data-toggle="modal" data-target="#exampleModal{{$concepto->id}}">Eliminar</a>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$concepto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Alumno</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Realmente quieres eliminar este registro?</p>
                                                <div class="alert alert-danger" role="alert">
                                                    Este cambio es irreversible
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form class="btn btn-danger" action="{{route('concepto.destroy',$concepto->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input class="p-0 border-0 text-white" style="background: none;" type="submit" value="Eliminar">
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">¡No hay ningun registro de conceptos!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{$conceptos->links()}}
        </div>
    </div>
@endsection
