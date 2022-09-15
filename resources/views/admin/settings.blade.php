@extends('layouts.admin')
@section('title', 'Site Settings')
@section('content')
    <div class="container page-container">
        <div class="row">
            <div class="col-md-12">
                <h4>Site Settings</h4>
                <hr>
            </div>
            @if (session('success'))
                <div class="alert alert-success col-md-12" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- sitesettings form --}}
            <div class="col-md-12">
                <form action="{{ route('admin.settings.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        @foreach ($keys as $key)
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="{{ $key }}"
                                        class="text-capitalize">{{ str_replace('_', ' ', $key) }}</label>
                                    <input id="{{ $key }}" class="form-control form-control-sm" type="text"
                                        name="{{ $key }}" value="{{ setting($key) }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
