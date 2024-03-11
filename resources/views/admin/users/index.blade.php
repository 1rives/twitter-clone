@extends('layout.layout')

@section('title', 'Admin dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>

        <div class="col-9">
            <h1>Users</h1>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joined at</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="fa fa-user px-1 text-decoration-none" aria-hidden="true"></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="fa fa-pencil-square px-1 text-decoration-none" aria-hidden="true"></a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
