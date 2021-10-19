<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;

class CourseController extends Controller
{
    public function addCourse(Request $request)
    {



        $request->validate([



            "course_name"  => 'required',
            "course_code"  => 'required',
            "course_short_name" => 'required',
            "course_category_id"  => 'required',
            "small_description"  => ['required', 'min:150', 'max:250'],
            "course_description"  => 'required',
            "course_duration"  => 'required',
            'course_duration_type'=>'required',
            "course_fee"  => 'required',
            "course_certification_fee"  => 'required',
            "course_certification_code"  => 'required',
            "course_image"  => 'required',

        ]);


        if ($request->id) {


            $course = Course::find($request->id);
        } else

            $course = new Course;

        $course->course_name = $request->course_name;
        $course->course_short_name = $request->course_short_name;
        $course->course_code = $request->course_code;
        $course->course_category_id = $request->course_category_id;
        $course->small_description = $request->small_description;
        $course->course_description = $request->course_description;
        $course->course_duration = $request->course_duration;
        $course->course_duration_type = $request->course_duration_type;
        $course->course_fee = $request->course_fee;
        $course->course_certification_fee = $request->course_certification_fee;
        $course->course_certification_code = $request->course_certification_code;



        if ($request->hasFile('course_image')) {
            $img_ext = $request->file('course_image')->getClientOriginalExtension();
            $filename = $request->course_name . $course->course_code  . time() . '.' . $img_ext;
            $path = $request->file('course_image')->move(public_path('uploads/course_images'), $filename); //image save public folder / uploads/course_upload

        }

        $course->course_image = $filename;



        if ($request->hasFile('course_syllabus')) {
            $syllabus_ext = $request->file('course_syllabus')->getClientOriginalExtension();
            $syllabus_filename = $request->course_name . $course->course_code  . time() . '.' . $syllabus_ext;
            $path = $request->file('course_syllabus')->move(public_path('uploads/course_syllabus'), $syllabus_filename); //pdf save public folder / uploads/course_syllabus
            $course->course_syllabus = $syllabus_filename;
        }




        $course->save();
        return 'success';
    }



    public function getCourses(Request $request)
    {

        $paginate = $request->paginate;

        $course =  Course::with('courseBatches')->orderBy('id', 'DESC');


        if ($request->search) {

            $search = "%$request->search%";

            $course->where('course_name', 'like', trim($search))
                ->orWhere('course_duration', 'like', trim($search))
                ->orWhere('course_short_name', 'like', trim($search))
                ->orWhere('course_code', 'like', trim($search))
                ->orWhere('course_fee', 'like', trim($search))
                ->orWhere('course_certification_code', 'like', trim($search))
                ->orWhere('course_certification_fee', 'like', trim($search));

        }

        if ($request->category) {


            $course->where('course_category_id', '=', $request->category);
        }
        return $course->paginate($paginate);
    }

    //0->not show on index page.....1->show on index page
    public function changeHomeStatus(Request $request)
    {
        if ($request->id) {
            $course = Course::find($request->id);
            if ($course->add_to_home_status == '0') {
                $course->add_to_home_status = '1';
            } else
                $course->add_to_home_status = '0';
            $course->save();
        }
    }


    public function getIndexPageCourses()
    {
        return Course::where('add_to_home_status', '=', '1')->orderBy('id', 'DESC')->get();
    }


    public function getMainPageCourses()
    {


        return Course::orderBy('id', 'DESC')->get();
    }

    public function Categories()
    {

        return CourseCategory::orderBy('id', 'DESC')->get();
    }






}
