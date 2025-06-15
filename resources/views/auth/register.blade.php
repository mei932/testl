@extends("layouts.default")
@section("title", "Register")
@section("content")
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Register</h2> {{-- ✅ Đổi từ Login thành Register --}}

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
    <form method="POST" action="{{ route('register.post') }}">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" required>
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

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Register</button>
    </form>
</div>
@endsection