<x-guest-layout>
  {{-- <x-guest.carousel />
  <div class="bg-red-500 h-10"></div>
  @livewire('guest.riders-table') --}}


    <!--SECTION: HEADER AND BANNER-->
    <section>
        <div class="home">
            <x-guest.events />
            <x-guest.carousel />
        </div>
    </section>  
    <!--SECTION: UPCOMING SPORTS EVENTS-->
    {{-- <x-guest.latest-event /> --}}
    <!--SECTION: CHAMPIONS LEAGUE-->
    <x-guest.last-event />
    <!--SECTION: EVENTS AND POINTS-->
    @livewire('guest.ranking')

    @push('scripts')
        <script>
            $("#scrol_to_race").click(function() {
                $('html, body').animate({
                    scrollTop: $("#race_div").offset().top
                }, 2000);
            });
            $("#sideBarEvent").click(function() {
                $('html, body').animate({
                    scrollTop: $("#race_div").offset().top
                }, 2000);
            });
            $("#sideBarRanking").click(function() {
                $('html, body').animate({
                    scrollTop: $("#race_div").offset().top
                }, 2000);
            });
            $("#viewRank").click(function() {
                $('html, body').animate({
                    scrollTop: $("#race_div").offset().top
                }, 2000);
            });
        </script>
    @endpush
</x-guest-layout>