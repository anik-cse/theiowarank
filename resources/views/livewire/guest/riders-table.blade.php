{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<div class="relative">
    <div class="bg-gray-200 py-24 min-h-screen">
      <div class="container mx-auto w-full h-full">
        <div class="max-w-screen-lg mx-auto w-full h-full flex flex-col items-center justify-center">
          <div class="bg-white p-5 shadow-md w-full flex flex-col">
            <div class="flex justify-between items-center">
              <div class="flex space-x-2 items-center">
                <p>Show</p>
                <select class="border border-gray-300 py-1" wire:model.debounce.800ms="view">
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </div>
              <div>
                <input wire:model.debounce.800ms="search" type="text" class="px-2 py-1 border rounded focus:outline-none" placeholder="Search...">
              </div>
            </div>
            <table class="mt-5">
              <thead class="border-b-2">
                <th width="20%">
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
              </thead>
              <tbody>
                @forelse ($riders as $rider)
                <tr class="hover:bg-gray-200 text-gray-900 text-xs">
                    <td class="py-3">
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
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-3 text-gray-900 text-sm">No records found.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="flex mt-5">
              {{ $riders->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

