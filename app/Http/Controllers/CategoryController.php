<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Valida si se escribió algo en el campo de búsqueda
        if($request)
        {
            $search=$request->input('search');
            $categories=Categories::where('category','like','%'.$search.'%')->get();
        }
        else
        {
            $categories=Categories::all();
        }
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>'string|required|max:255',
            'description'=>'string|nullable|max:255',
            'status'=>'boolean|required',
        ]);
        Categories::create($request->all());
        return redirect()->route('category.index')->with('success', 'Categoría creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Categories::find($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categories::find($id);
        return view('categories.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Categories::find($id);
        $request->validate([
            'category'=>'string|required|max:255',
            'description'=>'string|nullable|max:255',
            'status'=>'boolean|required',
        ]);
        $category->update($request->all());
        return redirect()->route('category.index')->with('success','Categoría actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Categories::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('danger','Categoría eliminada correctamente');
    }
}
