<div class="py-10 px-4">
    <div class="rounded shadow bg-white dark:bg-gray-800 dark:text-gray-900">
        <div class="w-full px-2 py-2 flex items-center justify-between">
            <h3 class="text-2xl font-bold dark:text-gray-100">Event Types</h3>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded" wire:click="createShowModal">Add Type</button>
        </div>  
        {{-- Do your work, then step back. --}}
        <!-- Event Type Table -->
        <div class="mt-4">
            <div class="w-full overflow-hidden rounded-lg shadow">
                <div class="w-full overflow-x-auto">
                <table class="table-fixed w-full">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="w-2/8 px-4 py-3">Event Type</th>
                        <th class="w-1/6 px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($types as $type)
                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <p class="font-semibold">{{ $type->name }}</p>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <button wire:click="updateShowModal({{ $type->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">Edit</button>
                            <button wire:click="deleteConfirm({{ $type->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <!-- Pagination -->
                {{ $types->links() }}
                </div>
            </div>
        </div>
        <!-- ./Event Type Table -->
    </div>

     <!-- Add Item Modal -->
     <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Type') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Type') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="name" />
                @error('name') <span class="text-red-400">{{ $message }}</span> @enderror
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
</div>