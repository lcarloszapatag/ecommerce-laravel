@extends('layouts.app')

@section('botones')
    <a href="{{route('productos.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold"><svg class="icono" viewBox="0 0 20 20" fill="currentColor" class="arrow-circle-left w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>Volver</a>
@endsection

@section('content')
    <h2 class="text-center mb-2">Crear Nuevo Producto</h2>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <form method="POST" action="{{route('productos.store')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Título producto</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Título producto" value="{{old('titulo')}}" />
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="descripcion">Descripción producto</label>
                    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" placeholder="Descripción producto" value="{{old('descripcion')}}" />
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Elige la imagen</label>
                    <input id="imagen" type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" />
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="precio">Precio producto</label>
                    <input type="number" name="precio" class="form-control @error('precio') is-invalid @enderror" id="precio" placeholder="Precio producto" value="{{old('precio')}}" />
                    @error('precio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Producto" >
                </div>
            </form>
        </div>
    </div>
@endsection
