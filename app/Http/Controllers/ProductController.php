<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!(\Auth::user()->hasAnyRole('admin'))) abort(403, 'No tienes permiso para realizar esta acción.');
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!(\Auth::user()->hasAnyRole('admin'))) abort(403, 'No tienes permiso para realizar esta acción.');
        $categories = \App\Models\Category::all(); // Obtener todas las categorías
        return view('product.create', compact('categories'));
    }

    /**
     * Display a listing of the low stock products.
     */
    public function lowStock(){
        $products = \App\Models\Product::
            where('stock_actual', '<=', 3)
            ->get();
            return view('product.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!(\Auth::user()->hasAnyRole('admin'))) abort(403, 'No tienes permiso para realizar esta acción.');
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock_actual' => 'required|integer|min:0',
            'category_id' => 'required|numeric',
        ]);
    
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(!(\Auth::user()->hasAnyRole('admin'))) abort(403, 'No tienes permiso para realizar esta acción.');
        $categories = \App\Models\Category::all();
        $product = Product::find($id);
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if(!(\Auth::user()->hasAnyRole('admin'))) abort(403, 'No tienes permiso para realizar esta acción.');
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock_actual' => 'required|integer|min:0',
            'category_id' => 'required|numeric',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(!(\Auth::user()->hasAnyRole('admin'))) abort(403, 'No tienes permiso para realizar esta acción.');
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
