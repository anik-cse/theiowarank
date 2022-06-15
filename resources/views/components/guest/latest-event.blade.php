<section>
    <div class="se lp">
        <div class="row">
            <!-- TITLE -->
            <div class="spe-title-1">
                <h2>Upcoming <span>Sports Events</span> in this month</h2>
                <div class="hom-tit">
                    <div class="hom-tit-1"></div>
                    <div class="hom-tit-2"></div>
                    <div class="hom-tit-3"></div>
                </div>
                <p>Feel the thrill of seeing a global sporting event in one of the world's most incredible cities. Headlining the calendar is the Dubai World Cup</p>
            </div>
            <!-- LEFT SIDE: SPORTS EVENTS -->
            <div class="event-left col-md-9">
                <!--Sports Events in Dubai-->
                <ul>
                    @foreach($events as $key => $event)
                        <!-- SPORTS EVENT:1 -->
                    <li>
                        <div class="el-img">
                            <img class="img-responsive" src="images/event/e1.jpg" alt="">
                        </div>
                        <div class="el-con">
                            <span>{{ date('d M Y', strtotime($event->start_date)) }} - {{ date('d M Y', strtotime($event->end_date)) }}</span>
                            <h3>{{ $event->name }}</h3>
                            <p class="bold"><i class="fa fa-map-marker"></i> {{ $event->venue }}.</p>
                            <a href="soccer.html">Read More</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- RIGHT SIDE: FEATURE EVENTS -->
            <div class="event-right col-md-3">
                <ul>
                    <li class="event-right-bg-1">
                        <h4>Socceroos vs United Arab Emirates</h4>
                        <p>The indoor sports mania is back again offering all sorts of indoor</p>
                        <a href="#">View More</a>
                    </li>
                    <li class="event-right-bg-2">
                        <h4>The Championships</h4>
                        <p>The indoor sports mania is back again offering all sorts of indoor</p>
                        <a href="#">View More</a>
                    </li>
                    <li class="event-right-bg-3 pad-red-bot-0">
                        <h4>The Triathlon Series Race Five Kurnell</h4>
                        <p>The indoor sports mania is back again offering all sorts of indoor</p>
                        <a href="#">View More</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>