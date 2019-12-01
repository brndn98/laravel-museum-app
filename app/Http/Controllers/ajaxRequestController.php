<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\Console\Output\ConsoleOutput;

class ajaxRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ajaxRequest(Request $request)
    {
        $post_id = $request->post_id;

        $user = Auth::user();
        $post = Post::find($post_id);

        if($user->likes->contains($post)){
            //if its already liked
            $user->likes()->detach($post_id);
            return response()->json(['success'=>'disliked']);
        } else {
            //if its not liked
            $user->likes()->attach($post_id);
            return response()->json(['success'=>'liked']);
        }
    }
}
