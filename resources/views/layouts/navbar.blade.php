<!--
Fixed Navigation
==================================== -->
<header class="navigation fixed-top ">

    <form action="" method="GET">

        <div class="container-fluid px-3">
            <!-- main nav -->
            <nav class="navbar navbar-expand-lg navbar-light  " id="">
                <!-- logo -->
                <a class="navbar-brand logo" href="/">
                    <img class="logo-default" src="/images/logo-final.png" alt="logo" style="width: 60%;" />
                    <img class="logo-white" src="/images/logo-final.png" alt="logo" style="width: 70%;" />
                </a>
                <!-- /logo -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navigation">



                    {{-- <div class="home-search-bar">
                        <div class="input-group w-100 mt-2 ">
                            <input class="form-control py-2 rounded-pill mr-1 " type="search"
                                placeholder="search for courses" name="query" id="query">
                            <span class="input-group-append serach-icon-home">
                                <button class="btn rounded-pill border-0 ml-n5" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div> --}}
                    <search-courses></search-courses>



                    <ul class="navbar-nav me-auto ml-auto font-weight-bold ">


                        <li class="nav-item ">
                            <a class="nav-link" href="/courses/0">Courses</a>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" href="/verify-certificate-page">Verify Certificate</a>
                        </li>
                        {{-- <li class="nav-item ">
                <a class="nav-link" href="/login">Login</a>
              </li> --}}


                    </ul>
                </div>
            </nav>
            <!-- /main nav -->


        </div>
    </form>
</header>
<!--
  End Fixed Navigation
  ==================================== -->
