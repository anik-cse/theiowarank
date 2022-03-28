<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Race result') }}
        </h2>
    </x-slot>

    
    @livewire('admin.race-result')

</x-app-layout>