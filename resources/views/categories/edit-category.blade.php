@extends('layout')

@section('main')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <main class="py-12 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <section id="contact-us" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="contact-form p-6 text-gray-900">
                @include('includes.flash-message')
                <form method="post" action="{{route('categories.update',$category)}}" >
                    @method('put')
                    @csrf
                    <!-- Title -->
                    <label for="name"><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{$category->name}}">
                    @error('name')
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


