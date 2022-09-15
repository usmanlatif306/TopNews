@extends('layouts.admin')
@section('title', 'Pages SEO')
@section('content')
    <div class="container page-container">
        <div class="row">
            <div class="col-md-12">
                <h3>Pages SEO</h3>
                <hr>
            </div>
            @if (session('success'))
                <div class="alert alert-success col-md-12" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- pages seo form --}}
            <div class="col-md-12">
                <form action="{{ route('admin.seo.store') }}" method="POST">
                    @csrf
                    @foreach ($data as $page => $keys)
                        <h3 class="text-capitalize">{{ $page }}</h3>
                        <div class="form-row">
                            @foreach ($keys as $key => $value)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="{{ $value }}" class="text-capitalize">{{ $key }}</label>
                                        <input id="{{ $value }}" class="form-control form-control-sm" type="text"
                                            name="{{ $value }}" value="{{ setting($value) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
