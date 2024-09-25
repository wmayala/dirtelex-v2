<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Divisions;
use App\Models\Institutions;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $search=$request->input('search');
            $institutions=Institutions::where('institution','like','%'.$search.'%')->get();
            return view('institutions.index')->with('institutions', $institutions);
        }
        else
        {
            $institutions=Institutions::all();
            return view('institutions.index')->with('institutions', $institutions);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Categories::all();
        $subcategories=Subcategories::all();
        $divisions=Divisions::all();
        return view('institutions.create')->with('categories', $categories)->with('subcategories', $subcategories)->with('divisions', $divisions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $institution=new Institutions([
            'institution'=>$request->institution,
            'acronym'=>$request->acronym,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        $institution->category()->associate(Categories::find($request->category_id));
        $institution->subcategory()->associate(Subcategories::find($request->subcategory_id));
        $institution->division()->associate(Divisions::find($request->division_id));

        $institution->save();

        return redirect()->route('institution.index')->with('success','Institución creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $institution=Institutions::find($id);
        return view('institutions.show')->with('institution', $institution);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $institution=Institutions::find($id);
        $categories=Categories::all();
        $subcategories=Subcategories::all();
        $divisions=Divisions::all();
        return view('institutions.update', compact('institution','categories','subcategories','divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $institution=Institutions::find($id);

        $institution->update([
            $institution->institution=$request->institution,
            $institution->acronym=$request->acronym,
            $institution->description=$request->description,
            $institution->category_id=$request->category_id,
            $institution->subcategory_id=$request->subcategory_id,
            $institution->division_id=$request->division_id,
            $institution->status=$request->status,
        ]);

        return redirect()->route('institution.index')->with('success','Institución actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $institution=Institutions::find($id);
        $institution->delete();
        return redirect()->route('institution.index')->with('danger','Institución eliminada correctamente');
    }
}
