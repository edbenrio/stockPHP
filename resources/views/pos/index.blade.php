@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Punto de Venta</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('pos.sell') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->quantity }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Venta</button>
    </form>
</div>
@endsection