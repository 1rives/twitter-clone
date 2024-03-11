@extends('layout.layout')

@section('title', 'Comments | Admin dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>

        <div class="col-9">
            <h1>Comments</h1>
            
            @include('shared.success-message')

            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Content</th>
                    <th scope="col">Twit</th>
                    <th scope="col">Created at</th>
                    <th scope="col">#</th>
                </tr>
                </thead>
                @foreach($comments as $comment)
                    <tbody>
                    <tr>
                        <th scope="row">{{ $comment->id }}</th>
                        <td>
                            <a href="{{ route('users.show', $comment->user->id) }}">
                                {{ $comment->user->name }}
                            </a>
                        </td>
                        <td class="text-muted"><i>"{{ $comment->content }}"</i></td>
                        <td>
                            <a href="{{ route('twits.show', $comment->twittah->id) }}"
                            class="fa-solid fa-eye px-1 text-decoration-none" aria-hidden="true"></a>
                        </td>
                        <td>{{ $comment->created_at->toDateString() }}</td>
                        <td>
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="fa fa-trash px-1 text-decoration-none" aria-hidden="true"
                                   href="#" onclick="this.closest('form').submit();return false;"></a>
                            </form>
{{--                            <a href="{{ route('twits.show', $comment->id) }}" class="fa-solid fa-eye px-1 text-decoration-none" aria-hidden="true"></a>--}}
{{--                            <a href="{{ route('twits.edit', $comment->id) }}" class="fa fa-pencil-square px-1 text-decoration-none" aria-hidden="true"></a>--}}
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>

            <div class="mt-3">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
