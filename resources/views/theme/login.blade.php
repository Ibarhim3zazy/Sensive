@extends('theme.app')
@section('title', 'Login')

@section('content')

@include('theme.partials.hero', ['title' => 'Login'])

<!-- ================ Login section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{ route('login') }}" class="form-contact contact_form" method="post" id="contactForm"
                    novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <input class="form-control border" name="email" id="email" type="email"
                            placeholder="Enter email address" value="{{ old('email') }}" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <input class="form-control border" name="password" id="name" type="password"
                            placeholder="Enter your password" name="password" required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <a href="{{ route('register') }}" class="mx-3">Sign up Instead ?</a>
                        <button type="submit" class="button button--active button-contactForm">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ Login section end ================= -->

@endsection