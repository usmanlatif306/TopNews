<div>
    <div class="content-wrapper">
        <div class="container">
            <!-- breaking news -->
            @include('partials.breaking_news')
            <!-- breaking news end -->

            <!-- top news -->
            <!-- upper top news -->
            <div class="row mb-3 mt-4" data-aos="fade-up">
                @foreach ($data['top']->take(2) as $news)
                    @if ($loop->index == 0)
                        <div class="col-12 col-lg-8 stretch-card grid-margin">
                            <div class="position-relative hover-effect">
                                <div class="post-thumb position-relative">
                                    <img src="{{ $news->image }}" alt="{{ $news->title }}"
                                        class="img-custom-top ffff w-100 cursor-pointer" />
                                    <div class="img-overlay cursor-pointer">
                                    </div>
                                </div>
                                <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                                <div class="banner-content">
                                    <a href="{{ route('news.show', [$news->category, $news->slug]) }}">
                                        {{ __($news->title) }}
                                    </a>
                                    <div class="fs-12">
                                        <span class="mr-2">{{ $news->author }} -
                                        </span>{{ $news->created_at->toFormattedDateString() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12 col-lg-4 grid-margin d-lg-flex">
                            <div class="position-relative hover-effect">
                                <div class="post-thumb position-relative">
                                    <img src="{{ $news->image }}" alt="{{ $news->title }}" class="img-custom-top" />
                                    <div class="img-overlay"></div>
                                </div>
                                <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                                <div class="banner-content">
                                    <a href="{{ route('news.show', [$news->category, $news->slug]) }}">
                                        {{ __($news->title) }}
                                    </a>
                                    <div class="fs-12">
                                        <span class="mr-2"> {{ $news->author }} -
                                        </span>{{ $news->created_at->toFormattedDateString() }}
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
                @foreach ($data['top']->slice(2)->take(4) as $news)
                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                        <div class="position-relative hover-effect">
                            <div class="post-thumb position-relative">
                                <img src="{{ $news->image }}" alt="{{ $news->title }}" class="img-custom" />
                                <div class="img-overlay"></div>
                            </div>
                            <!-- <div class="badge badge-danger p-1 top-right">Global News</div> -->
                            <div class="banner-content">
                                <a href="{{ route('news.show', [$news->category, $news->slug]) }}">
                                    {{ __($news->title) }}
                                </a>
                                <div class="fs-12">
                                    <span class="mr-2"> {{ $news->author }} -
                                    </span>{{ $news->created_at->toFormattedDateString() }}
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
                    <!-- showing different categories news -->
                    @foreach (array_slice($this->categories, 1) as $category)
                        @php
                            $type = strlen($category) < 9 ? 'sm' : 'lg';
                            $title = ucfirst($category);
                        @endphp
                        @include('partials.category', [
                            'news' => $data[$category],
                            'type' => $type,
                            'title' => $title,
                        ])
                    @endforeach
                    <!-- showing different categories news end -->

                    <!-- recent post on left side -->
                    @livewire('homepage-view-more')
                </div>
                <!-- recent posts on right side -->
                <div class="col-xl-4 grid-margin bg-light p-3 rounded-1 h-100">
                    {{-- recent posts --}}
                    <section class="">
                        <h3 class="pointer pointer-md p-2">Recent Posts</h3>
                        <div class="position-relative">
                            @foreach ($data['top']->take(5) as $latest)
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
                    {{-- advertisement --}}
                    <section class="mt-4">
                        <h3 class="pointer pointer-md p-2">Advertising</h3>
                        <div class="position-relative p-3">
                            <img src="{{ asset('images/Default_05-360x260.jpg') }}" alt="Advertising"
                                class="img-fluid">
                        </div>
                    </section>
                </div>
                <!-- recent post on right side end -->

            </div>
        </div>
    </div>
</div>
