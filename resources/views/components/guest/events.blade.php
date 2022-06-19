<div class="h_l">
    <!-- BRAND LOGO AND EVENT NAMES -->
    <img src="images/logo.png" alt="" />
    <h2>IOWA Ranking</h2>
    <p>Lorem ipsum dolor sit amet, cons ecte tuer adipiscing elit, sed diam non ummy nibh euismod tinc idunt ut laoreet dolore magna ali quam erat volutpat.</p>
    <ul>
        @foreach($events as $key => $event)
        <li><a><span>{{ $key+1 }}</span>{{ $event->name }}</a>
        </li>
        @endforeach
    </ul>
    <a class="aebtn" id="scrol_to_race">View All Events</a>
</div>