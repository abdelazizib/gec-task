@extends('enduser.base.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-8">
                <div class="bg-white p-5 border rounded-3 shadow-sm my-3">
                    <h2>Register</h2>
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                required />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required />
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required />
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create account</button>
                        </div>
                    </form>
                    <hr>
                    <p>
                        Have an account?
                        <a href="{{ route('auth.login.view') }}" class="btn btn-link">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
