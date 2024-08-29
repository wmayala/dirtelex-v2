<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function index(Request $request)
    {
        return view('directory.index');
    }

    public function contacts_dir(Request $request)
    {
        return view('directory.contacts_dir');
    }

    public function institutions_dir(Request $request)
    {
        return view('directory.institutions_dir');
    }

    public function categories_dir(Request $request)
    {
        return view('directory.categories_dir');
    }

    public function subcategories_dir(Request $request)
    {
        return view('directory.subcategories_dir');
    }

    public function divisions_dir(Request $request)
    {
        return view('directory.divisions_dir');
    }
}
