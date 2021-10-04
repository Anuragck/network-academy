
@extends('layouts.main')

@section('main-content')

<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Verify Certificate</h2>

			</div>
		</div>
	</div>
</section>


<!--Demo Link Only-->
<div class="text-center">
<a href="/certificate-landing">Certificate Landing Page Demo</a>
</div>
<!--Demo Link Only end -->




<div class="registration-form">

    <form method="POST" action="">
        @csrf

        <h5 class="text-center mb-3 text-muted ">Verify Certificate Here</h5>
        <div class="text-center">
        <img class="logo-default pb-5" src="images/na-logo.png" alt="logo" style="width: 30%; "/>
        </div>
        <div class="form-group">
            <input id="certificate" type="text" placeholder="Enter Certificate Number" class="form-control item"autofocus>

        </div>



        <div class="form-group">

            <button type="submit" class="btn btn-block create-account ">
                 {{ __('Validate') }}
            </button>
        </div>
    </form>
    <div class="social-media">

        <div class="social-icons">
<p class="text-muted">The Certificate Number can be found at the top of each certificate.</p>
        </div>

    </div>

</div>

@endsection
