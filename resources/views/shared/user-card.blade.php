<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                     src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $user->name }}" alt="{{ $user->name }} Avatar">
                <div>
                    <h3 class="card-title mb-0"><a class="text-decoration-none" href="#"> {{ $user->name }}
                        </a></h3>
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
            {{--        <h5 class="fs-5"> About : </h5>--}}
            @if($editing ?? false)
                <form action="{{ route('users.update', Auth::id()) }}">
                    @csrf
                    @method('update')
                    <div class="mb-3">
                        <label for="bio">Biography</label>
                        <textarea name="bio" class="form-control" id="bio" rows="3">This user is no A</textarea>
                        @error('bio')
                        <span class="fs-6 text-danger pt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm">Save</button>
                </form>
            @else
                <p class="fs-6 fw-light">
                    This book is a treatise on the theory of ethics, very popular during the
                    Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                    from a line in section 1.10.32.
                </p>
                <span class="fs-6 text-muted">{{ $user->email }}</span>
            @endif
            <div class="d-flex pt-4 justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> - Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-twitter me-1">
                                    </span> {{ $user->twits()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{ $user->comments()->count() }} </a>
            </div>
            @auth()
                @if(Auth::id() !== $user->id)
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm"> Follow </button>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
