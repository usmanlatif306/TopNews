@extends('layouts.app')
@section('title',config('app.name', 'Laravel'))

@section('content')

{{-- homepage livewire component --}}
@livewire('homepage')

@endsection