@extends('layout.layout')

@section('title', 'Edit your profile')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>

        <div class="col-6">
            @include('shared.success-message')
            <div class="mt-3">
                @include('users.shared.user-edit-card')
            </div>

            @forelse($twits as $twit)
                <div class="mt-3">
                    @include('twits.shared.twit-card')
                </div>
            @empty
                <span class="d-flex text-muted justify-content-center">No results found.</span>
            @endforelse

            <div class="mt-3">
                {{ $twits->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection

