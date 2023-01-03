@extends('layout')

@section('main')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Categories') }}
        </h2>
    </x-slot>

    <main class="py-12 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <section id="contact-us" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="contact-form p-6 text-gray-900">
                <table width='100%'>
                    <thead>
                        <th>Name Category</th>
                        <th>#</th>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr >
                                <td>{{$category->name}}</td>
                                <td style="display:flex">
                                    <a href="{{route('categories.edit',$category)}}" ><button style="background-color: rgb(24, 158, 95); color:white; padding:0.3em;margin:0.3em; border-radius:5px">Delete</button></a> 
                                    <form action="{{route('categories.destroy',$category)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" style="background-color: red; color:white; padding:0.3em;margin:0.3em; border-radius:5px">Delete</button>

                                    </form>
                                </td>
                            </tr>  
                        @empty
                            <td colspan="2">We have not found a category</td>
                        @endforelse
                    </tbody>
                </table>
                {{$categories->links()}}
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


