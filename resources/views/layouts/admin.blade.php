@include('layouts.header')




<div class="adminwrapper">



    <nav id="sidebar" class=" sidebar-bg">
        <div class="sidebar-header">
            <h6 class="pt-3 ml-2">Network Academy </h6>
        </div>


        {{-- <ul class="list-unstyled components text-secondary">
            <li>
                <a href="dashboard.html"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="forms.html"><i class="fas fa-users"></i> All Registered Users</a>
            </li>
            <li>
                <a href="tables.html"><i class="fas fa-table"></i> Enrolled Users</a>
            </li>
            <li>
                <a href="charts.html"><i class="fas fa-user-graduate"></i>Admitted Students</a>
            </li>
            <li>
                <a href="charts.html"><i class="fas fa-user-graduate"></i>Attendance</a>
            </li>
            <li>
                <a href="charts.html"><i class="fas fa-user-graduate"></i>Follow Ups</a>
            </li>
            <li>
                <a href="charts.html"><i class="fas fa-user-graduate"></i>Courses Add</a>
            </li>

            <li>
                <a href="charts.html"><i class="fas fa-user-graduate"></i>Testimonials Add</a>
            </li>



        </ul> --}}
        <navigation-page> </navigation-page>


    </nav>






    <div id="navbar-body" class="">





        <!-- navbar navigation component -->
        <nav class="navbar navbar-expand-lg navbar-white navbar-bg">
            <button type="button" id="sidebarCollapse" class="btn btn-light" onclick="changeSidebar()">
                <i class="fas fa-bars"></i><span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <div class="admin-nav-dropdown">
                            <a href="#" id="nav1" class="nav-item nav-link dropdown-toggle"
                                style="color: rgba(211, 203, 203, 0.884);" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-link"></i> <span>Quick Links</span> <i style="font-size: .8em;"
                                    class="fas fa-caret-down"></i>
                            </a>


                            <div class="dropdown-menu dropdown-menu-first nav-link-menu" aria-labelledby="nav1">
                                <ul class="nav-list">
                                    <li><a href="" class="dropdown-item"><i class="fas fa-list"></i> Access Logs</a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="" class="dropdown-item"><i class="fas fa-database"></i> Back ups</a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="" class="dropdown-item"><i class="fas fa-cloud-download-alt"></i>
                                            Updates</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="" class="dropdown-item"><i class="fas fa-user-shield"></i> Roles</a>
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="admin-nav-dropdown">
                            <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle "
                                style="color: rgba(211, 203, 203, 0.884);" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <span>{{ Auth::user()->username }}</span> <i
                                    style="font-size: .8em;" class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                <ul class="nav-list">
                                    <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i>
                                            Profile</a>
                                    </li>
                                    <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Change
                                            Password</a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    {{-- <li><a href="" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a> --}}
                                    <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>

        </nav>






        <div class="content">
            <div class="container-fluid ">




                @yield('main-content')



            </div>





        </div>


        <div class="footer-bottom ">
            <h5>Copyright <?php echo date('Y'); ?> All rights reserved.</h5>
            <h6>Design and Developed by <a href="">aa</a></h6>
        </div>




    </div>



</div>


</section>


<!--
      Essential Scripts
      =====================================-->
<!-- Main jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


<!-- Form Validation -->
<script src="{{ asset('plugins/form-validation/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/form-validation/jquery.validate.min.js') }}"></script>

<!-- Bootstrap4 -->
{{-- <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script> --}}
<!-- Parallax -->
<script src="{{ asset('plugins/parallax/jquery.parallax-1.1.3.js') }}"></script>
<!-- lightbox -->
<script src="{{ asset('plugins/lightbox2/dist/js/lightbox.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<!-- filter -->
<script src="{{ asset('plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- Smooth Scroll js -->
<script src="{{ asset('plugins/smooth-scroll/smooth-scroll.min.js') }}"></script>

<!-- Custom js -->

<script>
    function changeSidebar() {
        var navbar_body = document.getElementById("navbar-body");
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("active");
        navbar_body.classList.toggle("active");
    }
</script>


<script src="{{ asset('js/script.js') }}"></script>

<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


<script src="{{ mix('/js/app.js') }}"></script>


</body>

</html>
