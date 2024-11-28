@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historial de cargas de stock</h1>
    <table id="history_table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
            <tbody>
            @forelse($stocks as $stock)
                <tr>
                    <td>{{ $stock->id }}</td>
                    <td>{{ $stock->product->nombre }}</td>
                    <td>{{ $stock->cantidad }}</td>
                    <td>{{ $stock->created_at->format('d/m/Y H:i') }}</td>
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
        $('#history_table').DataTable({
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
