@extends('layouts.admin')
@section('title', 'News')
@section('content')
    <div class="container page-container">
        <div class="row">
            <div class="col-md-12">
                <h3>News</h3>
                <hr>
            </div>
        </div>
        {{-- admin posts show --}}
        <div class="card">
            <div class="card-body">
                @livewire('admin-posts')
            </div>
        </div>
    </div>
@endsection
