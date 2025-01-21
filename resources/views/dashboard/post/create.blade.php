@extends('dashboard.master')

@section('content')


        @include('dashboard.fragment.errors-form')

      <form action="{{route("category.store")}}" method="post">
             @csrf
             @include('dashboard.category.form')
     </form>
@endsection
