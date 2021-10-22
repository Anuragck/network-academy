<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseBatch;
use App\Models\Testimonial;

class UserPagesController extends Controller
{
    public function index(){

$testimonials= Testimonial::where('section_bit' ,1)->get();

        return view('users.index',compact('testimonials'));



    }

    public function about(){



        return view('users.about');
    }

    public function course($category){


if( $category == 0){

    $course_list= Course::orderBy('id', 'DESC')->get();
$category_list=CourseCategory::orderBy('id', 'DESC')->get();
        return view('users.courses',compact('category_list','course_list'));

}else{


    $course_list= Course::where('course_category_id','=',$category)->get();
$category_list=CourseCategory::orderBy('id', 'DESC')->get();
        return view('users.courses',compact('category_list','course_list'));

}




    }

    public function gallery(){
        return view('users.gallery');
    }

    public function placements(){
        return view('users.placements');
    }

    public function contact(){
        return view('users.contact');
    }

    public function verifyCertificatePage(){
        return view('users.verifyCertificatePage');
    }

    public function courseMain($id)
   {

    $single_course=Course::find($id);


    $single_category= CourseCategory::where('id','=',$single_course->course_category_id)->first();
    $batch_time= CourseBatch::where('course_id','=',$single_course->id)->get();

        return view('users.courseMainTemplate',compact('single_course','single_category','batch_time'));
    }



    public function terms(){
        return view('users.terms');
    }

    public function privacy(){
        return view('users.privacyPolicy');
    }

    public function sitemap(){
        return view('users.sitemap');
    }
}
