@include('layouts.header')




<div class="adminwrapper">



    <nav id="sidebar" class=" sidebar-bg">
        <div class="sidebar-header">
           <a href="/" target="_blank"> <h6 class="pt-3 ml-2" style="color:#fff">Network Academy </h6></a>
        </div>

        <navigation-page> </navigation-page>


    </nav>






    <div id="navbar-body" class="">

{{-- <!-- Example single danger button -->
<div class="btn-group ml-auto ">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i> <span>{{ Auth::user()->username }}</span> <i
        style="font-size: .8em;" ></i>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#"><i class="fas fa-address-card fa-fw"></i>Profile</a>
      <a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Change Password</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Logout</a>
    </div>
  </div> --}}



        <!-- navbar navigation component -->
        <nav class="navbar navbar-expand-lg navbar-white navbar-bg">
            <button type="button" id="sidebarCollapse" class="btn btn-light" onclick="changeSidebar()">
                <i class="fas fa-bars"></i><span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="nav navbar-nav ml-auto">

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
