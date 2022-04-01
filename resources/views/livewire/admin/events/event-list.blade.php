<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="rounded shadow bg-white dark:bg-gray-800 dark:text-gray-900">
        <div class="w-full px-2 py-2 flex items-center justify-between">
            <h3 class="text-2xl font-bold dark:text-gray-100">Event List</h3>
            <a href="{{ route('admin.events.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">Add event</a>
        </div>

        <!-- event list Table -->
        <div class="mt-4">
            <div class="w-full overflow-hidden rounded-lg shadow">
                <div class="w-full overflow-x-auto">
                    <div class="flex justify-between items-center px-2">
                        <div class="flex space-x-2 items-center">
                          <p class="dark:text-white">Show</p>
                          <select class="border border-gray-300 py-1" wire:model.debounce.800ms="view">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                        </div>
                        <div>
                          <input wire:model.debounce.800ms="search" type="text" class="px-2 py-1 border border-gray-300 rounded focus:outline-none" placeholder="Search...">
                        </div>
                    </div>
                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Event name</th>
                            <th>Event location</th>
                            <th>Event type</th>
                            <th class="px-4 py-3" style="width: 20%">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" x-cloak>
                            @foreach ($events as $event)
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">{{ $event->name }}</td>
                                <td class="px-4 py-3 text-sm">{{ $event->city }}, {{ $event->region }}, {{ $event->iso }}</td>
                                <td class="px-4 py-3 text-sm">{{ $event->type }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('admin.events.show', $event->id) }}"  class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-1 px-2 border border-purple-500 rounded">show</a>
                                    <a href="{{ route('admin.events.edit', $event->id) }}"  class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">edit</a>
                                    <button  class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <!-- Pagination -->
                    {{ $events->links() }}
                </div>
            </div>
        </div>
        <!-- ./event list Table -->
    </div>
</div>