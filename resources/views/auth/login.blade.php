@extends('layout.index')
@section('content')
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">

            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ul>
            </div>
            <!-- Page Breadcrumb End -->

        </div>
    </div>
</div>
<div class="contact-section my-5">
    <div class="container w-50 w-sm-100">
        <div>
            <h5 class="modal-title">Login</h5>
                        <p class="modal-description">Don't have an account yet? <a href="{{route('register')}}">Sign up for free</a></p>
        </div>
        <form action="{{route('login.process')}}" method="POST">
            @csrf
            <div class="row gy-5">
                <div class="col-md-12">
                    <div class="modal-form">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="modal-form">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="#" class="mb-2 w-100 text-end">Forgot Password?</a>
                    <div class="modal-form">
                        <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
