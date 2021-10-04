@extends('layouts.main')

@section('main-content')

<user-single-courses  :single_course ="{{json_encode($single_course)}}"  :single_category ="{{json_encode($single_category)}}"  :batch_time ="{{json_encode($batch_time)}}"  > </user-single-courses>



@endsection