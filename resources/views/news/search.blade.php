@extends('layouts.app')

@section('title', 'Search - ' . config('app.name', 'Laravel'))
@section('content')

    <div class="content-wrapper bg-white">
        <div class="container">
            <!-- breaking news -->
            @include('partials.breaking_news')
            <!-- breaking news end -->

            <div class="row py-5">
                <!-- search results on left side -->
                <div class="col-xl-8 grid-margin">
                    <!-- livewire search component -->
                    @livewire('search', ['search' => $search])
                </div>
                <!-- search results on left side end-->

                <!-- recent posts on right side -->
                <div class="col-xl-4 grid-margin bg-light p-3 rounded-1 h-100">
                    <section class="">
                        <h3 class="pointer pointer-md p-2">Recent Posts</h3>
                        <div class="position-relative">
                            @foreach ($recent_posts as $latest)
                                <div class="row py-2 border-bottom border-light">
                                    <div class="col-sm-4 pr-2">
                                        <img src="{{ $latest->image }}" alt="{{ $latest->title }}"
                                            class="img-fluid w-100 rounded" />
                                    </div>
                                    <div class="col-sm-8 pl-2">
                                        <p class="fs-16 font-weight-bold text-black mb-0"><a
                                                href="{{ route('news.show', [$latest->category, $latest->slug]) }}">{{ $latest->title }}</a>
                                        </p>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2">{{ $latest->created_at->toFormattedDateString() }} -
                                            </span><span class="text-danger fw-bold">{{ $latest->author }}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <!-- recent post on right side end -->
            </div>

        </div>
    </div>

@endsection
