@extends('layouts.frontLayout')

@section('promo')
    <section>
        <div class="carousel">
            <div class="owl-carousel owl-theme container" >
                <img width="100%" height="600px" src="{{asset('images/slide/slide1.jpg')}}" alt="slide1">
                <img width="100%" height="600px" src="{{asset('images/slide/slide2.jpg')}}" alt="slide2">
                <img width="100%" height="600px" src="{{asset('images/slide/slide3.jpg')}}" alt="slide3">
                <img width="100%" height="600px" src="{{asset('images/slide/slide4.png')}}" alt="slide4">
                <img width="100%" height="600px" src="{{asset('images/slide/slide5.jpg')}}" alt="slide5">
                <img width="100%" height="600px" src="{{asset('images/slide/slide6.jpg')}}" alt="slide6">
                <img width="100%" height="600px" src="{{asset('images/slide/slide7.jpg')}}" alt="slide7">
                <img width="100%" height="600px" src="{{asset('images/slide/slide8.jpg')}}" alt="slide8">
            </div>
        </div>

    </section>

    @endsection

@push('scripts')

    <script !src="">
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                'items':1,
                'loop':true,
                'autoplay':true,
                'autoplayTimeout':5000,
                'autoplayHoverPause':true
            });
        });
    </script>

@endpush
