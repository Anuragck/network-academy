@extends('layouts.main')

@section('main-content')

<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>About Us</h2>

			</div>
		</div>
	</div>
</section>


<section class="about-shot-info section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-20">
				<h2>About Network Academy</h2>
				<p class="text-justify line-height">Network Academy Mankavu, Calicut is a premier educational institution with an innovative effort keeping in view of this new demand of the hi-tech new age, delivering information and communication technology skills in its precise and relevant formats. Network Academy’s proven track of quality end academic training program has been noted for its highly-qualified faculty, career oriented training system and the best infrastructure in the field of computer networking and software imparting premium training in the areas of Internetworking Technologies, Operating Systems, Web Servers and Security/Firewalls. Our professional training will help students to strengthen their soft skills and interviewing skills. Our courses enable students to get world-recognized certifications from leading global players like Cisco, Microsoft, and Red hat.</p>
			</div>
			<div class="col-md-6">
				<img class="img-fluid " src="images/about/about-img.jpg" alt="">
			</div>
		</div>
	</div>
</section>








<section  class="counter-wrapper section-sm mb-5 " >
    <div class="container ">
        <div class="row ">
            <div id="recipeCarousel" class="carousel slide w-100 " data-ride="carousel">
                <div class="carousel-inner w-100  " role="listbox">
                    <div class="carousel-item row no-gutters active mb-5  text-center">

                        <div class="col-4 float-left ">
                            <img class="img-fluid pt-2" src="images/about/iso.png" width="100px">
                        </div>
                        <div class="col-4 float-left">
                            <img class="img-fluid" src="images/about/dac.png" width="80px">
                        </div>
                        <div class="col-4 float-left ">
                            <img class="img-fluid" src="images/about/iso2.png" width="80px">
                        </div>


                    </div>
                    <div class="carousel-item row no-gutters mb-5 text-center">
                        <div class="col-4 float-left"><img class="img-fluid" src="images/about/dac.png" width="80px"></div>
                        <div class="col-4 float-left"><img class="img-fluid" src="images/about/iso2.png" width="80px"></div>
                        <div class="col-4 float-left"><img class="img-fluid pt-2" src="images/about/iso.png" width="100px"></div>
                    </div>
                </div>

            </div>

        </div> 		<!-- end row -->
    </div>   	<!-- end container -->
</section>   <!-- end section -->






@endsection
