@extends('enduser.base.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-8">
                <div class="bg-white p-5 border rounded-3 shadow-sm my-3">
                    <h2 class="text-center">Login</h2>
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required />
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
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <hr>
                    </form>
                    <p>
                        Don't have an account?
                        <a href="{{ route('auth.register.view') }}" class="btn btn-link">
                            Create Now
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
