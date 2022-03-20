<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Race Types') }}
        </h2>
    </x-slot>

    
    @livewire('admin.race-type')

</x-app-layout>