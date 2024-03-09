<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-secondary rounded-5' : '' }}" href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('feed') ? 'text-white bg-secondary rounded-5' : '' }}" href="{{ route('feed') }}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('terms') ? 'text-white bg-secondary rounded-5' : '' }}" href="{{ route('terms') }}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm text-decoration-none" href="{{ route('lang', 'en') }}">@lang('lang.english')</a>
        <a class="btn btn-link btn-sm text-decoration-none" href="{{ route('lang', 'es') }}">@lang('lang.spanish')</a>
    </div>
</div>
