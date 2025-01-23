@extends('dashboard.master')

@section('content')

    <a class="btn btn-primary" href="{{ route('post.create') }}" target="blank">Create New Post</a>

    <table class="table">
        <thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Title
                </th>
                <th>
                    Posted
                </th>
                <th>
                    Category
                </th>
                <th>
                    Options
                </th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>
                        {{ $p->id }}
                    </td>
                    <td>
                        {{ $p->title }}
                    </td>
                    <td>
                        {{ $p->posted }}
                    </td>
                    <td>
                        {{ $p->category->title }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('post.show', $p) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('post.edit', $p) }}">Edit</a>
                        <form action="{{ route('post.destroy', $p) }}" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este elemento?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}

@endsection
