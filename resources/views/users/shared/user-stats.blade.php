<div class="d-flex pt-3 pb-2 justify-content-start">
    <a href="#" class="fw-light nav-link fs-6 me-3">
        <span class="fas fa-user me-1"></span>
        {{ $user->followers()->count() }}
        {{-- Checks if user haves any followers --}}
        @if($user->followers()->count() != 1)
            Followers
        @else
            Follower
        @endif
    </a>
    <a href="#" class="fw-light nav-link fs-6 me-3">
        <span class="fa-brands fa-twitter me-1"></span> {{ $user->twits()->count() }}
    </a>
    <a href="#" class="fw-light nav-link fs-6">
        <span class="fas fa-comment me-1"></span> {{ $user->comments()->count() }}
    </a>
</div>
