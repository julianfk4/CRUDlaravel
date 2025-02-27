@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <img src="{{ $producto->imagen }}" class="card-img-top" alt="Imagen del producto" style="height: 300px;">
                <div class="card-body text-center">
                    <h3 class="card-title">{{ $producto->name }}</h3>
                    <p class="card-text text-muted">ID: {{ $producto->id }}</p>
                    <p class="card-text text-muted">{{ $producto->descripción }}</p>
                    @if ($producto->id_user == Auth::user()->id)
                        <a class="btn btn-primary" href="/edit/{{ $producto->id }}">editar</a>
                        <a class="btn btn-danger" href="/borrar/{{ $producto->id }}">borrar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-4">
<div class="card mb-3">
<div class="card-body">
    @if ($comentarios)
    <p>No hay comentarios aún. ¡Sé el primero en comentar!</p>
        @foreach( $comentarios as $coment )
        
            <p class="card-text">{{ $coment->comentario }}</p>
            <small class="text-muted">
            {{ $coment->valoración }}
            </small>
        
        @endforeach
    @else
        <p>No hay comentarios aún. ¡Sé el primero en comentar!</p>
    @endif
    <a class="btn btn-primary" href="/crear/{{ Auth::user()->id }}">Comentar</a>
    </div>
    </div>
</div>

@endsection
