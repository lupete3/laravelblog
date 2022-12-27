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

      <section class="cards-blog latest-blog">
        <div class="card-blog-content">
          <img src=" {{ asset('images/pic1.jpg') }}" alt="" />
          <p>
            2 hours ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4>
            <a href="{{ route('blog.single') }}">Benefits of Getting Covid 19 Vaccination</a>
          </h4>
        </div>

        <div class="card-blog-content" data-aos="fade-left">
          <img src="{{ asset('images/pic2.jpg') }}" alt="" />
          <p>
            23 hours ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4>
            <a href="{{ route('blog.single') }}">Top 10 Music Stories Never Told</a>
          </h4>
        </div>

        <div class="card-blog-content" data-aos="fade-up">
          <img src="{{ asset('images/pic3.jpg') }}" alt="" />
          <p>
            2 days ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4>
            <a href="{{ route('blog.single') }}">WRC Safari Rally Back To Kenya After 19 Years</a>
          </h4>
        </div>

        <div class="card-blog-content" data-aos="fade-left">
          <img src="{{ asset('images/pic4.jpg') }}" alt="" />
          <p>
            3 days ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4>
            <a href="{{ route('blog.single') }}">Premier League 2021/2022 Fixtures</a>
          </h4>
        </div>

        <div class="card-blog-content" data-aos="fade-up">
          <img src="{{ asset('images/pic5.jpg') }}" alt="" />
          <p>
            1 week ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4>
            <a href="{{ route('blog.single') }}">12 Health Benefits Of Pomegranate Fruit</a>
          </h4>
        </div>

        <div class="card-blog-content" data-aos="fade-left">
          <img src="{{ asset('images/pic6.jpg') }}" alt="" />
          <p>
            1 month ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4>
            <a href="{{ route('blog.single') }}">Nairobi, The Only City In The World With A National Park</a>
          </h4>
        </div>

        <!-- pagination -->
        <div class="pagination" id="pagination">
          <a href="">&laquo;</a>
          <a class="active" href="">1</a>
          <a href="">2</a>
          <a href="">3</a>
          <a href="">4</a>
          <a href="">5</a>
          <a href="">&raquo;</a>
        </div>
      </section>

     
    </main>
@endsection
