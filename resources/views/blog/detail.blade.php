@extends('blog.master')

@section('content')
<div class="card card-white -mt-2">    
    <h1>{{ $post->title }}</h1>
    <span>{{ $post->title }}</span>
    <hr>
    <div>{{ $post->content }}</div>
</div>

<h2>Categorías</h2>
<ul class="list-group">
    @foreach ($categories as $category)
        <li class="list-group-item">{{ $category->name }}</li>
    @endforeach 
</ul>
@endsection
