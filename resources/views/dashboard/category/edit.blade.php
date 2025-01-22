@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.errors-form')

   <form action="{{ route('category.update', $category->id) }}" method="post">
        @method('PATCH')
        @include('dashboard.category.form', [ 'task'=>'edit' ])
   </form>
@endsection