@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ventas</h1>

    <table id="sales_table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
            <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->product->nombre }}</td>
                    <td>{{ $sale->cantidad }}</td>
                    <td>${{ number_format($sale->precio, 2) }}</td>
                    <td>${{ number_format($sale->subtotal, 2) }}</td>
                    <td>{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No se encontraron ventas</td>
                </tr>
            @endforelse
        </tbody>
        </thead>
    </table>

    
</div>
@endsection

@section('scripts')

<script>
    $(function () {
        $('#sales_table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
</script>
@endsection