<x-guest-layout>
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/htag.css') }}">
    @endsection

    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <div class="relative overflow-hidden min-h-screen">
        <div class="ck-content container py-10 md:mx-auto px-8 md:px-auto">
            {!! $details->long_description !!}
        </div>
    </div>
</x-guest-layout>