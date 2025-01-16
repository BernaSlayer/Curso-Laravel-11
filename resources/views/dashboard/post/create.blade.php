@extends('dashboard.master')

@section('content')


        @include('dashboard.fragment.errors-form')

      <form action="{{route("posts.store")}}" method="post">
             @include('dashboard.fragment.form')
     </form>
@endsection
