@extends('layout.index')
@section('content')
        <!-- Slider Section Start -->
        <div class="slider-section slider-section-05" style="background-image: url(assets/images/home-language-academic-hero-bg.jpg);">
            <div class="container">

                <!-- Slider Caption Start -->
                <div class="slider-caption-05 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="slider-caption-05__main-title">Innovative <br> <span>Language Academic</span></h2>
                    <p>Learning New Languages, Connect To The World</p>
                    <div class="slider-caption-05__btn">
                        <a href="{{route('register')}}" class="btn btn-primary btn-hover-secondary">Sign Up Now</a>
                    </div>
                </div>
                <!-- Slider Caption End -->

            </div>
        </div>
        <!-- Slider Section End -->

    
@endsection