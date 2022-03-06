<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    @section('css')
    <link rel="stylesheet" href="{{ mix('css/select2.tailwind.css') }}">
    <style>
    </style>
    @endsection
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex">
        <h2 class="text-3xl font-bold dark:text-gray-200">riders</h2>
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
                    <th>Rider</th>
                    <th class="pl-4 text-center">Rank</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="py-4">
                        <p class="text-sm">Float Life Feast(2020)</p>
                        <p class="text-xs font-bold">Austin, TX, US</p>
                    </td>
                    <td class="py-4 pl-4 text-center">
                        <p class="text-sm">23</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-4">
                        <p class="text-sm">Float Life Feast(2020)</p>
                        <p class="text-xs font-bold">Austin, TX, US</p>
                    </td>
                    <td class="py-4 pl-4 text-center">
                        <p class="text-sm">23</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-4">
                        <p class="text-sm">Float Life Feast(2020)</p>
                        <p class="text-xs font-bold">Austin, TX, US</p>
                    </td>
                    <td class="py-4 pl-4 text-center">
                        <p class="text-sm">23</p>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="md:col-start-4 md:col-end-8 md:px-6 md:border-l-4 md:border-slate-900">
            <div class="h-6 px-4 text-2xl md:text-3xl font-bold dark:text-gray-200">
                <span>Float Life Fest (2019)</span>
            </div>
            <x-form-section submit="">
                <x-slot name="form">
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="first_name" class="font-bold" value="{{ __('First Name *') }}" />
                        <x-jet-input id="first_name" class="block mt-2 w-full" type="text" name="first_name" placeholder="First Name" :value="old('first_name')" required autocomplete="first_name" />
                        <x-jet-input-error for="first_name" class="mt-2" />
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="last_name" class="font-bold" value="{{ __('Last Name *') }}" />
                        <x-jet-input id="last_name" class="block mt-2 w-full" type="text" name="last_name" placeholder="Last Name" :value="old('last_name')" required autocomplete="last_name" />
                        <x-jet-input-error for="last_name" class="mt-2" />
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="home_region" class="font-bold" value="{{ __('Home Region *') }}" />
                        <x-jet-input id="home_region" class="block mt-2 w-full" type="text" name="home_region" placeholder="Home Region" :value="old('home_region')" required autocomplete="home_region" />
                        <x-jet-input-error for="home_region" class="mt-2" />
                    </div>
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="type" class="font-bold" value="{{ __('Type') }}" />
                        <x-select class="block mt-2 w-full" name="type">
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
                    <div class="col-span-12 sm:col-span-12 py-1">
                        <x-jet-label for="start_date" class="font-bold" value="{{ __('Birthdate *') }}" />
                        <div class="flex flex-wrap mb-2 mt-2">
                            <div class="w-full md:w-1/4 mb-6 md:mb-0">
                                <x-jet-input id="date" class="block mt-2 w-full" type="text" name="date" placeholder="01" :value="old('date')" required autocomplete="date" />
                            </div>
                            <div class="w-full md:w-2/4 mt-2 md:px-2 mb-6 md:mb-0">
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
                            <div class="w-full md:w-1/4 mb-6 md:mb-0">
                                <x-jet-input id="year" class="block mt-2 w-full" type="text" name="year" placeholder="2022" :value="old('year')" required autocomplete="year" />
                            </div>
                        </div>
                    </div>
                </x-slot>
                <x-slot name="actions">
                    <x-button class="bg-purple-500 hover:bg-purple-400">
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-form-section>
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