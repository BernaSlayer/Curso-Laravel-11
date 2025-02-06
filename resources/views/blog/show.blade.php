@extends('blog.master')

@section('content')
  {{-- <x-card>
    Contenido dinamicoooo
   </x-card>      --}}

<x-blog.show :post="$post" data-id ='1' class="demo" />


@endsection