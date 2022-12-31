@extends('layout')

@section('header')
    <header class="header" style="background-image: url({{ asset("images/photography.jpg") }});">
        <div class="header-text">
        <h1>Placide Blog</h1>
        <h4>Dashboard of verified news...</h4>
        </div>
        <div class="overlay"></div>
    </header>
@endsection

@section('main')
    <main class="container">
        <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">
            @foreach ($posts as $post)
            <div class="card-blog-content">
                <img src="{{ asset($post->imagePath) }}" alt="" />
                <p>
                {{$post->created_at->diffForHumans()}}
                <span style="float: right">Written By {{$post->user->name}}</span>
                </p>
                <h4 style="font-weight: bolder">
                <a href="{{route('blog.single',$post)}}"
                    >{{$post->title}}</a
                >
                </h4>
            </div>
            @endforeach
        
        </section>
    </main>
@endsection
      
