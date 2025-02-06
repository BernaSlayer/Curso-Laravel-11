@extends('blog.master')

@section('content')
  {{-- <x-card>
    Contenido dinamicoooo
   </x-card>      --}}

<x-blog.show :post="$post" data-id ='1' class="demo" />
{{-- <div class="card card-white -mt-2">    
      <h1>{{$post->title}}</h1>
       <span>{{$post->title}}</span>

    <hr>
     {{$post->content}} --}}

@endsection