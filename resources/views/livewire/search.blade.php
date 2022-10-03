<div>
    <div class="mb-3">
        <button
            class="btn btn-xs @if ($category === 'all') btn-primary @else btn-outline-primary @endif shadow-none"
            wire:click="selectCategory('all')">All</button>
        @foreach ($categories as $item)
            <button
                class="btn btn-xs text-capitalize @if ($category === $item) btn-primary @else btn-outline-primary @endif shadow-none"
                wire:click="selectCategory('{{ $item }}')">{{ $item }}</button>
        @endforeach

    </div>
    @forelse($results as $latest)
        <div class="row py-2 border-bottom border-light">
            <div class="col-sm-4 pr-2">
                <img src="{{ $latest->image }}" alt="{{ $latest->title }}" class="img-custom rounded" />
            </div>
            <div class="col-sm-8 pl-2">
                <h5 class="fw-bold text-black mb-0"><a
                        href="{{ route('news.show', [$latest->category, $latest->slug]) }}">{{ $latest->title }}</a></h5>
                <p class="fs-13 text-muted mb-0 py-2">
                    <span class="mr-2">{{ $latest->created_at->toFormattedDateString() }} - </span><span
                        class="text-danger fw-bold">{{ $latest->author }}</span>
                </p>
                <p class="fs-13 text-muted mb-0 text-break">
                    {!! $latest->news_description->description !!}
                </p>
            </div>
        </div>
    @empty
        <h4 class="pt-3">No data found</h4>
    @endforelse
    @if ($results->count() < $total)
        <div class="text-center mt-4 p-2">
            <button wire:click="loadMore" class="btn btn-danger shadow-none"><i class="fas fa-spinner"></i> Load
                More</button>
        </div>
    @endif
</div>
