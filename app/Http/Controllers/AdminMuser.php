<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Gate;

use Symfony\Component\Console\Output\ConsoleOutput;

class AdminMuser extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function makeAdmin($id)
    {
        $user = User::where('username', $id)->first();
        if(Gate::allows('admin-users')){
            $role = Role::select('id')->where('name', 'admin')->first();
            $user->roles()->sync([$role->id]);

            return view('account', compact('user'));
        } else {
            return view('account', compact('user'));
        }
    }

    public function makeMod($id)
    {
        $user = User::where('username', $id)->first();
        if(Gate::allows('admin-users')){
            $role = Role::select('id')->where('name', 'mod')->first();
            $user->roles()->sync([$role->id]);

            return view('account', compact('user'));
        } else {
            return view('account', compact('user'));
        }
    }
}
