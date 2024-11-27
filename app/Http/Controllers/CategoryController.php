<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::denies('category_index')) abort(403, 'No tienes permiso para realizar esta acción.');
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Gate::denies('category_create')) abort(403, 'No tienes permiso para realizar esta acción.');
        $request->validate([
            'nombre' => ['required','string','max:255'],
            'descripcion' => ['required','string','max:255'],
        ]);

        Category::create(
            [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
            ]
        );
        return redirect()->route('categories')
            ->with('success','Categoría creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(Gate::denies('category_edit')) abort(403, 'No tienes permiso para realizar esta acción.');
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if(Gate::denies('category_edit')) abort(403, 'No tienes permiso para realizar esta acción.');
        $request->validate([
            'nombre' => ['required','string','max:255'],
            'descripcion' => ['required','string','max:255'],
        ]);

        $category->update(
            [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('categories')
            ->with('success','Categoría actualizada satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(Gate::denies('category_delete')) abort(403, 'No tienes permiso para realizar esta acción.');
        $category->delete();
        return redirect()->route('categories')
            ->with('success','Categoría eliminada satisfactoriamente.');
    }
}
