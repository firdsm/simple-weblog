<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\User;

class PostController extends Controller {

    public function __construct()
    {
        $this->middleware('auth')
             ->except('index', 'show', 'filterByUser', 'filterByKeyword');
    }

    public function index()
    {
    	$posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->paginate(4);                    

        return view('posts.index', compact('posts'));
    }

    public function create()
    {        
        $tags = Tag::get();

        return view('posts.create', compact('tags'));
    }

    public function store()
    {           
    	$this->validate(request(), [
    		'title' => 'required|max:191',
    		'body'	=> 'required'] );

        auth()->user()->publish(request(['title', 'body', 'tags', 'picture']));

        session()->flash('message', 'Post published');
         
        return redirect('post');
    }

    public function show(Post $post)
    {          
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {        
        $tags = Tag::get();

        return view('posts.edit', compact('post', 'tags'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|max:191',
            'body'  => 'required'] );

        $post->update(request(['title', 'body']));

        $post->tags()->sync(request('tags'));

        return redirect('post');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('post');
    }

    public function filterByUser(User $user)
    {           
        $posts = $user->posts()->paginate(4);
        $user = $user->name;

        return view('posts.index', compact('posts', 'user'));
    }

    public function filterByKeyword()
    {        
        $keyword = request('keyword');
        
        $posts = Post::whereRaw("title LIKE ('%$keyword%') or body LIKE ('%$keyword%')")
                 ->paginate(4);

        return view('posts.index', compact('posts', 'keyword'));
    }
    
}
