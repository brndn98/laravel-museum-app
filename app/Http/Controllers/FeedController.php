<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $post = Post::withCount('liked')->orderBy('liked_count', 'desc')->first();

        return view('landing', compact('post'));
    }
}
