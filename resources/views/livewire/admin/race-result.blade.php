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
                        <td></td>
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
        <div class="mt-4" wire:ignore>
            <x-jet-label for="race" class="font-bold" value="{{ __('Race *') }}" />
            <x-select class="block mt-2 w-full" wire:model.debounce.800ms="race" id="race" style="width: 100%">
                <option value="0">Select race</option>
                @foreach ($races as $race)
                <option value="{{ $race->id }}">{{ $race->name }}</option>  
                @endforeach
            </x-select>
            @error('race') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4" wire:ignore>
            <x-jet-label for="event" class="font-bold" value="{{ __('Event *') }}" />
            <x-select class="block mt-2 w-full" wire:model.debounce.800ms="event" id="event" style="width: 100%">
                <option value="0">Select event</option>
                @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->name }}</option>  
                @endforeach
            </x-select>
            @error('event') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4" wire:ignore>
            <x-jet-label for="racer" class="font-bold" value="{{ __('Racer *') }}" />
            <x-select class="block mt-2 w-full" wire:model.debounce.800ms="racer" id="racer" style="width: 100%">
                <option value="0">Select racer</option>
                @foreach ($racers as $racer)
                <option value="{{ $racer->id }}">{{ $racer->first_name }} {{ $racer->last_name }}</option>  
                @endforeach
            </x-select>
            @error('racer') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
