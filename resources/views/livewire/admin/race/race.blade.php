<div>
    {{-- Do your work, then step back. --}}
    <x-jet-label class="font-bold py-2" value="{{ __('Races') }}" />
    @foreach ($races as $race)
    <div class="py-3 md:px-2 cursor-pointer" wire:click="updateShowModal({{ $race->id }})">
        <p class="text-sm">{{ $race->name }}</p>
        <p class="text-xs font-bold">{{ $race->type_name }}, <{{ $race->length_name }}, {{ $race->class }} </p>
    </div>
    @endforeach
    <div class="py-2">
        <button class="shadow md:col-start-1 md:col-end-1 bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white py-2 px-4" wire:click="createShowModal">
            Add Race
        </button>
    </div>

     <!-- Add Item Modal -->
     <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Add Race') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="race_name" value="{{ __('Name *') }}" />
                <x-jet-input id="race_name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="name" />
                @error('name') <span class="text-red-400">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="type" class="font-bold" value="{{ __('Type *') }}" />
                <x-select class="block mt-2 w-full" wire:model.debounce.800ms="type">
                    <option value="0">Select a type</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>  
                    @endforeach
                </x-select>
            </div>
            <div class="mt-4">
                <x-jet-label for="type" class="font-bold" value="{{ __('Length *') }}" />
                <x-select class="block mt-2 w-full" wire:model.debounce.800ms="length">
                    <option value="0">Select a type</option>
                    @foreach ($lengths as $length)
                    <option value="{{ $length->id }}">>{{ $length->length }}</option>  
                    @endforeach
                </x-select>
            </div>
            <div class="mt-4">
                <x-jet-label for="class" class="font-bold" value="{{ __('Class') }}" />
                <x-select class="block mt-2 w-full" wire:model.debounce.800ms="class">
                    <option value="0">Select class</option>
                    <option value="Male">Male</option>  
                    <option value="Female">Female</option>  
                    <option value="Others">Others</option>  
                </x-select>
            </div>
            <div class="mt-4" wire:ignore>
                <x-jet-label for="event" class="font-bold" value="{{ __('Event') }}" />
                <x-select class="block mt-2 w-full" wire:model.debounce.800ms="event" id="event" style="width: 100%">
                    <option value="0">Select event</option>
                    @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>  
                    @endforeach
                </x-select>
                @error('event') <span class="text-red-400">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="race_name" value="{{ __('Notes') }}" />
                <textarea
                class="
                  form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                "
                id="exampleFormControlTextarea1"
                rows="3"
                wire:model.debounce.800ms="notes"
              ></textarea>
          
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
            $('#event').select2();
            $('#event').on('change', function (e) {
                var event = $('#event').select2("val");
                @this.set('event', event);
            });
        });
    </script>
    @endpush
</div>
