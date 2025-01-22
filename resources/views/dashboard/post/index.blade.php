@extends('dashboard.master')

@section('content')
    
    <a href="{{ route('post.create') }}" target="_blank">Create New Post</a>
    


    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Posted</th>
                <th>Category</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->posted }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>
    
                        <a href="{{ route('post.edit', $post) }}">Edit</a>
                        <a href="{{ route('post.show', $post) }}">Show</a>
                        |
                        <form action="{{ route('post.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection


