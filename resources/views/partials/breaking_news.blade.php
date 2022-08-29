<!-- breaking news -->
<div class="row bg-white p-1 m-0 d-none d-md-flex">
    <div class="col-md-3 col-lg-2 ps-0">
        <h3 class="pointer breaking-news m-0 p-0 p-2">Breaking News</h3>
    </div>
    <div class="col-md-7 col-lg-9 m-auto">
        <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($breaking_news as $item)
                <div class="carousel-item @if($loop->index === 0) active @endif">
                    <p class="m-0 d-inline-block text-truncate">
                        <a href="{{route('news.show',[$item->category,$item->slug])}}">{{__($item->title)}}</a>
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