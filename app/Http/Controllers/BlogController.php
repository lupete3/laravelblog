<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    public function index(Request $request){
        if($request->search){
            $posts = Post::where('title','like','%' . $request->search . '%')
            ->orWhere('body','like','%' . $request->search . '%')->latest()->paginate(4);
        }elseif($request->category){
            $posts = Category::where('name',$request->category)->firstOrFail()->posts()->paginate(4)->withQueryString();
        }else{
            $posts = Post::latest()->paginate(4);
        }

        $categories = Category::all();
        return view('blogPosts.blog', compact('posts', 'categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('blogPosts.create-blog-post', compact('categories'));
    }

    //Show edit page
    public function edit(Post $post){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        $categories = Category::all();
        return view('blogPosts.edit-blog-post', compact('post', 'categories'));
    }

    //Edit post 
    public function update(Post $post, Request $request){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        $request->validate([
            'title' => 'required|min:5',
            'category' => 'required',
            'image' => 'required|image',
            'body' => 'required|min:10',
        ]);
        
        $imagePath = 'storage/'.$request->file('image')->store('postImages','public');

        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->slug = Str::slug($request->title, '-') . '-' . $post->id;
        $post->body = $request->body;
        $post->imagePath = $imagePath;

       $post->save();

       return redirect()->back()->with('success','Post as been successfuly edited');

        //dd($post);
    }


    //Edit post 
    public function delete(Post $post){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
    
        $post->delete();

        return redirect()->back()->with('success','Post as been successfuly deleted');

    }

    /* public function show($slug){
        $post = Post::where('slug', $slug)->first();
        return view('blogPosts.single-blog-post', compact('post'));
    } */

    //Use route model binding
    public function show(Post $post){
        $category = $post->category;

        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
        return view('blogPosts.single-blog-post', compact('post', 'relatedPosts'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'category' => 'required',
            'image' => 'required|image',
            'body' => 'required|min:10',
        ]);
        if (Post::latest()->first() !== null) {
            $postId = Post::latest()->first()->id + 1;
        }else{
            $postId = 1;
        }
        
        $title = $request->title;
        $category_id = $request->category;
        $slug = Str::slug($title, '-') . '-' . $postId;
        $user_id = Auth::user()->id;
        $body = $request->input('body');
        //Upload file
        $imagePath = 'storage/'.$request->file('image')->store('postImages','public');

        $post = new Post();

        $post->title = $title;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->body = $body;
        $post->imagePath = $imagePath;
        $post->user_id = $user_id;

        $post->save();

        return redirect()->back()->with('success','Post as been successfuly added');
    }
}
