<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class followUsers extends Controller
{
    public function follow($id)
    {
        $following = User::where('id', $id)->first();
        $follower = Auth::user();

        $follower->following()->attach($id);

        return redirect()->route('users.show', [$following]);
    }

    public function unfollow($id)
    {
        $following = User::where('id', $id)->first();
        $follower = Auth::user();

        $follower->following()->detach($id);

        return redirect()->route('users.show', [$following]);
    }
}
