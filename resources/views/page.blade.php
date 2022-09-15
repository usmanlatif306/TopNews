@extends('layouts.app')

@push('seo')
    {!! SEO::generate() !!}
@endpush
@section('content')
    {{-- single category page livewire --}}
    @livewire('category-page', ['category' => $category])
@endsection
