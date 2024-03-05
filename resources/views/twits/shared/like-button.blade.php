<div>
    @auth()
        @if(Auth::user()->likesPost($twit))
            <form action="{{ route('twits.unlike', $twit->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="fas fa-heart me-1"></span> {{ $twit->likes->count() }}
                </button>
            </form>
        @else
            <form action="{{ route('twits.like', $twit->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="far fa-heart me-1"></span> {{ $twit->likes->count() }}
                </button>
            </form>
        @endif
    @endauth
    @guest()
        <a href="{{ route('login') }}" class="fw-light nav-link fs-6">
            <span class="fas fa-heart me-1"></span> {{ $twit->likes->count() }}
        </a>
    @endguest
</div>
