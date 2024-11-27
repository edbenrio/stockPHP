<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;
use App\Models\Product;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::
            with('category')
            ->get();
        return view('pos.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'products.*.product_id' => 'required|integer|min:1',
            'products.*.cantidad' => 'required|integer|min:1',
        ]);

        \DB::beginTransaction();

        try {
            foreach ($request->products as $item) {
                $product = Product::findOrFail($item['product_id']);
        
                if ($product->stock_actual < $item['cantidad']) {
                    return back()->with('error', 'No hay suficiente stock para el producto ' . $product->nombre);
                }
        
                $price = $product->precio;
                $total = $price * $item['cantidad'];
                
                /*Registrar el movimiento*/
                Movement::create([
                    'product_id' => $product->id,
                    'cantidad' => $item['cantidad'],
                    'precio' => $price,
                    'subtotal' => $total,
                    'tipo' => 'salida',
                    'user_id' => \Auth::user()->id,
                ]);
        
                /* Actualizar stock*/
                $product->decrement('stock_actual', $item['cantidad']);
            }

            \DB::commit();
            return redirect()->route('pos')->with('success', 'Venta registrada exitosamente.');
        } catch (\Exception $e) {
            \DB::rollBack(); 
            return back()->with('error', 'Ocurrió un error al procesar la venta: ' . $e->getMessage());
        }
    }

    public function sales() {
        $sales = Movement::
            where('tipo', 'salida')
            ->with('product.category')
            ->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Movement $movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movement $movement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movement $movement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movement $movement)
    {
        //
    }
}
