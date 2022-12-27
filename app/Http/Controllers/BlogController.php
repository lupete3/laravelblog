<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
}
