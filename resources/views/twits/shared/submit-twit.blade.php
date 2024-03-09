@auth()
    <h4> What are you thinking? </h4>
    <div class="row">
        <form action="{{ route('twits.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="twit" rows="3"></textarea>
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share</button>
            </div>
        </form>
    </div>
@endauth
@guest()
    <h4>@lang('twits.login_to_share')</h4>
@endguest
