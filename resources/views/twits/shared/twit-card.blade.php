<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                     src="{{ $twit->user->getImageURL() }}" alt="{{ $twit->user->name }} Avatar">
                <div>
                    <h5 class="card-title mb-0"><a class="text-decoration-none"
                        href="{{ route('users.show',$twit->user->id) }}">{{ $twit->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                @auth()
                    {{-- Gates example --}}
                    <a href="{{ route('twits.show',$twit->id) }}" class="text-decoration-none pe-2">View</a>
                    @can('update', $twit)
                        <form action="{{ route('twits.destroy', $twit->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('twits.edit',$twit->id) }}" class="text-decoration-none pe-2">Edit</a>
                            <button class="btn btn-danger btn-sm" type="submit">X</button>
                        </form>
                    @endcan
                @endauth
                @guest()
                    <a href="{{ route('twits.show',$twit->id) }}" class="text-decoration-none pe-2">View</a>
                @endguest
            </div>
        </div>
    </div>
    <div class="card-body">
        @if($editing ?? false)
            <form action="{{ route('twits.update', $twit->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="twit" rows="3">{{ $twit->content }}</textarea>
                    @error('content')
                    <span class="fs-6 text-danger pt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-secondary btn-sm mb-4"> Share</button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $twit->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between pb-2">
            @include('twits.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $twit->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
        @include('twits.shared.comments-box')
    </div>
</div>
