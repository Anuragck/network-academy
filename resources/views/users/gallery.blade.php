@extends('layouts.main')

@section('main-content')

<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Gallery</h2>

			</div>
		</div>
	</div>
</section>




<!-- Start Portfolio Section
		=========================================== -->

        <section class="portfolio section-sm" id="portfolio">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-12">

                        <!-- section title -->
                        <div class="title text-center">
                            <h2>Our Gallery</h2>

                            <div class="border"></div>
                        </div>
                        <!-- /section title -->
{{--
                        <div class="portfolio-filter">
                            <button type="button " data-filter="all" class="rounded-pill">All</button>
                            <button type="button" data-filter="photography" class="rounded-pill">Photography</button>
                            <button type="button" data-filter="ios" class="rounded-pill">IOS App</button>
                            <button type="button" data-filter="development" class="rounded-pill">Development</button>
                            <button type="button" data-filter="design" class="rounded-pill">Design</button>
                        </div> --}}

                        <div class="row filtr-container px-2">
                            <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                <div class="portfolio-block">
                                    <img class="img-fluid" src="images/portfolio/portfolio-1.jpg" alt="">
                                    <div class="caption">
                                        <a class="search-icon" href="images/portfolio/portfolio-1.jpg" data-lightbox="image-1">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design, ios">
                                <div class="portfolio-block">
                                    <img class="img-fluid" src="images/portfolio/portfolio-2.jpg" alt="">
                                    <div class="caption">
                                        <a class="search-icon" href="images/portfolio/portfolio-2.jpg" data-lightbox="image-1">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, photography, development">
                                <div class="portfolio-block">
                                    <img class="img-fluid" src="images/portfolio/portfolio-3.jpg" alt="">
                                    <div class="caption">
                                        <a class="search-icon" href="images/portfolio/portfolio-3.jpg" data-lightbox="image-1">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, photography, ios">
                                <div class="portfolio-block">
                                    <img class="img-fluid" src="images/portfolio/portfolio-4.jpg" alt="">
                                    <div class="caption">
                                        <a class="search-icon" href="images/portfolio/portfolio-4.jpg" data-lightbox="image-1">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                <div class="portfolio-block">
                                    <img class="img-fluid" src="images/portfolio/portfolio-5.jpg" alt="">
                                    <div class="caption">
                                        <a class="search-icon" href="images/portfolio/portfolio-5.jpg" data-lightbox="image-1">
                                            <i class="tf-ion-ios-search-strong"></i>

                                    </div>
                                </div>
                            </div>
                        

                            <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, photography">
                                <div class="portfolio-block">
                                    <img class="img-fluid" src="images/portfolio/portfolio-6.jpg" alt="">
                                    <div class="caption">
                                        <a class="search-icon" href="images/portfolio/portfolio-6.jpg" data-lightbox="image-1">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, photography">
                                <div class="portfolio-block">
                                    <img class="img-fluid" src="images/portfolio/portfolio-7.jpg" alt="">
                                    <div class="caption">
                                        <a class="search-icon" href="images/portfolio/portfolio-7.jpg" data-lightbox="image-1">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design, development">
                                <div class="portfolio-block">
                                    <img class="img-fluid" src="images/portfolio/portfolio-1.jpg" alt="">
                                    <div class="caption">
                                        <a class="search-icon" href="images/portfolio/portfolio-1.jpg" data-lightbox="image-1">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /end col-lg-12 -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section> <!-- End section -->
@endsection
