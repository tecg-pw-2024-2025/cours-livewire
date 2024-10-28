@props([
    'labelText' => '',
    'type' => 'text',
    'id' => '',
])
@php $id = $id ?: bin2hex(random_bytes(16)) @endphp
<div {{ $attributes
    ->only(['class'])
    ->class(['pb-8 pr-6 w-full lg:w-1/2 relative group']) }}
>

    <label class="form-label"
           for="{{ $id }}">{{ $labelText }}</label>

    @error($modelProperty)<span class="text-red-500 mb-2 block absolute p-2 bg-pink-100 bottom-0 rounded ring-1 ring-pink-200 ring-offset-2" x-ref="error{{ $id }}">{{ $message }}</span> @enderror

    <input id="{{ $id }}"
           class="form-input"
           @focus="if($refs.error{{ $id }}) $refs.error{{ $id }}.remove()"
           {{ $attributes->whereStartsWith('autofocus') }}
           type="text"
           @if ($attributes->has('model-property'))
               wire:model="{{ $modelProperty }}"
            @endif
    >


</div>
