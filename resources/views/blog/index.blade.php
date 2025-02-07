@extends('blog.master')

@section('content')
    <div class="container mx-auto mt-5">
        <x-blog.post.index :posts='$posts'>
            Post List

            @slot('footer')
                Footer
            @endslot

            @slot('extra', 'Extra')
        </x-blog.post.index>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
