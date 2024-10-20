<x-page-full-main-nav>
    <x-slot name="maincontent">
        <main {{ $attributes->class(['main-content px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto']) }}>
            {{ $maincontent }}
        </main>
    </x-slot>
</x-page-full-main-nav>
