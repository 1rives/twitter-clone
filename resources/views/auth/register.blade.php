@include('layout.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-10 col-sm-6 col-md-4">
        <form class="form mt-5" action="" method="post">
            @csrf
            <h3 class="text-center">Register</h3>
            <div class="form-group">
                <label for="name" class="text">Name:</label><br>
                <input type="text" name="name" id="name" class="form-control">
                @error('name')
                    <span class="d-blox fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="email" class="text">Email:</label><br>
                <input type="email" name="email" id="email" class="form-control">
                @error('email')
                    <span class="d-blox fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="text">Password:</label><br>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <span class="d-blox fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="confirm-password" class="text">Confirm Password:</label><br>
                <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                @error('password_confirmation')
                    <span class="d-blox fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="remember-me" class="text"></label><br>
                <input type="submit" name="submit" class="btn btn-dark btn-md" value="Register">
            </div>
            <div class="text-right mt-2">
                <a href="/login" class="d-flex text justify-content-center">Or if you have an account, login here</a>
            </div>
        </form>
    </div>
</div>
