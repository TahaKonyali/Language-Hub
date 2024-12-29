
@extends('layout.dashboard')
@section('content')
<div class="dashboard-content">

    <div class="container">
        <h4 class="dashboard-title">Settings</h4>

        <!-- Dashboard Settings Start -->
        <div class="dashboard-settings">


            <form action="{{route('update.profile')}}" method="POST">
                @csrf
                <div class="row gy-6">
                    <div class="col-lg-12">

                        <!-- Dashboard Settings Info Start -->
                        <div class="dashboard-content-box">

                            <h4 class="dashboard-content-box__title">Profile</h4>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <!-- Account Account details Start -->
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">First name</label>
                                        <input type="text" name="first_name" value="{{auth()->user()->first_name}}" class="form-control" required>
                                    </div>
                                    <!-- Account Account details End -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Account Account details Start -->
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Last name</label>
                                        <input type="text" name="last_name" value="{{auth()->user()->last_name}}" class="form-control" required>
                                    </div>
                                    <!-- Account Account details End -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Account Account details Start -->
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Email</label>
                                        <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control" readonly>
                                    </div>
                                    <!-- Account Account details End -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Account Account details Start -->
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Phone Number</label>
                                        <input type="text" name="phone_number" value="{{auth()->user()->phone_number}}" class="form-control" required>
                                    </div>
                                    <!-- Account Account details End -->
                                </div>
                                <div class="col-md-12">
                                    <!-- Account Account details Start -->
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Bio</label>
                                        <textarea class="form-control" name="bio">{{auth()->user()->bio}}</textarea>
                                    </div>
                                    <!-- Account Account details End -->
                                </div>
                            </div>

                        </div>
                        <!-- Dashboard Settings Info End -->

                    </div>
                </div>

                <div class="dashboard-settings__btn w-100 text-end">
                    <button class="btn btn-primary btn-hover-secondary">Update Profile</button>
                </div>
            </form>

        </div>
        <!-- Dashboard Settings End -->
    </div>


</div>
@endsection