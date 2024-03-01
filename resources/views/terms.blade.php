@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>

        <div class="col-6">
            <h2>Terms of use</h2>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam nisi arcu, cursus et quam ut, posuere tincidunt justo.
            Duis elementum enim ut pellentesque hendrerit.
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
