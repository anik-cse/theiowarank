<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="rounded shadow bg-white dark:bg-gray-800 dark:text-gray-900">
        <div class="w-full px-2 py-2 flex items-center justify-between">
            <h3 class="text-2xl font-bold dark:text-gray-100">Rider List</h3>
            <a href="{{ route('admin.riders.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">Add rider</a>
        </div>

        <!-- rider list Table -->
        <div class="mt-4">
            <div class="w-full overflow-hidden rounded-lg shadow">
                <div class="w-full overflow-x-auto">
                    <div class="flex justify-between items-center px-2 py-2">
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
                    <table class="table-fixed w-full dark:text-gray-400">
                        <thead class="border-b-2">
                            <th class="px-4 py-3" width="20%">
                              <div class="flex space-x-2">
                                <span>
                                  Name
                                </span>
                                </span>
                                <div class="flex flex-col">
                                  <svg wire:click="sortBy('first_name', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current {{ $this->sortby == 'first_name' && $this->orderby == 'asc' ? 'text-blue-500' : ''}}"><path d="M5 15l7-7 7 7"></path></svg>
                                  <svg wire:click="sortBy('first_name', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current {{ $this->sortby == 'first_name' && $this->orderby == 'desc' ? 'text-blue-500' : ''}}"><path d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                              </div>
                            </th>
                            <th width="20%">
                              <div class="flex items-center space-x-2">
                                <span class="">
                                    Ranking
                                </span>
                                <div class="flex flex-col">
                                    <svg wire:click="sortBy('ranking', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current {{ $this->sortby == 'ranking' && $this->orderby == 'asc' ? 'text-blue-500' : ''}}"><path d="M5 15l7-7 7 7"></path></svg>
                                    <svg wire:click="sortBy('ranking', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current {{ $this->sortby == 'ranking' && $this->orderby == 'desc' ? 'text-blue-500' : ''}}"><path d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                              </div>
                            </th>
                            <th width="20%">
                              <div class="flex items-center space-x-2">
                                <span class="">
                                    Region
                                </span>
                                <div class="flex flex-col">
                                    <svg wire:click="sortBy('home_region', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current {{ $this->sortby == 'home_region' && $this->orderby == 'asc' ? 'text-blue-500' : ''}}"><path d="M5 15l7-7 7 7"></path></svg>
                                    <svg wire:click="sortBy('home_region', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current {{ $this->sortby == 'home_region' && $this->orderby == 'desc' ? 'text-blue-500' : ''}}"><path d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                              </div>
                            </th>
                            <th width="20%">
                              <div class="flex items-center space-x-2">
                                <span>
                                    Team
                                </span>
                                <div class="flex flex-col">
                                    <svg wire:click="sortBy('team', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current {{ $this->sortby == 'team' && $this->orderby == 'asc' ? 'text-blue-500' : ''}}"><path d="M5 15l7-7 7 7"></path></svg>
                                    <svg wire:click="sortBy('team', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current {{ $this->sortby == 'team' && $this->orderby == 'desc' ? 'text-blue-500' : ''}}"><path d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                              </div>
                            </th>
                            <th width="20%">Action</th>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" x-cloak>
                            @forelse ($riders as $rider)
                            <tr class="hover:bg-gray-200 text-gray-900 dark:text-gray-400 text-xs">
                                <td class="py-3 px-4">
                                    {{ $rider->first_name }} {{ $rider->last_name }}
                                </td>
                                <td class="py-3">
                                    
                                </td>
                                <td class="py-3">
                                    {{ $rider->home_region }}
                                </td>
                                <td class="py-3">
                                    {{ $rider->team }}
                                </td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('admin.riders.detail', $rider->id) }}"  class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-1 px-2 border border-purple-500 rounded">show</a>
                                    <a href="{{ route('admin.riders.edit', $rider->id) }}"  class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">edit</a>
                                    <button wire:click="deleteConfirm({{ $rider->id }})"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-3 text-gray-900 text-sm">No records found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <!-- Pagination -->
                    {{ $riders->links() }}
                </div>
            </div>
        </div>
        <!-- ./rider list Table -->
    </div>
</div>