@extends('layouts.main')

@section('main-content')

<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Our Courses</h2>

			</div>
		</div>
	</div>
</section>

<user-main-courses :category_list="{{json_encode($category_list)}}" :course_list="{{json_encode($course_list)}}"> </user-main-courses>


@endsection
