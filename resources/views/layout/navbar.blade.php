<div class="header-section header-sticky">

    <!-- Header Top Start -->
    {{-- <div class="header-top">
        <div class="container">

            <!-- Header Top Bar Wrapper Start -->
            <div class="header-top-bar-wrap">
                <div class="header-top-bar-wrap__text text-center">
                    <p>Keep learning with free resources during <strong>COVID-19.</strong> <a href="#">Learn more</a></p>
                </div>
            </div>
            <!-- Header Top Bar Wrapper End -->

        </div>
    </div> --}}
    <!-- Header Top End -->

    <!-- Header Main Start -->
    <div class="header-main">
        <div class="container position-relative">

            <div class="row align-items-center">
                <div class="col-xl-3 col-6">
                    <!-- Header Logo Start -->
                    <div class="header-logo">
                        <a class="header-logo__logo" href="{{route('home')}}">Language Hub</a>
                    </div>
                    <!-- Header Logo End -->
                </div>
                <div class="col-xl-6 d-none d-xl-block">
                    <!-- Header Navigation Start -->
                    <div class="header-navigation">
                        <nav class="menu-primary">
                            <ul class="menu-primary__container justify-content-center">
                                <li>
                                    <a class="{{request()->is('/') ? 'active' : ''}}" href="{{route('home')}}"><span>Home</span></a>
                                </li>
                            
                                <li>
                                    <a class="{{request()->is('contact-us') ? 'active' : ''}}" href="{{route('contact-us')}}"><span>Contact us</span></a>
                                </li>
                                {{-- <li>
                                    <a href="#"><span>Courses</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="course-grid-01.html"><span>Grid Basic Layout</span></a></li>
                                        <li><a href="course-grid-02.html"><span>Grid Modern Layout</span></a></li>
                                        <li><a href="course-grid-left-sidebar.html"><span>Grid Left Sidebar</span></a></li>
                                        <li><a href="course-grid-right-sidebar.html"><span>Grid Right Sidebar</span></a></li>
                                        <li><a href="course-list.html"><span>List Basic Layout</span></a></li>
                                        <li><a href="course-list-left-sidebar.html"><span>List Left Sidebar</span></a></li>
                                        <li><a href="course-list-right-sidebar.html"><span>List Right Sidebar</span></a></li>
                                        <li><a href="course-category.html"><span>Category Page</span></a></li>
                                        <li>
                                            <a href="#"><span>Single Layout</span></a>
                                            <ul class="sub-menu">
                                                <li><a href="course-single-layout-01.html"><span>Layout 01</span></a></li>
                                                <li><a href="course-single-layout-02.html"><span>Layout 02</span></a></li>
                                                <li><a href="course-single-layout-03.html"><span>Layout 03</span></a></li>
                                                <li><a href="course-single-layout-04.html"><span>Layout 04</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Navigation End -->
                </div>
                <div class="col-xl-3 col-6">
                    <!-- Header Inner Start -->
                    <div class="header-inner">

                        
                        <!-- Header User Button Start -->
                        <div class="header-user d-none d-lg-flex">
                            @if(auth()->user())
                            <div class="header-user__button">
                                <a href="{{route('dashboard')}}" class="header-user__signup-02 btn btn-secondary btn-hover-white">Dashboard</a>
                            </div>
                        @else
                            <div class="header-user__button">
                                <a href="{{route('login')}}" class="header-user__login">Log In</a>
                            </div>
                            <div class="header-user__button">
                                <a href="{{route('register')}}" class="header-user__signup-02 btn btn-secondary btn-hover-white">Sign Up</a>
                            </div>
                            
                        @endif
                        </div>
                        <!-- Header User Button End -->

                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle">
                            <button class="header-toggle__btn header-toggle__btn-02 d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileMenu">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                        </div>
                        <!-- Header Mobile Toggle End -->

                    </div>
                    <!-- Header Inner End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Header Main End -->

    <div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu" style="background-image: url(assets/images/mobile-bg.jpg);">
        <div class="offcanvas-header bg-white">
            <div class="offcanvas-logo">
            <a class="header-logo__logo" href="{{route('home')}}">Language Hub</a>
           </div>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
        </div>

        <div class="offcanvas-body">
            <nav class="canvas-menu">
                <ul class="offcanvas-menu">
                    <li>
                        <a class="active" href="{{route('home')}}"><span>Home</span></a>
                    </li>
               
                    <li>
                        <a href="{{route('contact-us')}}"><span>Contact us</span></a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Header User Button Start -->
        <div class="offcanvas-user d-lg-none">
            <div class="offcanvas-user__button">
                <button class="offcanvas-user__login btn btn-secondary btn-hover-secondarys" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
            </div>
            <div class="offcanvas-user__button">
                <button class="offcanvas-user__signup btn btn-primary btn-hover-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</button>
            </div>
        </div>
        <!-- Header User Button End -->

    </div>

</div>