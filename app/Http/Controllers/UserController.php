<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function index(){

        $users = User::latest()->get();
        $data = ["users" => $users];
        return view('users.index', $data);

    }   
    
    public function store(Request $request){

        $request->validate(
            [
                'name' => ["required"], 
                'email' => ["required", "email", "unique:users"], 
                'password' => ["required", "min:8"] 
            ]
        );
        User::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'password' => $request->password, 

        ]);
        return back();

    }
    public function destroy(User $user){

        $user->delete();
        return back();

    }

}
