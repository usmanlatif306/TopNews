@extends('layouts.app')
@section('title',config('app.name', 'Laravel'))

@section('content')

<div class="content-wrapper">
    <div class="container">
        <!-- breaking news -->
        @include('partials.breaking_news')
        <!-- breaking news end -->

        <!-- top news -->
        <!-- upper top news -->
        <div class="row mb-3 mt-4" data-aos="fade-up">
            @foreach($data['top']->take(2) as $news)
            @if($loop->index == 0)
            <div class="col-12 col-lg-8 stretch-card grid-margin">
                <div class="position-relative hover-effect">
                    <div class="post-thumb position-relative">
                        <img src="{{$news->image}}" alt="banner" class="img-custom-top ffff w-100 cursor-pointer" />
                        <div class="img-overlay cursor-pointer">
                        </div>
                    </div>
                    <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                    <div class="banner-content">
                        <a href="{{route('news.show',[$news->category,$news->slug])}}">
                            {{ __($news->title) }}
                        </a>
                        <div class="fs-12">
                            <span class="mr-2">{{$news->author}} - </span>{{$news->created_at->toFormattedDateString()}}
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 col-lg-4 grid-margin d-lg-flex">
                <div class="position-relative hover-effect">
                    <div class="post-thumb position-relative">
                        <img src="{{$news->image}}" alt="banner" class="img-custom-top" />
                        <div class="img-overlay"></div>
                    </div>
                    <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                    <div class="banner-content">
                        <a href="{{route('news.show',[$news->category,$news->slug])}}">
                            {{ __($news->title) }}
                        </a>
                        <div class="fs-12">
                            <span class="mr-2"> {{$news->author}} - </span>{{$news->created_at->toFormattedDateString()}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <!-- upper top news end -->

        <!-- lower top new -->
        <div class="row" data-aos="fade-up">
            @foreach($data['top']->slice(2)->take(4) as $news)
            <div class="col-12 col-md-6 col-xl-3 mb-3">
                <div class="position-relative hover-effect">
                    <div class="post-thumb position-relative">
                        <img src="{{$news->image}}" alt="banner" class="img-custom" />
                        <div class="img-overlay"></div>
                    </div>
                    <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                    <div class="banner-content">
                        <a href="{{route('news.show',[$news->category,$news->slug])}}">
                            {{ __($news->title) }}
                        </a>
                        <div class="fs-12">
                            <span class="mr-2"> {{$news->author}} - </span>{{$news->created_at->toFormattedDateString()}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- lower top news -->
        <!-- top news end -->

    </div>
</div>
<!-- top banner end -->

<!-- latest post -->
<div class="content-wrapper bg-white">
    <div class="container">
        <div class="row py-4">
            <div class="col-xl-8 grid-margin">
                <!-- Entertainment -->
                @include('partials.category',['news'=>$data['entertainment'],'type'=>'lg','title'=>'Entertainment'])

                <!-- Sports -->
                @include('partials.category',['news'=>$data['sports'],'type'=>'sm','title'=>'Sports'])

                <!-- Business -->
                @include('partials.category',['news'=>$data['business'],'type'=>'sm','title'=>'Business'])

                <!-- Science -->
                @include('partials.category',['news'=>$data['science'],'type'=>'sm','title'=>'Science'])

                <!-- Technology -->
                @include('partials.category',['news'=>$data['technology'],'type'=>'lg','title'=>'Technology'])

                <!-- Health -->
                @include('partials.category',['news'=>$data['health'],'type'=>'sm','title'=>'Health'])

                <!-- recent post on left side -->
                @livewire('homepage-view-more')
            </div>
            <!-- recent posts on right side -->
            <div class="col-xl-4 grid-margin bg-light p-3 rounded-1 h-100">
                <section class="">
                    <h3 class="pointer pointer-md p-2">Recent Posts</h3>
                    <div class="position-relative">
                        @foreach($data['top']->take(5) as $latest)
                        <div class="row py-2 border-bottom border-light">
                            <div class="col-sm-4 pr-2">
                                <img src="{{$latest->image}}" alt="thumb" class="img-fluid w-100 rounded" />
                            </div>
                            <div class="col-sm-8 pl-2">
                                <p class="fs-16 font-weight-bold text-black mb-0"><a href="{{route('news.show',[$latest->category,$latest->slug])}}">{{$latest->title}}</a></p>
                                <p class="fs-13 text-muted mb-0">
                                    <span class="mr-2">{{$latest->created_at->toFormattedDateString()}} - </span><span class="text-danger fw-bold">{{$latest->author}}</span>
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