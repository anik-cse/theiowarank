<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    @section('css')
    <link rel="stylesheet" href="{{ mix('css/select2.tailwind.css') }}">
    <style>
    </style>
    @endsection
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex">
        <h2 class="text-3xl font-bold dark:text-gray-200">events</h2>
    </div>

    <div class="grid md:grid-cols-8 h-14 py-3 gap-4">
        <button class="shadow md:col-start-1 md:col-end-1 bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white py-2 px-4" type="button">
            Add New
        </button>
        <div class="md:col-start-2 md:col-end-5 bg-white rounded flex items-center w-full mr-4 p-0 shadow-sm border border-gray-200">
            <button class="pl-3 border-transparent focus:border-transparent focus:ring-0">
            <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
            <input type="search" name="search" id="" placeholder="search rider" class="w-full pl-3 text-sm text-black border-transparent focus:border-transparent focus:ring-0 bg-transparent" />
        </div>
    </div>

    <div class="grid md:grid-cols-10 py-20">
        <div class="md:col-start-1 md:col-end-4 md:px-6">
            <table class="table-auto border-separate my-table-spacing text-left">
                <thead>
                  <tr>
                    <th>Event</th>
                    <th class="pl-4">Type</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td class="py-4">
                            <p class="text-sm">{{ $event->name }}</p>
                            <p class="text-xs font-bold">{{ $event->city }}, {{ $event->region }}, {{ $event->iso }}</p>
                        </td>
                        <td class="py-4 pl-4">
                            <p class="text-sm">{{ $event->type }}</p>
                        </td>
                      </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="md:col-start-4 md:col-end-8 md:px-6 md:border-l-4 md:border-slate-900">
            <div class="h-6 text-2xl md:text-3xl font-bold dark:text-gray-200">
                <span>{{ $name }}</span>
            </div>
            <div class="col-span-12 sm:col-span-12 md:py-2">
                <x-jet-label for="event_name" class="font-bold" value="{{ __('Name *') }}" />
                <x-jet-input id="event_name" class="block mt-2 w-full" type="text" wire:model="name" placeholder="Name" :value="old('name')" autocomplete="event_name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="col-span-12 sm:col-span-12 py-4">
                <x-jet-label for="start_date" class="font-bold" value="{{ __('Start date *') }}" />
                <div class="flex flex-wrap mb-2 mt-2">
                    <div class="w-full md:w-1/4 mb-6 md:mb-0">
                        <x-jet-input id="date" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="start_day" placeholder="01" :value="old('start_day')" autocomplete="day" />
                        <x-jet-input-error for="start_day" class="mt-2" />
                    </div>
                    <div class="w-full md:w-2/4 px-2 mt-2 mb-6 md:mb-0">
                        <x-select class="block w-full" wire:model.debounce.800ms="start_month">
                            <option value="">Select a month</option>
                            @foreach ($months as $key => $month)
                            <option value="{{ $key }}">{{ $month }}</option>
                            @endforeach
                        </x-select>
                        <x-jet-input-error for="start_month" class="mt-2" />
                    </div>
                    <div class="w-full md:w-1/4 mb-6 md:mb-0">
                        <x-jet-input id="year" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="start_year" placeholder="2022" :value="old('start_year')" autocomplete="year" />
                        <x-jet-input-error for="start_year" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12 py-4">
                <x-jet-label for="end_date" class="font-bold" value="{{ __('End date *') }}" />
                <div class="flex flex-wrap mb-2 mt-2">
                    <div class="w-full md:w-1/4 mb-6 md:mb-0">
                        <x-jet-input id="date" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="end_day" placeholder="01" :value="old('end_day')" autocomplete="day" />
                        <x-jet-input-error for="end_day" class="mt-2" />
                    </div>
                    <div class="w-full md:w-2/4 px-2 mt-2 mb-6 md:mb-0">
                        <x-select class="block w-full" wire:model.debounce.800ms="end_month">
                            <option value="">Select a month</option>
                            @foreach ($months as $key => $month)
                            <option value="{{ $key }}">{{ $month }}</option>
                            @endforeach
                        </x-select>
                        <x-jet-input-error for="end_month" class="mt-2" />
                    </div>
                    <div class="w-full md:w-1/4 mb-6 md:mb-0">
                        <x-jet-input id="year" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="end_year" placeholder="2022" :value="old('end_year')" autocomplete="year" />
                        <x-jet-input-error for="end_year" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12 py-4">
                <x-jet-label for="venue_name" class="font-bold" value="{{ __('Location *') }}" />
                <x-jet-input id="venue_name" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="venue" placeholder="Venue name" :value="old('venue')" autocomplete="venue_name" />
                <x-jet-input-error for="venue" class="mt-2" />

                <x-jet-input id="address_one" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="address_one" placeholder="Address" :value="old('address_one')" autocomplete="address_one" />
                <x-jet-input-error for="address_one" class="mt-2" />

                <x-jet-input id="address_two" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="address_two" placeholder="Address" :value="old('address_one')" autocomplete="address_two" />
                <x-jet-input-error for="address_two" class="mt-2" />

                <x-jet-input id="city" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="city" placeholder="City" :value="old('city')" autocomplete="city" />
                <x-jet-input-error for="city" class="mt-2" />

                <x-jet-input id="region" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="region" placeholder="Region" :value="old('region')" autocomplete="region" />
                <x-jet-input-error for="region" class="mt-2" />

                <x-jet-input id="post_code" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="post_code" placeholder="Post Code" :value="old('post_code')" autocomplete="post_code" />
                <x-jet-input-error for="post_code" class="mt-2" />
                
                <div class="mt-2" wire:ignore>
                <x-select style="width: 100%" 
                data-placeholder="Select a country"
                data-allow-clear="false"
                title="Select country"
                class="select-single">
                    <option value="">Select a country</option>
                    @foreach($countries as $key => $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </x-select>
                <x-jet-input-error for="country" class="mt-2" />
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12 py-1">
                <x-jet-label for="type" class="font-bold" value="{{ __('Type') }}" />
                <x-select class="block mt-2 w-full" wire:model.debounce.800ms="type">
                    <option value="0">Select a type</option>
                    @foreach ($event_types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>  
                    @endforeach
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-12 py-1">
                <x-jet-label for="tier" class="font-bold" value="{{ __('Tier *') }}" />
                <x-select class="block mt-2 w-full" wire:model.debounce.800ms="tier">
                    <option value="0">Select a tier</option>
                    @foreach ($event_tiers as $tier)
                    <option value="{{ $tier->id }}">{{ $tier->name }}</option>  
                    @endforeach
                </x-select>
                <x-jet-input-error for="tier" class="mt-2" />
            </div>
            <div class="col-span-12 sm:col-span-12 py-1">
                <x-jet-label for="organization" class="font-bold" value="{{ __('Organization') }}" />
                <x-jet-input id="organization" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="organization" placeholder="Organization" :value="old('organization')" autocomplete="organization" />
                <x-jet-input-error for="organization" class="mt-2" />
            </div>
            <div class="col-span-12 sm:col-span-12 py-1">
                <x-jet-label for="email" class="font-bold" value="{{ __('Email *') }}" />
                <x-jet-input id="email" class="block mt-2 w-full" type="text" wire:model.debounce.800ms="email" placeholder="your@mail.com" :value="old('email')" autocomplete="email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>
            <div class="col-span-12 sm:col-span-12 py-1">
                <x-jet-label for="phone" class="font-bold" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-2 w-2/4" type="tel" wire:model.debounce.800ms="phone" placeholder="+11234567890" :value="old('phone')" autocomplete="phone" />
                <x-jet-input-error for="phone" class="mt-2" />
            </div>

            <x-button class="mt-2 bg-purple-500 hover:bg-purple-400" wire:click="create">
                {{ __('Save') }}
            </x-button>
        </div>
        <div class="md:col-start-8 md:col-end-11 px-6 mt-5">
            <div class="py-6">
                @livewire('admin.race')
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ mix('js/jquery.js')}}"></script>
    <script src="{{ mix('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select-single').select2();
            $('.select-single').on('change', function (e) {
                var data = $('.select-single').select2("val");
                @this.set('country', data);
            });
        });
    </script>
    @endpush
</div>