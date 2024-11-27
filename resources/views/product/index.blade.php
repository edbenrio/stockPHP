@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Nuevo Producto</a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th> 
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->descripcion }}</td>
                    <td>${{ $product->precio }}</td>
                    <td>{{ $product->stock_actual }}</td> 
                    <td>{{ $product->category->nombre }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
