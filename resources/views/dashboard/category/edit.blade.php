@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.errors-form')

    <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('dashboard.category.form', ["task" => "edit"])
    </form>
@endsection
