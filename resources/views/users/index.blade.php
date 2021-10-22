@extends('layouts.main')

@section('main-content')




    <!--
        Welcome Slider
        ==================================== -->

    <section class="hero-area shadow-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="block ">
                        <h1 class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">Routing You <br> To <span
                                class="success-custom">Success </span></h1>
                        {{-- <p class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Nulla, ad rerum repellat. Sequi, labore, illo. Ducimus voluptates quidem obcaecati, ad.
                    </p> --}}
                        <ul class="list-inline wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".7s">
                            <li class="list-inline-item">
                                <a data-scroll href="#why-network-academy" class="btn btn-main">Explore Us</a>
                            </li>
                            <li class="list-inline-item">
                                <a data-scroll a href="tel:+91 9747 51 2223"
                                    class="btn btn-transparent btn-outline-dark">Call Now</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Start courses area-->

<user-index-courses> </user-index-courses>

<!-- end courses area-->



<!-- enquiry modal area-->

<div
class="modal fade"
id="enquireModal"
tabindex="-1"
role="dialog"
aria-labelledby="exampleModalLabel4"
aria-hidden="true"
>
<div
  class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg"
  role="document"
>
  <div class="modal-content">


<enquiry-form > </enquiry-form>




</div>
</div>
</div>


<!-- enquiry modal  ends -->

    <!-- Start category Section
          ==================================== -->


<user-index-categories> </user-index-categories>



   <!-- category Section ends
          ==================================== -->

    <!--
        Start About Section
        ==================================== -->
    <section class="service-2 section" id="why-network-academy">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <!-- section title -->
                    <div class="title text-center">
                        <h2>Why Network Academy</h2>



                        <p class="p-100"><b>Network Academy Mankavu, Calicut</b> is a premier educational
                            institution with an innovative effort keeping in view of this new demand of the hi-tech new age,
                            delivering information and communication technology skills in its precise and relevant formats.
                            Network Academy’s proven track of quality end academic training program has been noted for its
                            highly-qualified faculty, career oriented training system and the best infrastructure in the
                            field of computer networking and software imparting premium training in the areas of Inter
                            networking Technologies, Operating Systems, Web Servers and Security/Firewalls.
                            Our professional training will help students to strengthen their soft skills and interviewing
                            skills. Our courses enable students to get world-recognized certifications from leading global
                            players like Cisco, Microsoft, and Red hat.</p>

                        <div class="border"></div>
                    </div>
                    <!-- /section title -->
                </div>


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <!--
        Start About Section
        ==================================== -->
    <section class="about-2 section" id="about">
        <div class="container">
            <div class="row">

                <!-- section title -->
                <div class="col-12">
                    <div class="title text-center">
                        <h2>Our Speciality</h2>

                        <div class="border"></div>
                    </div>
                </div>
                <!-- /section title -->
                <div class="col-md-6 service-2">
                    <div class="row text-center">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <i class="fas fa-book-reader"></i>
                                <h5>Curriculam</h5>
                                <p></p>
                            </div>
                        </div><!-- END COL -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <h5>Training</h5>
                                <p></p>
                            </div>
                        </div><!-- END COL -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <i class="fas fa-hands-helping"></i>
                                <h5>Support</h5>
                                <p></p>
                            </div>
                        </div><!-- END COL -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <i class="fas fa-user-graduate"></i>
                                <h5>Placement</h5>
                                <p></p>
                            </div>
                        </div><!-- END COL -->
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="checklist home-checklist">
                        <li>15 Years of Experience in IT Networking Field.</li>
                        <li>Experienced Faculties</li>
                        <li>Wi-Fi Configured Lab</li>
                        <li>100% Job Guarantee*</li>
                        <li>International Exam Center-Pearson Vue</li>
                        <li>Part Time Job Facility</li>
                        <li>On-The Job Training</li>

                    </ul>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->






 <!-- Start Testimonial
=========================================== -->

{{-- <section class="testimonial section" id="testimonial">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <!-- testimonial wrapper -->
                <div class="testimonial-slider"> --}}


<user-index-testimonials  :testimonials ="{{json_encode($testimonials)}}" >   </user-index-testimonials>



{{--
 @foreach($testimonials as $testimonial)
<div class="item text-center">
    <i class="tf-ion-chatbubbles"></i>
    <!-- client info -->
    <div class="client-details">
      <p>{{ $testimonial['description'] }}</p>
    </div>
    <!-- /client info -->
    <!-- client photo -->
    <div class="client-thumb">
      <img
        src={{
          '/uploads/testimonials_images/'.$testimonial['testimonial_image'] }}

        class="img-fluid"
        alt="testimonial image"
      />
    </div>
    <div class="client-meta">
      <h3>{{ $testimonial['name'] }}</h3>
      <span> {{ $testimonial['designation'] }} </span>
    </div>
    <!-- /client photo -->
  </div>


  @endforeach --}}





                {{-- </div>


            </div> 		<!-- end col lg 12 -->
        </div>	    <!-- End row -->
    </div>       <!-- End container -->
</section>    <!-- End Section -->

    <!-- End testimonials Section --> --}}



    <section class="counter-wrapper section-sm mb-5">
        <div class="container">
            <div class="row">
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        <div class="carousel-item row no-gutters active mb-5">
                            <div class="col-3 float-left"><img class="img-fluid" src="images/BrandSlides/cisco.png"
                                    width="150px"></div>
                            <div class="col-3 float-left"><img class="img-fluid" src="images/BrandSlides/redhat.png"
                                    width="200px"></div>
                            <div class="col-3 float-left"><img class="img-fluid" src="images/BrandSlides/vm.png"
                                    width="200px"></div>
                            <div class="col-3 float-left"><img class="img-fluid" src="images/BrandSlides/sun.png"
                                    width="160px"></div>

                        </div>
                        <div class="carousel-item row no-gutters mb-5">
                            <div class="col-3 float-left"><img class="img-fluid" src="images/BrandSlides/citrix.png"
                                    width="160px"></div>
                            <div class="col-3 float-left"><img class="img-fluid" src="images/BrandSlides/micro.png"
                                    width="180px"></div>
                            <div class="col-3 float-left"><img class="img-fluid" src="images/BrandSlides/redhat.png"
                                    width="200px"></div>
                            <div class="col-3 float-left"><img class="img-fluid" src="images/BrandSlides/vm.png"
                                    width="200px"></div>
                        </div>
                    </div>
                    {{-- <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a> --}}
                </div>

            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end section -->

@endsection
