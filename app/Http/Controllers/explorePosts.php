<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\Console\Output\ConsoleOutput;

class explorePosts extends Controller
{
    public function search(Request $request)
    {
        $output = new ConsoleOutput();
        $input = '%'.$request->input('search').'%';
        $posts = Post::where('title', 'like', $input)->get();
        $output->writeln($posts);

        return view('explore', compact('posts'));
    }

    public function recent()
    {
        $posts = Post::latest()->get();
        $tags = Tag::All();
        $type = 'recent';

        return view('feed', compact('posts', 'tags', 'type'));
    }

    public function following()
    {
        $from = Post::latest()->get();
        $user = Auth::user();
        $posts = collect();

        foreach ($from as $post){
            foreach ($user->following as $followed){
                if($post->user->id == $followed->id){
                    $posts->add($post);
                }
            }
        }

        $tags = Tag::All();
        $type = 'following';

        return view('feed', compact('posts', 'tags', 'type'));
    }

    public function categories($input)
    {
        $posts = Tag::findOrFail($input)->posts;

        return view('explore', compact('posts'));
    }

    public function popular()
    {
        $posts = Post::withCount('liked')->orderBy('liked_count', 'desc')->get();
        $tags = Tag::All();
        $type = 'popular';

        return view('feed', compact('posts', 'tags', 'type'));
    }
}
