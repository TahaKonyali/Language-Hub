@extends('layout.index')
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contact us</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->
    <!-- Contact us Section Start -->
    <div class="contact-section">
        <div class="container custom-container">

            <!-- Contact Title Start -->
            <div class="contact-title text-center section-padding-02" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="contact-title__title">We're always eager to hear from you!</h2>
            </div>
            <!-- Contact Title End -->


            <!-- Contact Form Start -->
            <div class="contact-form section-padding-01">

                <!-- Section Title Start -->
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="section-title__title">Fill the form below so we can get to know you and your needs better.
                    </h2>
                </div>
                <!-- Section Title End -->

                <!-- Contact Form Wrapper Start -->
                <div class="contact-form__wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <form action="{{route('contact-query')}}" method="POST" class="row gy-4">
                        @csrf
                        <div class="col-md-6">
                            <div class="contact-form__input">
                                <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Your name" required>
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form__input">
                                <input class="form-control" name="email" value="{{old('email')}}" type="email" placeholder="Email" required>
                                @error('email')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-form__input">
                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                                @error('message')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-form__input text-center">
                                <button type="submit" class="btn btn-primary btn-hover-secondary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact Form Wrapper End -->

            </div>
            <!-- Contact Form End -->

        </div>
    </div>
@endsection
