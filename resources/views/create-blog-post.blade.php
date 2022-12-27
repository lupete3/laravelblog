@extends('layout')

@section('main')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Post') }}
            </h2>
        </x-slot>

        <main class="py-12 container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section id="contact-us" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="contact-form p-6 text-gray-900">
                    <form method="" action="">
                        <!-- Title -->
                        <label for="title"><span>Title</span></label>
                        <input type="text" id="title" name="title">

                        <!-- Image -->
                        <label for="image"><span>Image</span></label>
                        <input type="file" id="image" name="image">

                        <!-- Image -->
                        <label for="editor"><span>Body</span></label>
                        <textarea id="editor" name="body" ></textarea>

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

