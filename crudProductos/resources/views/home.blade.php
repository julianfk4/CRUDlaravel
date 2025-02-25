@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mi Perfil: {{ $user -> name }}</div>
                    
                <div class="card-body">
                <p class="h5"> Mis productos:</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Productos de la comunidad</div>
                <div class="card-body">
                
            </div>
        </div>
    </div>
</div>
@endsection
