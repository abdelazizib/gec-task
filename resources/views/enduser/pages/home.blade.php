@extends('enduser.base.layout')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="fade-in">Smart Learning Platform for Kids</h1>
                <p class="fade-in" style="animation-delay: 0.2s">
                    A smart learning platform designed specifically for children to develop their skills in a fun and engaging way
                </p>
                <div class="hero-image float-animation ">
                    <img src="{{ asset('assets/home-boy.jpg') }}"
                        alt="Children learning" class="rounded-3" />
                </div>
            </div>
        </div>
    </section>

    <section class="app-submit">
        <div class="container">
            <h2 class="section-title">Submit an application now!</h2>
            <div class="application-btns">
                <a href="{{ route('application.create') }}" class="application-btn">
                    <img src="https://cdn-icons-png.flaticon.com/512/3534/3534033.png" alt="Application" />
                    <span>Submit An Application</span>
                </a>
            </div>
        </div>
    </section>
@endsection
