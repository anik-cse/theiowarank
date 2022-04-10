<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<main>
    @section('css')
        <link rel="stylesheet" href="{{ mix('css/swiper.css') }}">
        <link rel="stylesheet" href="{{ mix('css/slider.css') }}">
        <link rel="stylesheet" href="{{ mix('css/animate.css') }}">
    @endsection
    <!-- Slider START -->
    <div class="swiper-main-slider-fade swiper-container">
        <div class="swiper-wrapper">
            <!-- Slide Start -->
            @foreach ($slides as $slide)
            <div class="swiper-slide slider-1">
                <div class="container">
                    <div class="slider-content left-holder">
                        <div class="grid md:grid-cols-12">
                            <div class="md:col-start-1 md:col-end-7">
                                <h2 class="animated fadeInDown mt-auto">
                                    {{ $slide->title }}
                                </h2>
                                <p class="animated fadeInDown slider-description">
                                    {{ $slide->sort_description }}
                                </p>
                                <div class="animated fadeInUp">
                                    <a href="{{ route('guest.slider.details', $slide->slug) }}" class="dark-button button-md">Learn More</a>
                                </div>
                            </div>
                            <div class="md:col-start-7 md:col-end-12 mb-50">
                                <p class="animated {{ $slide->css_class }}">
                                    <img src="{{ $slide->getFirstMediaUrl('slider') }}" alt="Corporate Internet" class="w-100">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Slide End -->


        </div>
        <!-- Add Arrows -->
        {{-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> --}}
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <!-- Slider END -->
    @push('scripts')
    <script src="{{ mix('js/swiper.js') }}"></script>
    <script src="{{ mix('js/slider.js') }}"></script>
    @endpush
</main>