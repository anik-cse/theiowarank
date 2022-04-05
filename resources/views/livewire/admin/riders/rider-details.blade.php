<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="mt-4">
        <div class="w-full overflow-hidden rounded-lg shadow">
            <div class="w-full overflow-x-auto">
                <div class="flex p-5">
                    <table class="table-auto border-separate my-table-spacing w-full text-left">
                        <thead>
                          <tr>
                            <th>Rider name</th>
                            <th class="pl-4">Home egion</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4">
                                    <p class="text-sm">{{ $this->rider->first_name }} {{ $this->rider->last_name }}</p>
                                </td>
                                <td class="py-4 pl-4">
                                    <p class="text-xs font-bold">{{ $this->rider->home_region }}</p>
                                </td>
                              </tr>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
