@props([
    'labelText' => '',
    'options' => [],
    'id' => ''
])
@php $id = $id ?: bin2hex(random_bytes(16)) @endphp
<div {{ $attributes
    ->only(['class'])
    ->class(['pb-8 pr-6 w-full lg:w-1/2 relative']) }}
>

    <label class="form-label"
           for="{{ $id }}">{{ $labelText }}</label>

    @error($modelProperty)<span class="text-red-500 mb-2 block absolute p-2 bg-pink-100">{{ $message }}</span> @enderror

    <select id="{{ $id }}"
            class="form-select"
            @if($attributes->has('model-property'))
            wire:model="{{ $attributes->get('model-property') }}"
            @endif
    >
        @foreach($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>

</div>
