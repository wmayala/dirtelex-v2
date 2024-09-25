<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $search=$request->input('search');
            $subcategories=Subcategories::where('subcategory','like','%'.$search.'%')->get();
            return view('subcategories.index')->with('subcategories', $subcategories);
        }
        else
        {
            $subcategories=Subcategories::get();
            return view('subcategories.index')->with('subcategories', $subcategories);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Categories::all();
        return view('subcategories.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subcategories=new Subcategories([
            'subcategory'=>$request->subcategory,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        $subcategories->category()->associate(Categories::find($request->category_id));
        $subcategories->save();

        return redirect()->route('subcategory.index')->with('success','Subcategoría creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subcategory=Subcategories::find($id);
        return view('subcategories.show')->with('subcategory', $subcategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory=Subcategories::find($id);
        $categories=Categories::all();
        return view('subcategories.update', compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory=Subcategories::find($id);

        $subcategory->update([
            $subcategory->subcategory=$request->subcategory,
            $subcategory->description=$request->description,
            $subcategory->category_id=$request->category_id,
            $subcategory->status=$request->status,
        ]);

        return redirect()->route('subcategory.index')->with('success','Subcategoría actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory=Subcategories::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index')
            ->with('danger','Subcategoría eliminada correctamente');
    }
}
