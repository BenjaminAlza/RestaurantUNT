@extends('almacen.plantillaA')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')
<div class="container">
    <div class="d-flex justify-content-center mb-4">
        <h1 class="card-title" style="font-size: 35px">Gestión de almacén</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="/img/almacen2.jpg" alt="Imagen Llamativa" class="img-fluid mb-4">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="	fas fa-box-open fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestión de Insumos</h5>
                    <p class="card-text">Visualice los insumos disponibles.</p>
                    <a href="{{ route('insumoA.index') }}" class="btn btn-primary">Ver Insumos</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-utensils fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestión de Productos</h5>
                    <p class="card-text">Gestione los productos elaborados.</p>
                    <br>
                    <a href="{{route('productoT.index')}}" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
