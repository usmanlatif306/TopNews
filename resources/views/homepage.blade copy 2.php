@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <!-- breaking news -->
        <div class="row bg-white p-1 m-0 d-none d-md-flex">
            <div class="col-md-3 col-lg-2 ps-0">
                <h3 class="pointer breaking-news m-0 p-0 p-2">Breaking News</h3>
            </div>
            <div class="col-md-7 col-lg-9 m-auto">
                <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($data['top_headline'] as $headline)
                        <div class="carousel-item @if($loop->index === 0) active @endif">
                            <p class="m-0 d-inline-block text-truncate">
                                <a href="{{route('headline.show',$headline->slug)}}">{{__($headline->title)}}</a>
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-1 m-auto text-end">
                <span class="cursor-pointer fs-16" data-bs-target="#carouselExampleControls" data-bs-slide="prev"><i class="fas fa-chevron-circle-left "></i></span>
                <span class="cursor-pointer fs-16" data-bs-target="#carouselExampleControls" data-bs-slide="next"><i class="fas fa-chevron-circle-right "></i></span>
            </div>
        </div>
        <!-- breaking news end -->

        <!-- top news -->
        <!-- upper top news -->
        <div class="row mb-3 mt-4" data-aos="fade-up">
            @foreach($data['top_headline']->take(2) as $headline)
            @if($loop->index == 0)
            <div class="col-12 col-lg-8 stretch-card grid-margin">
                <div class="position-relative hover-effect">
                    <div class="post-thumb position-relative">
                        <img src="{{$headline->image}}" alt="banner" class="img-custom-top ffff w-100 cursor-pointer" />
                        <div class="img-overlay cursor-pointer">
                        </div>
                    </div>
                    <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                    <div class="banner-content">
                        <a href="{{route('headline.show',$headline->slug)}}">
                            {{ __($headline->title) }}
                        </a>
                        <div class="fs-12">
                            <span class="mr-2">{{$headline->author}} - </span>{{$headline->created_at->toFormattedDateString()}}
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 col-lg-4 grid-margin d-lg-flex">
                <div class="position-relative hover-effect">
                    <div class="post-thumb position-relative">
                        <img src="{{$headline->image}}" alt="banner" class="img-custom-top" />
                        <div class="img-overlay"></div>
                    </div>
                    <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                    <div class="banner-content">
                        <a href="{{route('headline.show',$headline->slug)}}">
                            {{ __($headline->title) }}
                        </a>
                        <div class="fs-12">
                            <span class="mr-2"> {{$headline->author}} - </span>{{$headline->created_at->toFormattedDateString()}}
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
            @foreach($data['top_headline']->slice(2)->take(4) as $headline)
            <div class="col-12 col-md-6 col-xl-3 mb-3">
                <div class="position-relative hover-effect">
                    <div class="post-thumb position-relative">
                        <img src="{{$headline->image}}" alt="banner" class="img-custom" />
                        <div class="img-overlay"></div>
                    </div>
                    <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                    <div class="banner-content">
                        <a href="{{route('headline.show',$headline->slug)}}">
                            {{ __($headline->title) }}
                        </a>
                        <div class="fs-12">
                            <span class="mr-2"> {{$headline->author}} - </span>{{$headline->created_at->toFormattedDateString()}}
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
                <h3 class="pointer pointer-lg mb-4 p-2">Entertainment</h3>
                <div class="position-relative">
                    <div class="row">
                        @foreach($headlines->slice(6)->take(6) as $headline)
                        <div class="col-md-6 col-lg-4 position-relative mb-3">
                            <div class="post-thumb position-relative mb-3">
                                <img src="{{$headline->image}}" alt="banner" class="img-custom" style="height:200px" />
                            </div>

                            <!-- <div class="badge badge-danger p-1 top-right-more">Global News</div> -->
                            <a href="{{url('/')}}" class="font-large">
                                {{ __($headline->title) }}
                            </a>
                            <!-- <h5 class="mt-3 mb-2 text-black">
                                {{$headline->title}}
                            </h5> -->
                            <p class="fs-13 mb-1 text-muted mt-2">
                                <span class="mr-2"> Posted by <strong class="text-danger">{{$headline->author}} </strong> - </span> {{$headline->created_at->toFormattedDateString()}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <!-- fashion -->
                <h3 class="pointer pointer-sm mb-4 mt-5 p-2">Fashion</h3>
                <div class="position-relative">
                    <div class="row">
                        @foreach($headlines->slice(12)->take(6) as $headline)
                        <div class="col-md-6 col-lg-4 position-relative mb-3">
                            <div class="post-thumb position-relative mb-3">
                                <img src="{{$headline->image}}" alt="banner" class="img-custom" style="height:200px" />
                            </div>

                            <!-- <div class="badge badge-danger p-1 top-right-more">Global News</div> -->
                            <a href="{{url('/')}}" class="font-large">
                                {{ __($headline->title) }}
                            </a>
                            <!-- <h5 class="mt-3 mb-2 text-black">
                                {{$headline->title}}
                            </h5> -->
                            <p class="fs-13 mb-1 text-muted mt-2">
                                <span class="mr-2"> Posted by <strong class="text-danger">{{$headline->author}} </strong> - </span> {{$headline->created_at->toFormattedDateString()}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <!-- Sports -->
                <h3 class="pointer pointer-sm mb-4 mt-5 p-2">Sports</h3>
                <div class="position-relative">
                    <div class="row">
                        @foreach($headlines->slice(14)->take(6) as $headline)
                        <div class="col-md-6 col-lg-4 position-relative mb-3">
                            <div class="post-thumb position-relative mb-3">
                                <img src="{{$headline->image}}" alt="banner" class="img-custom" style="height:200px" />
                            </div>

                            <!-- <div class="badge badge-danger p-1 top-right-more">Global News</div> -->
                            <a href="{{url('/')}}" class="font-large">
                                {{ __($headline->title) }}
                            </a>
                            <!-- <h5 class="mt-3 mb-2 text-black">
                                {{$headline->title}}
                            </h5> -->
                            <p class="fs-13 mb-1 text-muted mt-2">
                                <span class="mr-2"> Posted by <strong class="text-danger">{{$headline->author}} </strong> - </span> {{$headline->created_at->toFormattedDateString()}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <!-- recent post on left side -->
                <h3 class="pointer pointer-md mb-4 mt-5 p-2">Recent Posts</h3>
                <div class="position-relative">
                    @foreach($headlines->take(5) as $latest)
                    <div class="row py-2 border-bottom border-light">
                        <div class="col-sm-4 pr-2">
                            <img src="{{$latest->image}}" alt="thumb" class="img-custom rounded" />
                        </div>
                        <div class="col-sm-8 pl-2">
                            <h5 class="fw-bold text-black mb-0"><a href="{{route('headline.show',$latest->slug)}}">{{$latest->title}}</a></h5>
                            <p class="fs-13 text-muted mb-0 py-2">
                                <span class="mr-2">{{$latest->created_at->toFormattedDateString()}} - </span><span class="text-danger fw-bold">{{$latest->author}}</span>
                            </p>
                            <p class="fs-13 text-muted mb-0 text-break">
                                {!! $latest->news_description->description !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-4 p-2">
                    <button class="btn btn-danger"><i class="fas fa-spinner"></i> Load More</button>
                </div>
            </div>
            <!-- recent posts on right side -->
            <div class="col-xl-4 grid-margin bg-light p-3 rounded-1 h-100">
                <section class="">
                    <h3 class="pointer pointer-md p-2">Recent Posts</h3>
                    <div class="position-relative">
                        @foreach($headlines->take(5) as $latest)
                        <div class="row py-2 border-bottom border-light">
                            <div class="col-sm-4 pr-2">
                                <img src="{{$latest->image}}" alt="thumb" class="img-fluid w-100 rounded" />
                            </div>
                            <div class="col-sm-8 pl-2">
                                <p class="fs-16 font-weight-bold text-black mb-0"><a href="{{route('headline.show',$latest->slug)}}">{{$latest->title}}</a></p>
                                <p class="fs-13 text-muted mb-0">
                                    <span class="mr-2">{{$latest->created_at->toFormattedDateString()}} - </span>{{$latest->author}}
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