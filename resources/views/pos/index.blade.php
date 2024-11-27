@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Punto de Venta</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            {{ session('error') }}
            <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif

    <form action="{{ route('movements.store') }}" method="POST" id="pos-form">
        @csrf
        <div class="mb-3">
            <label for="product-select" class="form-label">Producto</label>
            <select id="product-select" class="form-control">
                <option value="">Seleccione un producto</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->precio }}" data-name="{{ $product->nombre }}">
                        {{ $product->nombre }} (Stock: {{ $product->stock_actual }}, Precio: {{ $product->precio }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" id="quantity" class="form-control" min="1">
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-secondary" id="add-product">Agregar Producto</button>
        </div>

        <h3>Productos seleccionados</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="product-table">
                
            </tbody>
        </table>

        <div class="mb-3">
            <h3>Total: $<span id="total-price">0.00</span></h3>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Venta</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productSelect = document.getElementById('product-select');
        const quantityInput = document.getElementById('quantity');
        const addProductButton = document.getElementById('add-product');
        const productTable = document.getElementById('product-table');
        const totalPriceElement = document.getElementById('total-price');

        let productIndex = 0;
        let total = 0;

        function calculateTotal() {
            total = 0;
            productTable.querySelectorAll('tr').forEach(row => {
                const subtotal = parseFloat(row.querySelector('.subtotal').textContent);
                total += subtotal;
            });
            totalPriceElement.textContent = total.toFixed(2);
        }

        addProductButton.addEventListener('click', () => {
            const productId = productSelect.value;
            const productName = productSelect.options[productSelect.selectedIndex]?.dataset.name || '';
            const price = parseFloat(productSelect.options[productSelect.selectedIndex]?.dataset.price || 0);
            const quantity = parseInt(quantityInput.value || 0);

            if (!productId || quantity < 1) {
                alert('Por favor, seleccione un producto y una cantidad válida.');
                return;
            }

            const subtotal = price * quantity;

            // Agregar fila a la tabla
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    ${productName}
                    <input type="hidden" name="products[${productIndex}][product_id]" value="${productId}">
                </td>
                <td>
                    ${quantity}
                    <input type="hidden" name="products[${productIndex}][cantidad]" value="${quantity}">
                </td>
                <td>${price.toFixed(2)}</td>
                <td class="subtotal">${subtotal.toFixed(2)}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-product">Eliminar</button>
                </td>
            `;
            productTable.appendChild(row);

            productIndex++;

            // Calcular total
            calculateTotal();

            // Resetear los campos de selección
            productSelect.value = '';
            quantityInput.value = '';
        });

        productTable.addEventListener('click', (event) => {
            if (event.target.matches('.remove-product')) {
                const row = event.target.closest('tr');
                row.remove();
                calculateTotal();
            }
        });
    });
</script>
@endsection
