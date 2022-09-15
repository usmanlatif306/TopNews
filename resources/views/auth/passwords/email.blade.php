@extends('layouts.auth')

@section('content')
    <section>
        <h4 class="mb-2">Welcome to {{ setting('company_name') }}! 👋</h4>
        <p class="mb-4">Please enter your email to send reset password link</p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" placeholder="Enter your email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Send Password Reset Link') }}</button>
            </div>
        </form>
    </section>
@endsection
