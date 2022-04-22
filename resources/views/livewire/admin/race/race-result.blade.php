<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    @section('css')
    <link rel="stylesheet" href="{{ mix('css/select2.tailwind.css') }}">
    <style>
    </style>
    @endsection
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="rounded shadow bg-white dark:bg-gray-800 dark:text-gray-900">
        <div class="w-full px-2 py-2 flex items-center justify-between">
            <h3 class="text-2xl font-bold dark:text-gray-100">Race result</h3>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded" wire:click="createShowModal">Add result</button>
        </div>
        <!-- Race result Table -->
        <div class="mt-4">
            <div class="w-full overflow-hidden rounded-lg shadow">
                <div class="w-full overflow-x-auto">
                <table class="table-fixed w-full">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Racer</th>
                        <th>Event</th>
                        <th>Year</th>
                        <th>Place</th>
                        <th>Racer class</th>
                        <th>Board class</th>
                        <th>Race type</th>
                        <th>Event tier</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($results as $result)
                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">{{ $result->rider_first_name }} {{ $result->rider_last_name }}</td>
                        <td>{{ $result->event_name }}</td>
                        <td>{{ date('Y', strtotime($result->event_date)) }}</td>
                        <td>{{ $result->place }}</td>
                        <td>{{ $result->racer_class }}</td>
                        <td></td>
                        <td>{{ $result->race_type_name }} <{{ $result->race_length }}</td>
                        <td>{{ $result->event_tier }}</td>
                        <td class="px-4 py-3">
                            <button wire:click="updateShowModal({{ $result->id }})" id="edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">Edit</button>
                            <button wire:click="deleteConfirm({{ $result->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <!-- Pagination -->
                {{-- {{ $users->links() }} --}}
                </div>
            </div>
        </div>
        <!-- ./race result Table -->
    </div>

    <!-- Add Item Modal -->
    <x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        {{ __('Add race result') }}
    </x-slot>

    <x-slot name="content">
        <div class="mt-4">
            <x-jet-label for="class" class="font-bold" value="{{ __('Event') }}" />
            <div @click.away="open = false" class="relative w-full mt-2" x-data="{ open: false }">
                <button @click="open = !open" class="p-3 border border-gray-300 text-gray-900 dark:bg-gray-800 dark:text-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 px-3 rounded-md shadow-sm w-full">
                    <span class="float-left">{{ $event_name != '' ? $this->event_name : 'Select an event' }}</span>
                  <svg class=" pt-1 h-4 float-right fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                    <g>
                      <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
                    </g>
                  </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right bg-gray-50 rounded-md shadow-lg z-50">
                  <ul>
                    <li class="p-2"><input class="border-2 p-2 rounded h-8 w-full" wire:model.debounce.800ms="search_event" placeholder="Search..."><br></li>
                    <div class="max-h-32 w-full overflow-y-scroll">
                    @foreach($events as $event)
                    <li @click="open = false" class="focus:ring-indigo-200 hover:bg-blue-600" x-on:click="$wire.set('event', {{ $event->id }}); $wire.set('event_name', '{{ $event->name }}')">
                      <p class="p-2 block text-black hover:text-white cursor-pointer">
                      {{ $event->name }}
                      @if($event->id == $this->event)
                      <svg class="float-right" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M6.61 11.89L3.5 8.78 2.44 9.84 6.61 14l8.95-8.95L14.5 4z"/></svg>
                      @endif
                      </p>
                    </li>
                    @endforeach
                    </div>
                  </ul>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <x-jet-label for="race" class="font-bold" value="{{ __('Race *') }}" />
            <div @click.away="open = false" class="relative w-full mt-2" x-data="{ open: false }">
                <button @click="open = !open" class="p-3 border border-gray-300 text-gray-900 dark:bg-gray-800 dark:text-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 px-3 rounded-md shadow-sm w-full">
                    <span class="float-left">{{ $race_name != '' ? $this->race_name : 'Select a race' }}</span>
                  <svg class=" pt-1 h-4 float-right fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                    <g>
                      <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
                    </g>
                  </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right bg-gray-50 rounded-md shadow-lg z-50">
                  <ul>
                    <li class="p-2"><input class="border-2 p-2 rounded h-8 w-full" wire:model.debounce.800ms="search_race" placeholder="Search..."><br></li>
                    <div class="max-h-32 w-full overflow-y-scroll">
                    @foreach($races as $race)
                    <li @click="open = false" class="focus:ring-indigo-200 hover:bg-blue-600" x-on:click="$wire.set('race', {{ $race->id }}); $wire.set('race_name', '{{ $race->name }}')">
                      <p class="p-2 block text-black hover:text-white cursor-pointer">
                      {{ $race->name }}
                      @if($race->id == $this->race)
                      <svg class="float-right" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M6.61 11.89L3.5 8.78 2.44 9.84 6.61 14l8.95-8.95L14.5 4z"/></svg>
                      @endif
                      </p>
                    </li>
                    @endforeach
                    </div>
                  </ul>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <x-jet-label for="race" class="font-bold" value="{{ __('Racer *') }}" />
            <div @click.away="open = false" class="relative w-full mt-2" x-data="{ open: false }">
                <button @click="open = !open" class="p-3 border border-gray-300 text-gray-900 dark:bg-gray-800 dark:text-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 px-3 rounded-md shadow-sm w-full">
                    <span class="float-left">{{ $full_name != '' ? $this->full_name : 'Select a rider' }}</span>
                  <svg class=" pt-1 h-4 float-right fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                    <g>
                      <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
                    </g>
                  </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right bg-gray-50 rounded-md shadow-lg z-50">
                  <ul>
                    <li class="p-2"><input class="border-2 p-2 rounded h-8 w-full" wire:model.debounce.800ms="search_rider" placeholder="Search..."><br></li>
                    <div class="max-h-32 w-full overflow-y-scroll">
                    @foreach($racers as $racer)
                    <li @click="open = false" class="focus:ring-indigo-200 hover:bg-blue-600" x-on:click="$wire.set('racer', {{ $racer->id }}); $wire.set('full_name', '{{ $racer->first_name }} {{ $racer->last_name }}')">
                      <p class="p-2 block text-black hover:text-white cursor-pointer">
                        {{ $racer->first_name }} {{ $racer->last_name }}
                      @if($racer->id == $this->racer)
                      <svg class="float-right" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M6.61 11.89L3.5 8.78 2.44 9.84 6.61 14l8.95-8.95L14.5 4z"/></svg>
                      @endif
                      </p>
                    </li>
                    @endforeach
                    </div>
                  </ul>
                </div>
            </div>
        </div>
        {{-- <div class="mt-4" wire:ignore>
            <x-jet-label for="racer" class="font-bold" value="{{ __('Racer *') }}" />
            <x-select class="block mt-2 w-full" wire:model.debounce.800ms="racer" id="racer" style="width: 100%">
                <option value="0">Select racer</option>
                @foreach ($racers as $racer)
                <option value="{{ $racer->id }}">{{ $racer->first_name }} {{ $racer->last_name }}</option>  
                @endforeach
            </x-select>
            @error('racer') <span class="text-red-400">{{ $message }}</span> @enderror
        </div> --}}
        <div class="mt-4">
            <x-jet-label for="place" value="{{ __('Place *') }}" />
            <x-jet-input id="place" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="place" />
            @error('place') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>


        @if ($modelId)
            <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-danger-button>
        @else
            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-danger-button>
        @endif
    </x-slot>
    </x-jet-dialog-modal>
    @push('scripts')
    <script src="{{ mix('js/jquery.js')}}"></script>
    <script src="{{ mix('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#race').select2();
            $('#race').on('change', function (e) {
                var race = $('#race').select2("val");
                @this.set('race', race);
            });
            $('#event').select2();
            $('#event').on('change', function (e) {
                var event = $('#event').select2("val");
                @this.set('event', event);
            });
            $('#racer').select2();
            $('#racer').on('change', function (e) {
                var racer = $('#racer').select2("val");
                @this.set('racer', racer);
            });
        });
    </script>
    @endpush
</div>
