<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="mt-4">
        <div class="w-full overflow-hidden rounded-lg shadow">
            <div class="w-full overflow-x-auto">
                <div class="flex p-5">
                    <table class="table-auto border-separate my-table-spacing w-full text-left">
                        <thead>
                          <tr>
                            <th>Event name</th>
                            <th class="pl-4">Location (address)</th>
                            <th class="pl-4">Start date</th>
                            <th class="pl-4">End date</th>
                            <th class="pl-4">Organiser name</th>
                            <th class="pl-4">Professional or amateur</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4">
                                    <p class="text-sm">{{ $event->name }}</p>
                                </td>
                                <td class="py-4 pl-4">
                                    <p class="text-xs font-bold">{{ $event->city }}, {{ $event->region }}, {{ $event->country_info->name }}</p>
                                </td>
                                <td class="py-4 pl-4">
                                    <p class="text-sm">{{ \Carbon\Carbon::parse($event->start_date)->format('l jS \of F Y') }}</p>
                                </td>
                                <td class="py-4 pl-4">
                                    <p class="text-sm">{{ \Carbon\Carbon::parse($event->end_date)->format('l jS \of F Y') }}</p>
                                </td>
                                <td class="py-4 pl-4">
                                    <p class="text-sm">{{ $event->organization }}</p>
                                </td>
                                <td class="py-4 pl-4">
                                    <p class="text-sm">{{ $event->type_info->name }}</p>
                                </td>
                              </tr>  
                        </tbody>
                    </table>
                </div>

                <div class="flex p-5">
                    <table class="table-auto border-separate my-table-spacing w-full text-left">
                        <tbody>
                            @foreach ($event->races as $race)
                            <tr class="pt-10">
                                <th>Race name</th>
                                <th class="pl-4">Race type</th>
                                <th class="pl-4">Race length</th>
                            </tr>
                            <tr>
                                <td class="py-4">
                                    <p class="text-sm">{{ $race->name }}</p>
                                </td>
                                <td class="py-4 pl-4">
                                    <p class="text-sm">{{ $race->race_type->type_name }}</p>
                                </td>
                                <td class="py-4 pl-4">
                                    <p class="text-xs font-bold">{{ $race->race_length->length }}</p>
                                </td>
                              </tr>
                              <tr>
                                <th>Winner name</th>
                                <th class="pl-4">position</th>
                              </tr>
                              @foreach ($race->results as $result)
                                <tr>
                                    <td class="py-4">
                                        <p class="text-sm">{{ $result->winnerinfo->first_name }} {{ $result->winnerinfo->last_name }}</p>
                                    </td>
                                    <td class="py-4 pl-4">
                                        <p class="text-sm">{{ $result->place }}</p>
                                    </td>
                                </tr>  
                              @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
