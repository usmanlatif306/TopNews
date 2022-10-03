<h3 class="pointer pointer-{{ $type }} mb-4 p-2">{{ $title }}</h3>
<div class="position-relative">
    <div class="row">
        @foreach ($news as $item)
            <div class="col-md-6 col-lg-4 position-relative mb-3">
                <div class="post-thumb position-relative mb-3">
                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class="img-custom" style="height:200px" />
                </div>

                <!-- <div class="badge badge-danger p-1 top-right-more">Global News</div> -->
                <a href="{{ route('news.show', [$item->category, $item->slug]) }}" class="font-large">
                    {{ __($item->title) }}
                </a>
                <!-- <h5 class="mt-3 mb-2 text-black">
                                {{ $item->title }}
                            </h5> -->
                <p class="fs-13 mb-1 text-muted mt-2">
                    <span class="mr-2"> Posted by <strong class="text-danger">{{ $item->author }} </strong> - </span>
                    {{ $item->created_at->toFormattedDateString() }}
                </p>
            </div>
        @endforeach
    </div>
</div>
<hr>
