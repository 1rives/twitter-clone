@use('Carbon\Carbon', 'Carbon')

<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                     src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="{{ route('twits.destroy', $twit->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('twits.show',$twit->id) }}" class="text-decoration-none pe-2">View</a>
                    <a href="{{ route('twits.edit',$twit->id) }}" class="text-decoration-none pe-2">Edit</a>
                    <button class="btn btn-danger btn-sm" type="submit">X</button>
                </form>
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
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                </span> {{ $twit->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ Carbon::parse($twit->created_at)->format('d/m/y H:i') }}
                </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
