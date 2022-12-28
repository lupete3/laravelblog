<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        return view('blogPosts.blog');
    }

    public function create(){
        return view('blogPosts.create-blog-post');
    }

    public function show(){
        return view('blogPosts.single-blog-post');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'image' => 'required|image',
            'body' => 'required|min:10',
        ]);

        $title = $request->title;
        $slug = Str::slug($title, '-');
        $user_id = Auth::user()->id;
        $body = $request->input('body');
        //Upload file
        $imagePath = 'storage/'.$request->file('image')->store('postImages','public');

        $post = new Post();

        $post->title = $title;
        $post->slug = $slug;
        $post->body = $body;
        $post->imagePath = $imagePath;
        $post->user_id = $user_id;

        $post->save();

        return redirect()->back();
    }
}
