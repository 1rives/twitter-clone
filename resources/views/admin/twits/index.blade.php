@extends('layout.layout')

@section('title', 'Twits | Admin dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>

        <div class="col-9">
            <h1>Twits</h1>

            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Content</th>
                    <th scope="col">Created at</th>
                    <th scope="col">#</th>
                </tr>
                </thead>
                @foreach($twits as $twit)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $twit->id }}</th>
                            <td>{{ $twit->user->name }}</td>
                            <td class="text-muted"><i>"{{ $twit->content }}"</i></td>
                            <td>{{ $twit->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('twits.show', $twit->id) }}" class="fa-solid fa-eye px-1 text-decoration-none" aria-hidden="true"></a>
                                <a href="{{ route('twits.edit', $twit->id) }}" class="fa fa-pencil-square px-1 text-decoration-none" aria-hidden="true"></a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

            <div class="mt-3">
                {{ $twits->links() }}
            </div>
        </div>
    </div>
@endsection
