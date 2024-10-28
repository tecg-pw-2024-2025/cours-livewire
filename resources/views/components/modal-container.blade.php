@props([
    'childName',
    'childPayload'=>[],
])

<div x-ref="modal"
     class="modal"
     x-data="modal"
     @click.away="$el.classList.remove('active'); setTimeout(()=>$wire.closeModal(),300);"
     @keydown.esc.window="$el.classList.remove('active'); setTimeout(()=>$wire.closeModal(),300);">

    @php
        $organization = null;
        if(array_key_exists('id',$childPayload)){
            $organization = \App\Models\Organization::findOrFail($childPayload['id']);
        }

    @endphp
    @livewire($childName, compact('organization'))
</div>


