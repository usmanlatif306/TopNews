<div class="col-md-2">
    <select class="custom-select" wire:model='country'>
      @foreach ($countries as $item)
      <option {{ $country === $item->code ? 'selected="selected"' : '' }} value="{{ $item->code }}">{{ $item->name }}</option>  
      @endforeach
    </select>
</div>
