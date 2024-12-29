@extends('layout.index')
@section('content')
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sign Up</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <div class="contact-section my-5">
        <div class="container w-50 w-sm-100">
            <div>
                <h5 class="modal-title">Sign Up</h5>
                <p class="modal-description">Already have an account? <a href="{{ route('login') }}" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Log in</a></p>
            </div>
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="row gy-5">
                    <div class="col-md-6">
                        <div class="modal-form">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                value="{{ old('first_name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal-form">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                value="{{ old('last_name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="modal-form">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Your Email"
                                value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal-form">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal-form">
                            <label class="form-label">Re-Enter Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Re-Enter Password" required>
                        </div>
                    </div>


                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="col-md-12">
                        <div class="modal-form">
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
