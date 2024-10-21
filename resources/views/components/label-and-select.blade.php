@props([
    'labelText' => '',
    'modelProperty' => '',
    'options' => [],
    'id' => ''
])
@php $id = $id ?: bin2hex(random_bytes(16)) @endphp
<div {{ $attributes->class(['pb-8 pr-6 w-full lg:w-1/2']) }}>

    <label class="form-label"
           for="{{ $id }}">{{ $labelText }}</label>

    @error($modelProperty)<span class="text-red-500 mb-2 block">{{ $message }}</span> @enderror

    <select id="{{ $id }}"
            class="form-select"
        {{ $attributes->whereStartsWith('wire:model') }}
    >
        @foreach($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>

</div>
