@extends('dashboard.master')

@section('content')


        @include('dashboard.fragment.errors-form')

      <form action="{{route("posts.update", $post->id)}}" method="post" enctype="multipart/form-data">
      @method('PUT')
        @include('dashboard.fragment.form', ["task" => "edit"])
     </form>
@endsection
