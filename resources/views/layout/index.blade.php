<!DOCTYPE html>
<html class="no-js" lang="en">

@include('layout.header')

<body>

    <main class="main-wrapper" id="app">

        <!-- Header start -->
     @include('layout.navbar')
        <!-- Header End -->

        @yield('content')
        <!-- Blog End -->

        <!-- Footer Start -->
        {{-- @include('layout.footer') --}}
        <!-- Footer End -->

        <!--Back To Start-->
        <button id="backBtn" class="back-to-top backBtn">
            <i class="arrow-top fas fa-arrow-up"></i>
            <i class="arrow-bottom fas fa-arrow-up"></i>
        </button>
        <!--Back To End-->


    </main>

    <!-- Vendors JS -->
    @include('layout.script')

</body>

</html>