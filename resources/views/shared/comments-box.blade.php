@use('Carbon\Carbon', 'Carbon')
<div>
    <form action="{{ route('twits.comments.store',$twit->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
        </div>
    </form>
    <hr>
    @if($twit->comments->isEmpty())
        <span class="d-flex fs-6 text-muted justify-content-center">Be the first to comment!</span>
    @endif
    @foreach($twit->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                 src="{{ $comment->user->getImageURL() }}" alt="{{ $comment->user->name }} Avatar">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6><a class="text-decoration-none" href="{{ route('users.show',$twit->user->id) }}">{{ $twit->user->name }}
                        </a>
                    </h6>
                    <small class="fs-6 fw-light text-muted">{{ Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @endforeach
</div>
