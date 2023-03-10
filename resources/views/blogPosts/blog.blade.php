@extends('layout')

@section('main')
    <!-- main -->
    <main class="container">
      <h2 class="header-title">All Blog Posts</h2>
      <div class="searchbar">
        <form action="">
          <input type="text" placeholder="Search..." name="search" />
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>
      <div class="categories">
        <ul>
          @foreach ($categories as $categorie)
            <li><a href="{{route('blog.index', ['category' => $categorie->name])}}">{{$categorie->name}}</a></li>
          @endforeach
        </ul>
      </div>

      @include('includes.flash-message')
      <section class="cards-blog latest-blog">
        
        
        @forelse ($posts as $post)
          <div class="card-blog-content">
            @auth
              @if(auth()->user()->id === $post->user->id)
                <div class="post-buttons" style="display: flex; margin-bottom:5px">
                  <a href="{{route('blog.edit',$post)}}"><button style="background-color: rgb(24, 158, 95); color:white; padding:0.1em;margin:0.3em; border-radius:5px">Edit</button></a> 
                  <form action="{{route('blog.delete',$post)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" style="background-color: rgb(209, 42, 59); color:white; padding:0.1em;margin:0.3em; border-radius:5px">Delete</button>
                  </form>
                </div>
              @endif
            @endauth
            <img src=" {{ asset($post->imagePath) }}" alt="" />
            <p>
              {{$post->created_at->diffForHumans()}}
              <span>Written By {{$post->user->name}}</span>
            </p>
            <h4>
              <a href="{{ route('blog.single',$post) }}">{{$post->title}}</a>
            </h4>
          </div>
          @empty
            <p>Sorry, we have not found this post</p>
              
        @endforelse
        
      </section>
      <!-- pagination -->
      {{$posts->links('pagination::default')}}
      <br>
     
    </main>
@endsection
