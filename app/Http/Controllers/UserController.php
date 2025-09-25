<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUsers()
    {
        return view('users.addUsers');
    }

    public function allUsers()
    {
        $users = $this.getUsers();
        $usersFromDB = $this.getUsersFromDB();

        return view('users.allUsers', compact('users', 'usersFromDB'));
    }

    public function viewUser($id){
        $myUser = User::where('id', $id)->first();

        return view('users.showUsers', compact('myUser'));
    }

    public function storeUser(Request $request){

        $request->validate([
            'name' => 'string|max:50|required',
            'email' => 'required|unique:users|email'
        ]);


        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('users.allUsers')->with('message', 'Utilizador adicionado com sucesso!');

    }
}
