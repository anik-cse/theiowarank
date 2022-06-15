<section>
    @if($last_event->races()->exists())
    <div class="uc">
        <div class="lp uc1">
            <div class="row">
                <div class="hom-tick-book">
                   
                    <h2>{{ $last_event->races->last()->name }}, {{ date('Y', strtotime($last_event->end_date)) }}</h2>

                    <div class="hom-tick">
                        <div class="hom-tick-1">
                            <h3>{{ date('d M Y', strtotime($last_event->end_date)) }}</h3>
                        </div>
                        <div class="hom-tick-2">
                            <span class="hom-tick-21">{{ $last_event->races->last()->notes }}</span>
                        </div>
                    </div>
                    
                    <a href="soccer.html" class="hvr-sweep-to-right">Ticket Booking</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>