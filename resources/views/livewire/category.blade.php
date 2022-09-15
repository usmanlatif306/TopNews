{{-- post table --}}
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Show</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="text-capitalize">{{ $category->name }}</td>
                    <td>
                        <input type="checkbox" value="{{ $category->status }}"
                            {{ $category->status === 1 ? 'checked' : '' }}
                            wire:click="toggleCategory('{{ $category->id }}')">
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No Category</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
