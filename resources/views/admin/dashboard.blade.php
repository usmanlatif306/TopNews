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
        @livewire('admin-posts')
    </div>
@endsection
