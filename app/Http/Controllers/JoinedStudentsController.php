<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\JoinedStudent;
use App\Models\Course;
use App\Models\CourseBatch;
use Illuminate\Http\Request;

class JoinedStudentsController extends Controller
{
    public function joinedStudents(Request $request)
    {



        $today = Carbon::now()->format('Y-m-d', 'UTC');


        $students = JoinedStudent::with(['getCourseNames'  => function ($query) {
            $query->select('id', 'course_name','course_code');
        }, 'getCourseBatches'])->orderBy('id', 'DESC');



        if ($request->course_name) {
            $students->where('joined_course', '=', $request->course_name);
        }

        if ($request->batch_time) {
            $students->where('joined_batch', '=', $request->batch_time);
        }

        if ($request->from_date) {
            $students->where('joined_date', '>=', $request->from_date);
        }
        if ($request->to_date) {
            $students->where('joined_date', '<=', $request->to_date);
        }
        if ($request->from_date == '' && $request->to_date == '') {
            $students->where('joined_date', $today);
        }





        return $students->paginate(5);
    }

    //


    public function filterCourses()
    {



        return Course::orderBy('id', 'DESC')->get();
    }





    public function filterBatches()
    {






        return CourseBatch::orderBy('id', 'DESC')->get();
    }
}
