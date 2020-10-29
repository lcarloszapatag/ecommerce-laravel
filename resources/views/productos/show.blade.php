@extends('layouts.app')

@section('botones')
    <a href="{{route('productos.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold"><svg class="icono" viewBox="0 0 20 20" fill="currentColor" class="arrow-circle-left w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>Volver</a>
@endsection

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card producto text-left">
            <h1>{{ $producto->titulo }}</h1>
            <div class="row align-items-center">
                <div class="col-sm-6 col-xs-12 mt-2">
                    <img src="/storage/{{$producto->imagen}}" class="w-100">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <p><strong>Descripción</strong></p>
                    <p>{{ $producto->descripcion }}</p>
                    <p><strong>Precio:</strong> {{ $producto->precio }}</p>
                    <p>
                        <a href="#" class="btn btn-success d-block">Agregar al carrito</a>
                    </p>
                </div>
            </div>
            <div class="row">
                @if (auth()->check() && $producto->user_id == auth()->user()->id)
                    <div class="col-sm-6 col-xs-12"></div>
                    <div class="col-sm-3 col-xs-12">
                        <a href='{{ url("/productos/{$producto->id}/edit") }}' class="btn btn-dark d-block mb-2">Editar</a>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <eliminar-producto producto-id="{{$producto->id}}"></eliminar-producto>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
