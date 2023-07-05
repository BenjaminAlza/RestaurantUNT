@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <h1>Desea eliminar Repartidor ?</h1>
    <br>
    <b>Codigo:</b>
    {{$repartidor->idRepartidor}}
    <b>  - DNI:</b>
    {{$repartidor->dni}}
    <b>  - Nombres:</b>
    {{$repartidor->nombres}}
    <b>  - Direccion:</b>
    {{$repartidor->direccion}}
    <b>  - Email:</b>
    {{$repartidor->email}}
    <b>  - Teléfono:</b>
    {{$repartidor->telefono}}
    <b>  - Teléfono:</b>
    {{$repartidor->sueldo}}
    <hr>
    <form method="POST" action="{{route('repartidor.destroy',$repartidor->idRepartidor)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
        <a href="{{route('repartidor.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
    </form>
    
</div>
@endsection