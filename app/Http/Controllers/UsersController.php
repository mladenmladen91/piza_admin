<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => 'required|string|min:3',
			"email" => "required|email|unique:users",
            'password' => 'required'
        ]);
		
		
        $user = User::create($request->all());
        $password = $request->password;
        $user['password'] = bcrypt($password);
         $user->save();
         return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$request->validate([
            'name' => 'required|string|min:3',
			"email" => "required|email|unique:users",
            'password' => 'required'
        ]);
 
        $input = $request->all();
        $user = User::findOrFail($id);
        
          if(trim($request->pasword) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
        }
        
        
        
        $input['password'] = bcrypt($request->password);
        $user->update($input);
        
        return redirect(route('users.index')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect(route('users.index'));
    }
}
