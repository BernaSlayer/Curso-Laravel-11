@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.errors-form')

   <form action="{{ route('category.store') }}" method="post">
        @include('dashboard.category.form')
   </form>
@endsection