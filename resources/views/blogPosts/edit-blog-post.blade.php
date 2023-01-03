@extends('layout')

@section('main')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Post') }}
            </h2>
        </x-slot>

        <main class="py-12 container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section id="contact-us" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="contact-form p-6 text-gray-900">
                    @include('includes.flash-message')
                    <form method="post" action="{{route('blog.update', $post)}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <!-- Title -->
                        <label for="title"><span>Title</span></label>
                        <input type="text" id="title" name="title" value="{{$post->title}}">
                        @error('title')
                            <p style="color:red; margin-bottom:15px;">{{$message}}</p>
                        @enderror
                        <!-- Category -->
                        <label for="category"><span>Choose Category</span></label>
                        <select name="category" class="form-select appearance-none block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                            <option value="" selected disabled>--- Category ---</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p style="color:red; margin-bottom:15px;">{{$message}}</p>
                        @enderror
                        <!-- Image -->
                        <label for="image"><span>Image</span></label>
                        <input type="file" id="image" name="image">
                        @error('image')
                            <p style="color:red; margin-bottom:15px;">{{$message}}</p>
                        @enderror

                        <!-- Image -->
                        <label for="editor"><span>Body</span></label>
                        <textarea id="editor" name="body" >{{$post->body}}</textarea>
                        @error('body')
                            <p style="color:red; margin-bottom:15px;">{{$message}}</p>
                        @enderror

                        <!-- Button -->
                        <input type="submit" value="Submit" name="save">
                    </form>
                </div>
            </section>
        </main>
    </x-app-layout>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

