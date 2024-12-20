@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Categoría</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $category->nombre }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $category->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categories') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
