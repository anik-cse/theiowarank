<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
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
        <div class="md:col-start-1 md:col-end-4 px-6">
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
        <div class="md:col-start-4 md:col-end-8 px-6 border-l-4 border-slate-900">
            <x-form-section submit="">
                <x-slot name="form">
                    <div class="col-span-12 sm:col-span-12 py-4">
                        <x-jet-label for="name" class="font-bold" value="{{ __('Name *') }}" />
                        <x-jet-input id="name" class="block mt-2 w-full" type="text" name="name" placeholder="Name" :value="old('name')" required autocomplete="name" />
                        <x-jet-input-error for="name" class="mt-2" />
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

                        <x-jet-input id="region" class="block mt-2 w-full" type="text" name="region" placeholder="City" :value="old('region')" required autocomplete="region" />
                        <x-jet-input-error for="region" class="mt-2" />

                        <x-jet-input id="post_code" class="block mt-2 w-full" type="text" name="post_code" placeholder="Post Code" :value="old('post_code')" required autocomplete="post_code" />
                        <x-jet-input-error for="post_code" class="mt-2" />

                        <x-jet-input id="city" class="block mt-2 w-full" type="month" name="city" placeholder="City" :value="old('city')" required autocomplete="city" />
                        <x-jet-input-error for="city" class="mt-2" />
                    </div>
                </x-slot>
            </x-form-section>
        </div>
        <div class="md:col-start-8 md:col-end-10 px-6">sdfgfg</div>
    </div>
</div>
