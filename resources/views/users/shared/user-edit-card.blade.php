<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                         src="{{ $user->getImageURL() }}" alt="{{ $user->name }} Avatar">
                    <div>
                        @if($editing ?? false)
                            <input name="name" value="{{ $user->name }}" class="form-control" type="text">
                            @error('name')
                            <span class="fs-6 text-danger pt-1">{{ $message }}</span>
                            @enderror
                        @else
                            <h3 class="card-title mb-0"><a class="text-decoration-none" href="#"> {{ $user->name }}
                                </a></h3>
                        @endif
                        <span class="fs-6 text-muted">{{ '@'.$user->id }}</span>
                    </div>
                </div>
                <div>
                    @auth()
                        @if(Auth::id() == $user->id)
                            <a href="{{ route('users.show', $user->id) }}">
                                <button class="btn btn-primary">Return</button>
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
            @if($editing ?? false)
                <div class="px-2 mt-4">
                    <label for="image">Profile picture</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @error('image')
                    <span class="fs-6 text-danger pt-1">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            <div class="px-2 mt-4">
                <div class="mb-3">
                    <label for="bio">Biography</label>
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                    <span class="fs-6 text-danger pt-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

                <div class="d-flex pt-3 pb-2 justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> - Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-twitter me-1">
                                    </span> {{ $user->twits()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{ $user->comments()->count() }} </a>
                </div>
            </div>
        </form>
    </div>
</div>
