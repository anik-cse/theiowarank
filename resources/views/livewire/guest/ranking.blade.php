<section class="ev-po">
    <div class="lp">
        <div class="row">
            <div class="col-md-6 eve-res">
                <div class="events ev-po-1 ev-po-com">
                    <div class="ev-po-title">
                        <h3>Latest OneWheel Races</h3>
                        <p>International One Wheel Association</p>
                    </div>
                    <table class="myTable">
                        <tbody>
                            {{-- <tr>
                                <th>#</th>
                                <th>Race</th>
                                <th class="e_h1">Place</th>
                                <th>Result</th>
                            </tr> --}}
                            @foreach($races as $key => $race)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{-- <img src="images/trends/3.jpg" alt=""> --}}
                                    <div class="">
                                        <h4>{{ $race->name  }}</h4><span>{{ date('d M Y', strtotime($race->events->end_date)) }}</span>
                                    </div>
                                </td>
                                <td class="e_h1">{{ $race->events->venue }}</td>
                                <td><a wire:click="getResult({{ $race->id }})" class="link-btn" style="cursor: pointer;">view result</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6 eve-res">
                <div class="events ev-po-2 ev-po-com">
                    <div class="ev-po-title ev-po-title-1">
                        <h3>{{ $race_results->name }}</h3>
                        <p>Top ten {{ $race_results->name }} {{ date('Y', strtotime($race_results->events->end_date)) }}</p>
                    </div>
                    <table class="myTable">
                        <tbody>
                            {{-- <tr>
                                <th>Rank</th>
                                <th>PLAYERS</th>
                                <th>W</th>
                                <th>L</th>
                                <th>D</th>
                                <th>PTS</th>
                            </tr> --}}
                            @foreach($race_results->results as $key => $result)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="images/coun/19.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>{{ $result->winnerinfo->first_name }} {{ $result->winnerinfo->last_name }}</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>