@extends('layouts.admin')
@section('title', 'Categories')
@section('content')
    <div class="container page-container">
        <div class="row">
            <div class="col-md-12">
                <h3>Categories</h3>
                <hr>
            </div>
        </div>
        {{-- admin category show --}}
        @livewire('category')
    </div>
@endsection
