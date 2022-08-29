<div>
    <h3 class="pointer pointer-md mb-4 mt-5 p-2">Recent Posts</h3>
    <div class="position-relative">
        @foreach($latests as $latest)
        <div class="row py-2 border-bottom border-light">
            <div class="col-sm-4 pr-2">
                <img src="{{$latest->image}}" alt="thumb" class="img-custom rounded" />
            </div>
            <div class="col-sm-8 pl-2 mt-3 mt-sm-0">
                <h5 class="fw-bold text-black mb-0"><a href="{{route('news.show',[$latest->category,$latest->slug])}}">{{$latest->title}}</a></h5>
                <p class="fs-13 text-muted mb-0 py-2">
                    <span class="mr-2">{{$latest->created_at->toFormattedDateString()}} - </span><span class="text-danger fw-bold">{{$latest->author}}</span>
                </p>
                <p class="fs-13 text-muted mb-0 text-break">
                    {{ substr($latest->news_description->description,0,350) }}...
                </p>
            </div>
        </div>
        @endforeach
    </div>
    @if($latests->count() < $total) <div class="text-center mt-4 p-2">
        <button wire:click="addMore" class="btn btn-danger shadow-none"><i class="fas fa-spinner"></i> Load More</button>
</div>
@endif
</div>