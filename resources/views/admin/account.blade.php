@extends('layouts.admin')
@section('title', 'Site Settings')
@section('content')
    <div class="container page-container">
        <div class="row">
            <div class="col-md-12">
                <h3>Site Settings</h3>
                <hr>
            </div>
            @if (session('success'))
                <div class="alert alert-success col-md-12" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- profile pic --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Profile Image</div>
                    <div class="card-body">
                        <div class="w-50 mx-auto mb-3">
                            <img src="{{ auth()->user()->image() }}" alt="User Image" class="rounded img-fluid">
                        </div>
                        <form action="{{ route('admin.settings.image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="profile">Profile Image</label>
                                <input id="profile" class="form-control" type="file" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- user details --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> User Details</div>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.profile') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control @error('name') border-danger @enderror"
                                    type="text" name="name" value="{{ auth()->user()->name }}" placeholder="Name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control @error('email') border-danger @enderror"
                                    type="email" name="email" value="{{ auth()->user()->email }}"
                                    placeholder="Email Address">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control @error('password') border-danger @enderror"
                                    type="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="text-danger d-block mb-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="text-info">Don't write in field if you want old password</small>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" placeholder="Password Confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
