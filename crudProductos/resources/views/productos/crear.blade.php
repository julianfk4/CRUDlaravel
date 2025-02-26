@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir un producto</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('guardar') }}">
                        @csrf
                         <input type="hidden" name="id_user" value="{{ $id }}">
                        <!-- Nombre del producto -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre del producto</label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- URL de imagen del producto -->
                        <div class="row mb-3">
                            <label for="imagen" class="col-md-4 col-form-label text-md-end">Url de imagen del producto</label>
                            <div class="col-md-6">
                                <input id="imagen" type="text"
                                    class="form-control @error('imagen') is-invalid @enderror"
                                    name="imagen" value="{{ old('imagen') }}" required>
                                @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Precio -->
                        <div class="row mb-3">
                            <label for="precio" class="col-md-4 col-form-label text-md-end">Precio</label>
                            <div class="col-md-6">
                                <input id="precio" type="number" step="0.01"
                                    class="form-control @error('precio') is-invalid @enderror"
                                    name="precio" value="{{ old('precio') }}" required>
                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="row mb-3">
                            <label for="descripción" class="col-md-4 col-form-label text-md-end">Descripción</label>
                            <div class="col-md-6">
                                <textarea id="descripción"
                                        class="form-control @error('descripción') is-invalid @enderror"
                                        name="descripción" required>{{ old('descripción') }}</textarea>
                                @error('descripción')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Botón de envío -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar Producto
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
