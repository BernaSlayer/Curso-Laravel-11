@extends('dashboard.master')

@section('content')
    
<a href="{{ route('category.create') }}" target="_blank">Create</a>



<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>

                    <a href="{{ route('category.edit', $category) }}">Edit</a>
                    <a href="{{ route('category.show', $category) }}">Show</a>
                    |
                    <form action="{{ route('category.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}


