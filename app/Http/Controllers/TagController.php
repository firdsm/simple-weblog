<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
    	$posts = $tag->posts()->paginate(4);
        $tag = $tag->name;

    	return view('posts.index', compact('posts', 'tag'));
    }

}
