@extends("layouts.default")
@section("title", "Login")
@section("content")
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Login</h2>

    @if (session() -> has("success"))
    <div class="alert alert-success">
        {{session()-> get("success")}}

    </div>

    @endif

    @if (session() -> has("error"))
    <div class="alert alert-success">
        {{session()-> get("error")}}

    </div>

    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" required autofocus>
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-4">Login</button>
       <button type="button" class="btn btn-primary w-100" onclick="window.location='{{ route('register') }}'">Register</button>

    </form>
</div>
@endsection