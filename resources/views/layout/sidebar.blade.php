<div class="dashboard-nav offcanvas offcanvas-start" id="offcanvasDashboard">

    <!-- Dashboard Nav Wrapper Start -->
    <div class="dashboard-nav__wrapper">
        <!-- Dashboard Nav Header Start -->
        <div class="offcanvas-header dashboard-nav__header dashboard-nav-header">

            <div class="dashboard-nav__toggle d-xl-none">
                <button class="toggle-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
            </div>

            <div class="dashboard-nav__logo">
                <a class="header-logo__logo" href="{{route('home')}}">Language Hub</a>
            </div>

        </div>
        <!-- Dashboard Nav Header End -->

        <!-- Dashboard Nav Content Start -->
        <div class="offcanvas-body dashboard-nav__content navScroll">

            <!-- Dashboard Nav Menu Start -->
            <div class="dashboard-nav__menu">
                <ul class="dashboard-nav__menu-list">
                    <li>
                        <a href="{{route('dashboard')}}">
                            <i class="edumi edumi-layers"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('translation')}}">
                            <i class="edumi edumi-question"></i>
                            <span class="text">Translations History</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('word-explorer')}}">
                            <i class="edumi edumi-support"></i>
                            <span class="text">Word Explorer</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('quiz')}}">
                            <i class="edumi edumi-help"></i>
                            <span class="text">My Quiz Attempts</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('settings')}}">
                            <i class="edumi edumi-settings"></i>
                            <span class="text">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}">
                            <i class="edumi edumi-sign-out"></i>
                            <span class="text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Dashboard Nav Menu End -->

        </div>
        <!-- Dashboard Nav Content End -->

        <div class="offcanvas-footer"></div>
    </div>
    <!-- Dashboard Nav Wrapper End -->

</div>