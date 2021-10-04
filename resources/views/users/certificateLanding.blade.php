
@extends('layouts.main')

@section('main-content')

<certificate-landing-page :students_details ="{{json_encode($students_details)}}" :certificate_details ="{{json_encode($certificate_details)}}" ></certificate-landing-page>
@endsection
