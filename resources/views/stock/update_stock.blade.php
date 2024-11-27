@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Actualizar Stock</h1>

    {{-- Mostrar mensajes de éxito o error --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('update_stock') }}" method="POST">
        @csrf
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="product-select" class="form-label">Producto</label>
                <select name="product_id" id="product-select" class="form-control">
                    <option value="">Seleccione un producto</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->precio }}" data-name="{{ $product->nombre }}">
                            {{ $product->nombre }} (Stock: {{ $product->stock_actual }}, Precio: {{ $product->precio }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="quantity" class="form-label">Cantidad</label>
                <input name="cantidad" type="number" id="quantity" class="form-control" min="1">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Stock</button>
        <a href="" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
