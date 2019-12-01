<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('explore', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('share', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time().$file->getClientOriginalName();
            $file->move(public_path().'/post/', $filename);
        }

        $post = new Post();

        $post->file = $filename;
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $user = Auth::user();
        $post->user()->associate($user);

        $post->save();
        $post->tags()->sync($request->tags);

        //return view('post', compact('post'));
        return redirect()->route('posts.show', [$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(Auth::check()){
            $tags = Tag::all();
            return view('modify', compact('post', 'tags'));
        } else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->fill($request->except(['file']));

        if($request->hasFile('file')){
            $path = public_path().'/post/'.$post->file;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('file');
            $filename = time().$file->getClientOriginalName();
            $file->move(public_path().'/post/', $filename);
            $post->file = $filename;
        }

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', [$post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
