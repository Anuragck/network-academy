
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


{{-- <!--Demo Link Only-->
<div class="text-center">
<a href="/verify-certificate/1">Certificate Landing Page Demo</a>
</div>
<!--Demo Link Only end --> --}}




<div class="registration-form">

    <form method="get" action="/verify-certificate/">


        <h5 class="text-center mb-3 text-muted ">Verify Certificate Here</h5>
        <div class="text-center">
        <img class="logo-default pb-5" src="images/na-logo.png" alt="logo" style="width: 30%; "/>
        </div>
        <div class="form-group">

            @if ($alert = Session::get('error'))
            <div class="alert alert-danger">
                {{ $alert }}
            </div>
        @endif

            <input id="certificate" name="certificate_id" type="text" placeholder="Enter Certificate Number" class="form-control item"autofocus required>




        </div>



        <div class="form-group">

            <button type="submit" class="btn btn-block create-account ">
                 {{ __('Validate') }}
            </button>
        </div>
    </form>
    <div class="social-media">

        <div class="social-icons">
<p class="text-muted">The Certificate Verification Link can be found at the bottom of each certificate.</p>
        </div>

    </div>

</div>

@endsection
