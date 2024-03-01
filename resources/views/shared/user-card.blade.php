<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                     src="{{ $user->getImageURL() }}" alt="{{ $user->name }} Avatar">
                <div>
                    <h3 class="card-title mb-0">
                        <a class="text-decoration-none" href="#">{{ $user->name }}</a>
                    </h3>
                    <span class="fs-6 text-muted">{{ '@'.$user->id }}</span>
                </div>
            </div>
            <div>
                @auth()
                    @if(Auth::id() == $user->id)
                        <a class="text-decoration-none" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    @endif
                @endauth
            </div>
        </div>

        <div class="px-2 mt-4">

            @if($user->bio ?? false)
                <p class="fs-6 fw-light">
                    {{ $user->bio }}
                </p>
            @else
                {{-- Doesn't show anything --}}
            @endif

            <span class="fs-6 text-muted">{{ $user->email }}</span>

            <div class="d-flex pt-3 pb-2 justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> - Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-twitter me-1">
                                    </span> {{ $user->twits()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{ $user->comments()->count() }} </a>
            </div>
            @auth()
                @if(Auth::id() !== $user->id)
                    <div class="mt-3 pb-3">
                    @if(Auth::user()->isFollowing($user))
                        <form action="{{ route('users.unfollow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary"><b>X</b> Unfollow</button>
                        </form>
                    @else
                        <form action="{{ route('users.follow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Follow</button>
                        </form>
                    @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
