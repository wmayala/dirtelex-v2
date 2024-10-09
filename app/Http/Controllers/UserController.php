<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $search=$request->input('search');
            $users=User::where('name','like','%'.$search.'%')->get();
        }
        else
        {
            $users=User::get();
        }
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'is_admin'=>'boolean|nullable',
            'status'=>'required|boolean',
        ]);
        $user=new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'is_admin'=>$request->is_admin,
        ]);
        $user->save();
        return redirect()->route('user.index')->with('success','Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        return view('users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::find($id);
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'new_password'=>'min:8|nullable',
            'is_admin'=>'boolean|nullable',
            'status'=>'required|boolean',
        ]);
        $user->update([
            $user->name=$request->name,
            $user->email=$request->email,
            $user->password=$request->new_password==null?$user->password:$request->new_password,
            $user->is_admin=$request->is_admin,
            $user->status=$request->status,
        ]);
        return redirect()->route('user.index')->with('success','Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
