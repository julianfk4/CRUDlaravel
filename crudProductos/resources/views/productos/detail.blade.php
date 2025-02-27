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
    
    @if (count($comentarios)>0)
    
        @foreach( $comentarios as $coment )
        <div class="d-flex gap-3">
            <div>
                <strong>Usuario:</strong>
            </div>
            <div>
                <p class="card-text mb-0">{{ $coment->comentario }}</p>
                <small class="text-muted">{{ $coment->valoracion }} estrellas</small>
            </div>
            @if ($coment->id_user == Auth::user()->id)
            <div>
            <a class="btn btn-danger" href="/borrarc/{{ $coment->id }}">borrar</a>
            </div>
            @endif
        </div>
        @endforeach
    @else
        <p>No hay comentarios aún. ¡Sé el primero en comentar!</p>
    @endif
    
    <form action="{{ route('guardarc') }}" method="POST">
    @csrf
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
        <input type="hidden" name="id_prod" value="{{ $producto->id }}">
        <div class="form-group">
            <label for="comentario">Comentario:</label>
            <textarea name="comentario" id="comentario" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="valoracion">Valoración:</label>
            <select name="valoracion" id="valoracion" class="form-control" required>
                <option value="">Seleccione una opción</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar comentario</button>
    </form>
    </div>
    </div>
</div>

@endsection
