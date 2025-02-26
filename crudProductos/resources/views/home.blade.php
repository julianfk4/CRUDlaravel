@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark mb-3">
                <div class="card-header h5">Mi Perfil: </div>
                    
                <div class="card-body">
                <p class="h8"><u> Mis productos:</u></p>
                @if ($producto)
                    @foreach($producto as $prod)
                        <p>{{ $prod->nombre }}</p>
                    @endforeach
                @else
                    <p class="h8"> no existen</p>
                @endif
                <a class="btn btn-primary" href="/crear/{{ $user->id }}">Subir</a>
                <hr></hr>
                <p class="h8"><u> Mis comentarios:</u></p>
                @if ($post)
                    <p class="h8"> estos</p>
                    
                @else
                    <p class="h8"> no existen</p>
                    
                @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">Productos de la comunidad</div>
                @if ($producto)
                    @foreach ($productos as $prods)
                        <p>producto</p>
                    @endforeach 
                @endif
                <div class="card-body">
            </div>
        </div>
    </div>
</div>
@endsection
