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
                  <tr>
                    <td class="py-4">
                        <p class="text-sm">Float Life Feast(2020)</p>
                        <p class="text-xs font-bold">Austin, TX, US</p>
                    </td>
                    <td class="py-4 pl-4">
                        <p class="text-sm">Profesional</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-4">
                        <p class="text-sm">Float Life Feast(2020)</p>
                        <p class="text-xs font-bold">Austin, TX, US</p>
                    </td>
                    <td class="py-4 pl-4">
                        <p class="text-sm">Profesional</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-4">
                        <p class="text-sm">International Float Life Feast(2020)</p>
                        <p class="text-xs font-bold">Austin, TX, US</p>
                    </td>
                    <td class="py-4 pl-4">
                        <p class="text-sm">Profesional</p>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="md:col-start-4 md:col-end-8 md:px-6 md:border-l-4 md:border-slate-900">
            <x-form-section submit="">
                <x-slot name="form">
                    <div class="col-span-12 sm:col-span-12 py-2">
                        <x-jet-label for="name" class="font-bold" value="{{ __('Name *') }}" />
                        <x-jet-input id="name" class="block mt-2 w-full" type="text" name="name" placeholder="Name" :value="old('name')" required autocomplete="name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-4">
                        <x-jet-label for="start_date" class="font-bold" value="{{ __('Start date *') }}" />
                        <div class="flex flex-wrap mb-2 mt-2">
                            <div class="w-full md:w-1/4 px-1 mb-6 md:mb-0">
                                <x-jet-input id="date" class="block mt-2 w-full" type="text" name="date" placeholder="01" :value="old('date')" required autocomplete="date" />
                            </div>
                            <div class="w-full md:w-2/4 px-1 mt-2 mb-6 md:mb-0">
                                <x-select class="block w-full" name="month">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </x-select>
                            </div>
                            <div class="w-full md:w-1/4 px-1 mb-6 md:mb-0">
                                <x-jet-input id="year" class="block mt-2 w-full" type="text" name="year" placeholder="2022" :value="old('year')" required autocomplete="year" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-4">
                        <x-jet-label for="end_date" class="font-bold" value="{{ __('End date *') }}" />
                        <div class="flex flex-wrap mb-2 mt-2">
                            <div class="w-full md:w-1/4 px-1 mb-6 md:mb-0">
                                <x-jet-input id="date" class="block mt-2 w-full" type="text" name="date" placeholder="01" :value="old('date')" required autocomplete="date" />
                            </div>
                            <div class="w-full md:w-2/4 px-1 mt-2 mb-6 md:mb-0">
                                <x-select class="block w-full" name="month">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </x-select>
                            </div>
                            <div class="w-full md:w-1/4 px-1 mb-6 md:mb-0">
                                <x-jet-input id="year" class="block mt-2 w-full" type="text" name="year" placeholder="2022" :value="old('year')" required autocomplete="year" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-4">
                        <x-jet-label for="address" class="font-bold" value="{{ __('Location *') }}" />
                        <x-jet-input id="venue_name" class="block mt-2 w-full" type="text" name="venue_name" placeholder="Venue name" :value="old('venue_name')" required autocomplete="venue_name" />
                        <x-jet-input-error for="venue_name" class="mt-2" />

                        <x-jet-input id="address_one" class="block mt-2 w-full" type="text" name="address_one" placeholder="Address" :value="old('address_one')" required autocomplete="address_one" />
                        <x-jet-input-error for="address_one" class="mt-2" />

                        <x-jet-input id="address_two" class="block mt-2 w-full" type="text" name="address_two" placeholder="Address" :value="old('address_one')" required autocomplete="address_two" />
                        <x-jet-input-error for="address_one" class="mt-2" />

                        <x-jet-input id="city" class="block mt-2 w-full" type="text" name="city" placeholder="City" :value="old('city')" required autocomplete="city" />
                        <x-jet-input-error for="city" class="mt-2" />

                        <x-jet-input id="region" class="block mt-2 w-full" type="text" name="region" placeholder="Region" :value="old('region')" required autocomplete="region" />
                        <x-jet-input-error for="region" class="mt-2" />

                        <x-jet-input id="post_code" class="block mt-2 w-full" type="text" name="post_code" placeholder="Post Code" :value="old('post_code')" required autocomplete="post_code" />
                        <x-jet-input-error for="post_code" class="mt-2" />
                        
                        <div class="mt-2">
                        <x-select style="width: 100%" 
                        data-placeholder="Select a country"
                        data-allow-clear="false"
                        title="Select country"
                        class="select-single" name="country" wire:ignore>
                            @foreach($countries as $key => $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </x-select>
                        <x-jet-input-error for="country" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="type" class="font-bold" value="{{ __('Type') }}" />
                        <x-select class="block w-full" name="type">
                            <option value="">Profesional</option>
                        </x-select>
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="organization" class="font-bold" value="{{ __('Organization') }}" />
                        <x-jet-input id="organization" class="block mt-2 w-full" type="text" name="organization" placeholder="Organization" :value="old('organization')" autocomplete="organization" />
                        <x-jet-input-error for="organization" class="mt-2" />
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="email" class="font-bold" value="{{ __('Email *') }}" />
                        <x-jet-input id="email" class="block mt-2 w-full" type="text" name="email" placeholder="your@mail.com" :value="old('email')" required autocomplete="email" />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="phone" class="font-bold" value="{{ __('Phone') }}" />
                        <x-jet-input id="phone" class="block mt-2 w-2/4" type="tel" name="phone" placeholder="+11234567890" :value="old('phone')" pattern="[+]{1}[0-9]{11,14}" autocomplete="phone" />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>
                </x-slot>
                <x-slot name="actions">
                    <x-button class="bg-purple-500 hover:bg-purple-400">
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-form-section>
        </div>
        <div class="md:col-start-8 md:col-end-10 px-6 mt-5">
            <div class="py-2">
                dasfsdfdgf
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-single').select2();
        });
    </script>
    @endpush
</div>