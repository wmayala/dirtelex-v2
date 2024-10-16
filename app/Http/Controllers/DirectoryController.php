<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Institutions;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\Divisions;

class DirectoryController extends Controller
{
    public function contacts_dir(Request $request)
    {
        // Valida si se escribió en el cuadro de búsqueda,
        // la búsqueda se realiza por nombre del contacto o
        // por nombre de la institución

        if($request)
        {
            $search=$request->input('search');
            $contacts=Contacts::where('contact','like','%'.$search.'%')
                ->orWhereHas('institution', function($query) use ($search)
                {
                    $query->where('institution','like','%'.$search.'%');
                })
                ->with('institution')
                ->get();
        }
        else
        {
            $contacts=Contacts::all();
        }
        return view('directory.contacts_dir')->with('contacts', $contacts);
    }

    public function contacts_show(string $id)
    {
        $contact=Contacts::find($id);
        return view('directory.contacts_show')->with('contact', $contact);
    }

    public function institutions_dir(Request $request)
    {
        if($request)
        {
            $search=$request->input('search');
            $institutions=Institutions::where('institution','like','%'.$search.'%')->get();
        }
        else
        {
            $institutions=Institutions::all();
        }
        return view('directory.institutions_dir')->with('institutions', $institutions);
    }

    public function institutions_show(string $id)
    {
        $institution=Institutions::find($id);
        return view('directory.institutions_show')->with('institution', $institution);
    }

    public function categories_dir(Request $request)
    {
        if($request)
        {
            $search=$request->input('search');
            $categories=Categories::where('category','like','%'.$search.'%')->get();
        }
        else
        {
            $categories=Categories::all();
        }
        return view('directory.categories_dir')->with('categories', $categories);
    }

    public function categories_show(string $id)
    {
        $category=Categories::find($id);
        return view('directory.categories_show')->with('category', $category);
    }

    public function subcategories_dir(Request $request)
    {
        if($request)
        {
            $search=$request->input('search');
            $subcategories=Subcategories::where('subcategory','like','%'.$search.'%')->get();
        }
        else
        {
            $subcategories=Subcategories::all();
        }
        return view('directory.subcategories_dir')->with('subcategories', $subcategories);
    }

    public function subcategories_show(string $id)
    {
        $subcategory=Subcategories::find($id);
        return view('directory.subcategories_show')->with('subcategory', $subcategory);
    }

    public function divisions_dir(Request $request)
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
        return view('directory.divisions_dir')->with('divisions', $divisions);
    }

    public function divisions_show(string $id)
    {
        $division=Divisions::find($id);
        return view('directory.divisions_show')->with('division', $division);
    }
}
