<?php

namespace App\Http\Controllers;

use App\Models\Divisions;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $search=$request->input('search');
            $divisions=Divisions::where('division','like','%'.$search.'%')->get();
        }
        else
        {
            $divisions=Divisions::all();
        }
        return view('divisions.index')->with('divisions', $divisions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Divisions::create($request->all());
        return redirect()->route('division.index')->with('success', 'División creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $division=Divisions::find($id);
        return view('divisions.show')->with('division', $division);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $division=Divisions::find($id);
        return view('divisions.update')->with('division', $division);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $division=Divisions::find($id);
        $division->update($request->all());
        return redirect()->route('division.index')->with('success','División actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $division=Divisions::find($id);
        $division->delete();
        return redirect()->route('division.index')->with('danger','División eliminada correctamente');
    }
}
