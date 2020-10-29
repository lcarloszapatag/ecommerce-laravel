@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

@section('content')
    <div class="text-center">
        <h2>Productos</h2>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">ID</th>
                    <th scole="col">Título</th>
                    <th scole="col">Descripción</th>
                    <th scole="col">Precio</th>
                    <th scole="col">Imagen</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->titulo}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>
                            @if ($producto->imagen)
                                <img width="230px" src="/storage/{{ $producto->imagen }}">
                            @endif
                        </td>
                        <td>
                            <a href="{{route('productos.show', ['producto' => $producto->id])}}" class="btn btn-success d-block mb-2">Ver</a>
                            <a href="{{route('productos.edit', ['producto' => $producto->id])}}" class="btn btn-dark d-block mb-2">Editar</a>
                            <eliminar-producto producto-id="{{$producto->id}}"></eliminar-producto>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
