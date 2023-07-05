@extends('layout.plantilla')

@section('titulo','Editar Repartidor')

@section('contenido')
<div>
    <h1>Editar Repartidor</h1>
    <form method="POST" action="{{route('repartidor.update',$repartidor->idRepartidor)}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label>ID:</label>
                <input class="form-control type="text"
                id="id" name="id" value="{{$repartidor->idRepartidor}}" disabled/>
        </div>

        <div class="form-group">
            <label class="control-label">DNI:</label>
                <input class="form-control @error('dni') is-invalid @enderror" type="text"
                id="dni" name="dni" value="{{$repartidor->dni}}" maxlength="8"/>
                <!-- Mensaje posible de error -->
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="control-label">Nombres:</label>
                <input class="form-control @error('nombres') is-invalid @enderror" type="text"
                id="nombres" name="nombres" value="{{$repartidor->nombres}}"/>
                <!-- Mensaje posible de error -->
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="control-label">Dirección:</label>
                <input class="form-control @error('direccion') is-invalid @enderror" type="text"
                id="direccion" name="direccion" value="{{$repartidor->direccion}}"" />
                <!-- Mensaje posible de error -->
                @error('direccion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="control-label">Email:</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text"
                id="email" name="email" value="{{$repartidor->email}}"" />
                <!-- Mensaje posible de error -->
                @error('email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="control-label">Telefono:</label>
                <input class="form-control @error('telefono') is-invalid @enderror" type="text"
                id="telefono" name="telefono" value="{{$repartidor->telefono}}" maxlength="9" />
                <!-- Mensaje posible de error -->
                @error('telefono')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="control-label">Sueldo:</label>
                <input class="form-control @error('sueldo') is-invalid @enderror" type="text"
                id="sueldo" name="sueldo" value="{{$repartidor->sueldo}}" />
                <!-- Mensaje posible de error -->
                @error('sueldo')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
        <a href="{{route('repartidor.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection