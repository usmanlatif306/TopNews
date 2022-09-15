@extends('layouts.app')
@push('seo')
    {!! SEO::generate() !!}
@endpush

@section('content')
    {{-- homepage livewire component --}}
    @livewire('homepage')
@endsection
