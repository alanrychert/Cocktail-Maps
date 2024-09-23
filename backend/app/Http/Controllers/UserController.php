<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\User;
use \Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('can:user.create')->only('create','store');
        $this->middleware('can:user.show')->only('show');
        $this->middleware('can:user.edit')->only('edit,update');
        $this->middleware('can:user.destroy')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('id');
        return view('user.users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string',
            'contraseña'=> 'required|string',
            'roles' =>'required'
        ]);

        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->email_verified_at = now();
        $user->password = bcrypt($request->contraseña);

        $user->save();
        $user->roles()->sync($request->roles);
        
        return redirect()->route('user.show',$user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required'
        ]);
        $user->roles()->sync($request->roles);

        return redirect()->route('user.show',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
