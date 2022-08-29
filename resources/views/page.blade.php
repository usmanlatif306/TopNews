@extends('layouts.app')

@section('title',ucwords($category).' - '.config('app.name', 'Laravel'))
@section('content')

{{-- single category page livewire --}}
@livewire('category-page', ['category' => $category])

@endsection
