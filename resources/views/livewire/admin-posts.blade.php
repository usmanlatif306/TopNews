<div>
    <div class="mb-3">
        <button
            class="btn btn-xs mb-2 @if ($category === 'all') btn-primary @else btn-outline-primary @endif shadow-none"
            wire:click="selectCategory('all')">All</button>
        @foreach ($categories as $item)
            <button
                class="btn btn-xs mb-2 text-capitalize @if ($category === $item) btn-primary @else btn-outline-primary @endif shadow-none"
                wire:click="selectCategory('{{ $item }}')">{{ $item }}</button>
        @endforeach
    </div>
    {{-- post search and limit --}}
    <div class="row">
        <div class="col-md-4 mb-2 mb-md-0">
            <select wire:model="limit" class="form-control form-control-xs">
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <input type="text" class="form-control form-control-xs" placeholder="Search..." wire:model="search">
        </div>
    </div>
    {{-- post table --}}
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Title</th>
                    <th scope="col">Show</th>
                    {{-- <th scope="col">Date</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                        <td>{{ $post->title }}</td>
                        <td>
                            <input type="checkbox" value="{{ $post->status }}"
                                {{ $post->status === 1 ? 'checked' : '' }}
                                wire:click="togglePost('{{ $post->id }}')">
                        </td>
                        {{-- <td>{{ $post->created_at }}</td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No News</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    </div>
</div>
