<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Institutions;
use App\Models\Divisions;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $search=$request->input('search');
            $contacts=Contacts::where('contact','like','%'.$search.'%')->get();
        }
        else
        {
            $contacts=Contacts::all();
        }
        return view('contacts.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact'=>'required|string|max:255',
            'position'=>'string|nullable|max:255',
            'code'=>'string|nullable',
            'phone'=>'string|nullable',
            'extension'=>'string|nullable',
            'mobile'=>'string|nullable',
            'fax'=>'string|nullable',
            'email'=>'email|nullable',
            'specialFeature'=>'string|nullable',
            'clarification'=>'string|nullable',
            'typeContact'=>'boolean|required',
            'language'=>'boolean|required',
            'status'=>'boolean|required',
            'division_id'=>'nullable',
            'institution_id'=>'required',
        ]);
        $contact=new Contacts([
            'contact'=>$request->contact,
            'position'=>$request->position,
            'code'=>$request->code,
            'phone'=>$request->phone,
            'extension'=>$request->extension,
            'mobile'=>$request->mobile,
            'fax'=>$request->fax,
            'email'=>$request->email,
            'specialFeature'=>$request->specialFeature,
            'clarification'=>$request->clarification,
            'address'=>$request->address,
            'typeContact'=>$request->typeContact,
            'language'=>$request->language,
            'status'=>$request->status,
        ]);
        $contact->division()->associate(Divisions::find($request->division_id));
        $contact->institution()->associate(Institutions::find($request->institution_id));
        $contact->save();
        return redirect()->route('contact.index')->with('success','Contacto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact=Contacts::find($id);
        return view('contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact=Contacts::find($id);
        $institutions=Institutions::get();
        $divisions=Divisions::get();
        return view('contacts.update', compact('contact','institutions','divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact=Contacts::find($id);
        $request->validate([
            'contact'=>'required|string|max:255',
            'position'=>'string|nullable|max:255',
            'code'=>'string|nullable',
            'phone'=>'string|nullable',
            'extension'=>'string|nullable',
            'mobile'=>'string|nullable',
            'fax'=>'string|nullable',
            'email'=>'email|nullable',
            'specialFeature'=>'string|nullable',
            'clarification'=>'string|nullable',
            'typeContact'=>'boolean|required',
            'language'=>'boolean|required',
            'status'=>'boolean|required',
            'division_id'=>'nullable',
            'institution_id'=>'required',
        ]);
        $contact->update([
            $contact->institution_id=$request->institution_id,
            $contact->division_id=$request->division_id,
            $contact->contact=$request->contact,
            $contact->position=$request->position,
            $contact->code=$request->code,
            $contact->phone=$request->phone,
            $contact->extension=$request->extension,
            $contact->mobile=$request->mobile,
            $contact->fax=$request->fax,
            $contact->email=$request->email,
            $contact->specialFeature=$request->specialFeature,
            $contact->clarification=$request->clarification,
            $contact->typeContact=$request->typeContact,
            $contact->language=$request->language,
            $contact->status=$request->status,
        ]);
        return redirect()->route('contact.index')->with('success','Contacto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact=Contacts::find($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('delete','Contacto eliminado correctamente');
    }
}
