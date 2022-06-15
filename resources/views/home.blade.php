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
    <x-guest.latest-event />
    <!--SECTION: CHAMPIONS LEAGUE-->
    <x-guest.last-event />
    <!--SECTION: EVENTS AND POINTS-->
    @livewire('guest.ranking')

</x-guest-layout>