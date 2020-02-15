<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('users.index',[
            'users' => User::all()
        ]);
    }

    public function makeAdmin(User $user){
        $user->update([
            'role' => 'admin'
        ]);
        session()->flash('success','User made admin successfully.');
        return redirect(route('users.index'));
    }
}
