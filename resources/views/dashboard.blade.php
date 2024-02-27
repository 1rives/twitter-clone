@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
           @include('shared.left-sidebar')
        </div>

        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-twit')
            <hr>

            @forelse($twits as $twit)
                <div class="mt-3">
                    @include('shared.twit-card')
                </div>
            @empty
                <span class="d-flex text-muted justify-content-center">No results found.</span>
            @endforelse
            
            {{ $twits->withQueryString()->links() }}
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection

