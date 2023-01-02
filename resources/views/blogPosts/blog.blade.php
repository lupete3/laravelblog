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
          <li><a href="">Health</a></li>
          <li><a href="">Entertainment</a></li>
          <li><a href="">Sports</a></li>
          <li><a href="">Nature</a></li>
        </ul>
      </div>

      <p style="color: white">
        @if(session('success'))
            {{session('success')}}
        @endif
    </p>
      <section class="cards-blog latest-blog">
        
        
        @forelse ($posts as $post)
          <div class="card-blog-content">
            @auth
              @if(auth()->user()->id === $post->user->id)
                <div class="post-buttons" style="display: flex; margin-bottom:5px">
                  <a href="{{route('blog.edit',$post)}}" style="margin-right: 5px">Edit</a> 
                  <form action="{{route('blog.delete',$post)}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete">
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
