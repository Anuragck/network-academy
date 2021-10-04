
@extends('layouts.main')

@section('main-content')

<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Login / Register</h2>

			</div>
		</div>
	</div>
</section>


<div class="registration-form">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h3 class="text-center mb-4 text-muted ">Login</h3>
        <div class="form-icon">
            <span><i class="fas fa-user"></i></span>
        </div>

        @if($errors->any())
        <h6 class="text-danger">{{$errors->first()}}</h6>
      @endif

        <div class="form-group">
            <input id="username" type="text" placeholder="Enter Your Username" class="form-control item @error('username') is-invalid @enderror" name="username"
                value="{{ old('username') }}" required autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



            <div class="form-group">
                <input id="password" type="password" placeholder="Enter Your Password" class="form-control item @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        <div class="form-group">

            <button type="submit" class="btn btn-block create-account ">
                 {{ __('Login') }}
            </button>
        </div>
    </form>
    <div class="social-media">
<a href="/register">
        <h5 >Click Here To Register</h5></a>
        <div class="social-icons">

        </div>

    </div>

</div>


@endsection
