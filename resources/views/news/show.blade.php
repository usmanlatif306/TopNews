@extends('layouts.app')
@push('seo')
    {!! SEO::generate() !!}
@endpush
@section('content')
    <div class="bg-white pt-4">
        <div class="container">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-8 mb-4">
                    <!--Section: Post data-mdb-->
                    <section class="border-bottom mb-4">
                        <img src="{{ $news->image }}" class="img-show" alt="{{ $news->title }}" />

                        <div class="row align-items-center my-4">
                            <h1 class="py-2">{{ $news->title }}</h1>
                            <small class="fw-semibold mb-2 fs-16">{!! $news->news_description->description !!}</small>
                            <div class="col-12 text-center text-lg-start mb-3 m-lg-0">
                                <span> Published <u>{{ $news->created_at->toFormattedDateString() }}</u> by</span>
                                <a href="javascript:void(0)" class="text-dark">{{ $news->author }}</a>
                            </div>
                        </div>
                    </section>
                    <!--Section: Post data-mdb-->

                    <!--Section: Text-->
                    <section class="pb-4 fs-18 text-justify">
                        {!! $news->news_description->content !!}
                    </section>
                    <!--Section: Share buttons-->
                    <section class="text-center border-top border-bottom py-4 mb-4">
                        <p><strong>Share with your friends:</strong></p>

                        {!! $shareComponent !!}

                    </section>
                    <!--Section: Share buttons-->


                    <!--Section: Previous Post-->
                    <section class=" mb-4 pb-4">
                        <div class="d-flex justify-content-between border border-light p-3 rounded mx-2">
                            <!-- pevious news -->
                            @if ($news->previous)
                                <a href="{{ route('news.show', [$news->previous->category, $news->previous->slug]) }}"
                                    class="btn btn-outline-secondary">Previous News</a>
                            @else
                                <button class="btn btn-outline-secondary" disabled>Previous News</button>
                            @endif

                            <!-- next news -->
                            @if ($news->next)
                                <a href="{{ route('news.show', [$news->next->category, $news->next->slug]) }}"
                                    class="btn btn-outline-secondary">Next News</a>
                            @else
                                <button class="btn btn-outline-secondary" disabled>Next News</button>
                            @endif
                        </div>
                    </section>
                    <!--Section: Previous Post -->
                    <!--Section: Reply-->
                    <!-- <section>
                                            <h3 class="py-2"><strong>Leave a comment </strong></h3>
                                            <form>
                                                <div class="mb-3">

                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name*">

                                                </div>
                                                <div class="mb-3">

                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email*">

                                                </div>
                                                <div class="mb-3">

                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Website">

                                                </div>

                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                    <label for="floatingTextarea2">Your Message</label>
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Save my name, email, and website in this browser for the next time I comment.</label>
                                                </div>
                                                <button type="submit" class="btn btn-danger">Post Comment</button>
                                            </form>
                                        </section> -->
                    <!--Section: Reply-->
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4 bg-light p-3 rounded-1">
                    <!--Section: Sidebar-->
                    <section class="sticky-top">
                        <!--Section: Ad-->
                        <h3 class="pointer pointer-md m-0 p-0 ps-3">Recent Posts</h3>
                        <div class="position-relative mt-3">
                            @foreach ($latests as $latest)
                                <div class="row py-2 border-bottom border-light">
                                    <div class="col-sm-4 pr-2">
                                        <img src="{{ $latest->image }}" alt="thumb" class="img-fluid w-100 rounded" />
                                    </div>
                                    <div class="col-sm-8 pl-2">
                                        <p class="fs-16 font-weight-bold text-black mb-0"><a
                                                href="{{ route('news.show', [$latest->category, $latest->slug]) }}">{{ $latest->title }}</a>
                                        </p>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2">{{ $latest->created_at->toFormattedDateString() }} -
                                            </span>{{ $latest->author }}
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <!--Section: Sidebar-->
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let links = document.getElementById('social-links').childNodes[0].childNodes;
        // console.log(links);
        var len = links.length;

        for (var i = 0; i < len; i++) {
            links[i].children[0].target = "_blank";
        }
    </script>
@endpush
