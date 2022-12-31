<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('blogPosts.blog', compact('posts'));
    }

    public function create(){
        return view('blogPosts.create-blog-post');
    }

    /* public function show($slug){
        $post = Post::where('slug', $slug)->first();
        return view('blogPosts.single-blog-post', compact('post'));
    } */

    //Use route model binding
    public function show(Post $post){
        return view('blogPosts.single-blog-post', compact('post'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'image' => 'required|image',
            'body' => 'required|min:10',
        ]);

        $postId = Post::latest()->take(1)->first()->id + 1;
        $title = $request->title;
        $slug = Str::slug($title, '-') . '-' . $postId;
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

        return redirect()->back()->with('success','Post as been successfuly added');
    }
}
