<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseEnquiry;
use App\Models\Course;
use App\Models\CourseBatch;

class CourseEnquiryController extends Controller
{





    public function addEnquiry(Request $request)
    {


        $request->validate([


            'enquirer_name'  => 'required',
            'enquirer_email' => 'required',
    'enquirer_mobile'  => 'required',
    'enquirer_dob' => 'required',
    'enquirer_district'  => 'required',
    'enquirer_state' => 'required',
    'enquirer_street'  => 'required',
    'enquirer_pin'  => 'required',
    'enquirer_education'  => 'required',
    'enquirer_preferred_course'  => 'required',
    'enquirer_preferred_course_time'  => 'required',

        ]);



        $enquirer = new CourseEnquiry;


        $enquirer->enquirer_name = $request->enquirer_name ;
        $enquirer->enquirer_email = $request->enquirer_email ;
        $enquirer->enquirer_mobile = $request->enquirer_mobile ;
        $enquirer->enquirer_dob = $request->enquirer_dob ;
        $enquirer->enquirer_district = $request->enquirer_district ;
        $enquirer->enquirer_state = $request->enquirer_state ;
        $enquirer->enquirer_street = $request->enquirer_street ;
        $enquirer->enquirer_pin = $request->enquirer_pin ;
        $enquirer->enquirer_education = $request->enquirer_education ;
        $enquirer->enquirer_preferred_course = $request->enquirer_preferred_course ;
        $enquirer->enquirer_preferred_course_time = $request->enquirer_preferred_course_time ;
        $enquirer->enquirer_remarks = $request->enquirer_remarks ;


        $enquirer->save();
        return 'success';
    }


    public function addNewLead(Request $request)
    {


        $request->validate([


    'enquirer_name'  => 'required',
     'enquirer_email' => 'required',
    'enquirer_mobile'  => 'required',
    // 'enquirer_dob' => 'required',
    'enquirer_district'  => 'required',
    // 'enquirer_state' => 'required',
    // 'enquirer_street'  => 'required',
    // 'enquirer_pin'  => 'required',
    'enquirer_education'  => 'required',
    'enquirer_preferred_course'  => 'required',
    'enquirer_preferred_course_time'  => 'required',
    'source_of_lead'=>'required',


        ]);

if($request->source_of_lead == 'Reference'){

    $request->validate([

        'referee_details'=>'required',

            ]);
}

        $newLead = new CourseEnquiry;


        $newLead->enquirer_name = $request->enquirer_name ;
        $newLead->enquirer_email = $request->enquirer_email ;
        $newLead->enquirer_mobile = $request->enquirer_mobile ;
        $newLead->enquirer_dob = $request->enquirer_dob ;
        $newLead->enquirer_district = $request->enquirer_district ;
        $newLead->enquirer_state = $request->enquirer_state ;
        $newLead->enquirer_street = $request->enquirer_street ;
        $newLead->enquirer_pin = $request->enquirer_pin ;
        $newLead->enquirer_education = $request->enquirer_education ;
        $newLead->enquirer_preferred_course = $request->enquirer_preferred_course ;
        $newLead->enquirer_preferred_course_time = $request->enquirer_preferred_course_time ;
        $newLead->source_of_lead = $request->source_of_lead ;
        $newLead->referee_details = $request->referee_details ;


        $newLead->save();
        return 'success';
    }

public function getEnquiryCourses(){



    return Course::orderBy('id', 'DESC')->get();



}

public function getEnquiryCoursesForNewLead(){



    return Course::orderBy('id', 'DESC')->get();



}

public function getEnquiryBatches(Request $request)
{
    if($request->batches){


        return CourseBatch::where('course_id','=',$request->batches)->get();
    }
}

public function getEnquiryBatchesForNewLead(Request $request)
{
    if($request->batches){


        return CourseBatch::where('course_id','=',$request->batches)->get();
    }
}


public function getEnquiry(Request $request){

    $enquiries= CourseEnquiry::with(['getCourseName'  => function ($query) {
        $query->select('id', 'course_name');
    } ,'getCourseBatch'])->where('lead_status', '0')->orderBy('priority_status', 'ASC');

if($request->source){

    $enquiries->where('source_of_lead','=',$request->source);
}
 if($request->priority){

    $enquiries->where('priority_status','=',$request->priority);
}


    return $enquiries ->paginate(5);


   }

//


}

// ->whereDate('updated_at', Carbon::today())
