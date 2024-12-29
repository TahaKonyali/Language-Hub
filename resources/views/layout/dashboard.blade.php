<!DOCTYPE html>
<html class="no-js" lang="en">

@include('layout.header')

<body class="dashboard-page dashboard-nav-fixed">

    <!-- Dashboard Nav Start -->
    @include('layout.sidebar')
    <!-- Dashboard Nav End -->

    <!-- Dashboard Main Wrapper Start -->
    <main class="dashboard-main-wrapper" id="app">

        @yield('content')


    </main>
    <!-- Dashboard Main Wrapper End -->

    @include('layout.script')


</body>

</html>
