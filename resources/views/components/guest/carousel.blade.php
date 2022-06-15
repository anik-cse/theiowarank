<div class="h_r">
    <!-- SLIDER -->
    <div class="slideshow-container">
        <!-- SLIDER -->
        @foreach ($slides as $slide)
        <div class="mySlides fade">
            {{-- <div class="numbertext">1 / 8</div> --}}
            <a href="#"><img src="{{ $slide->getFirstMediaUrl('slider') }}" alt="">
            </a>
            <div class="text">{{ $slide->title }}</div>
        </div>
        @endforeach
        <!-- SLIDER NAVIGATION -->
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
</div>