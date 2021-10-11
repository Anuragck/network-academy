<?php

namespace App\Http\Controllers;

use App\Models\CourseEnquiry;
use Illuminate\Http\Request;

class DroppedListController extends Controller
{
    public function getDropped(Request $request){



        $droppedData= CourseEnquiry::with(['getCourseName'  => function ($query) {
            $query->select('id', 'course_name');
        } ,'getCourseBatch'])          ->where('lead_status', 2);


        if($request->course_name){

            $droppedData->where('enquirer_preferred_course', $request->course_name);
        }


        if($request->course_batch){
            $droppedData->where('enquirer_preferred_course_time',$request->course_batch);

        }


        

        return $droppedData -> paginate(5);
    }
}
