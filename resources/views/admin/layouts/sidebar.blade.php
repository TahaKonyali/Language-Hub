<nav class="page-sidebar" data-pages="sidebar">
    <div class="sidebar-header">
        {{-- <img src="{{ asset('assets/img/icap-logo-horizontal.png') }}" alt="logo" class="brand logo-rounded"
            width="78"> --}}
        <h2>Admin Panel</h2>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li class="m-t-20 ">
                <a href="{{ route('admin.main') }}">
                    <span class="title">Dashboard</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-icon">home</i></span>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}">
                    <span class="title">Users</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-icon">users</i></span>
            </li>
            
            <li>
                <a href="{{ route('admin.translation.index') }}">
                    <span class="title">Translations</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-icon">keyboard</i></span>
            </li>
            <li>
                <a href="{{ route('admin.quiz.index') }}">
                    <span class="title">Quiz</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-icon">lock</i></span>
            </li>
            <li>
                <a href="javascript:;"><span class="title">Word Explorer</span>
                    <span class=" arrow"></span></a>
                <span class="icon-thumbnail"><i class="pg-icon">image</i></span>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{route('admin.word-explorer.create')}}">Create Word</a>
                        <span class="icon-thumbnail"><i class="pg-icon">c</i></span>
                    </li>
                    <li class="">
                        <a href="{{route('admin.word-explorer.index')}}">View Words</a>
                        <span class="icon-thumbnail"><i class="pg-icon">v</i></span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><span class="title">Languages</span>
                    <span class=" arrow"></span></a>
                <span class="icon-thumbnail"><i class="pg-icon">globe</i></span>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{route('admin.language.create')}}">Create Language</a>
                        <span class="icon-thumbnail"><i class="pg-icon">c</i></span>
                    </li>
                    <li class="">
                        <a href="{{route('admin.language.index')}}">View Language</a>
                        <span class="icon-thumbnail"><i class="pg-icon">v</i></span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><span class="title">Categories</span>
                    <span class=" arrow"></span></a>
                <span class="icon-thumbnail"><i class="pg-icon">filter</i></span>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{route('admin.category.create')}}">Create Category</a>
                        <span class="icon-thumbnail"><i class="pg-icon">c</i></span>
                    </li>
                    <li class="">
                        <a href="{{route('admin.category.index')}}">View Categories</a>
                        <span class="icon-thumbnail"><i class="pg-icon">v</i></span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.contact-query.index') }}">
                    <span class="title">Contact Queries</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-icon">mail</i></span>
            </li>
            {{--<li>
                <a href="{{ route('admin.setting') }}">
                    <span class="title">Settings</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-icon">settings</i></span>
            </li> --}}
            <li>
                <a href="{{ route('admin.logout') }}">
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
