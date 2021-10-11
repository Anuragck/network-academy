<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEnquiry;
use App\Models\JoinedStudent;
use App\Models\LeadFollowUpEntry;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function addCall(Request $request){

        $request->validate([

            'theDate'=>'required',
            'timeHour'=>'required',
            'timeMin'=>'required',
            'timeAmPm'=>'required',
            'callStatus'=>'required',

// 'call-priority'=>'required',
// 'call_remarks'=>''

        ]);
            if($request->callStatus == 'Connected'){
                $request->validate([
                    'leadPriority'=>'required',
                ]);
            }

        $leadFollow = new LeadFollowUpEntry();

        $leadFollow->enquirer_id=$request->id;
        $leadFollow->call_date=$request->theDate;
        $leadFollow->call_time=$request->timeHour. ':' .$request->timeMin. ':' .$request->timeAmPm;
        $leadFollow->call_status=$request->callStatus;
        $leadFollow->remarks=$request->remarks;

        $leadFollow->save();


        if($request->id){
            $courseEnq = CourseEnquiry::find($request->id);
             if($request->leadPriority == 'High'){
                $courseEnq->priority_status='1';
                $courseEnq->save();
            }
            if($request->leadPriority == 'Medium'){
                $courseEnq->priority_status='2';
                $courseEnq->save();
            }
            if($request->leadPriority == 'Low'){
                $courseEnq->priority_status='3';
                $courseEnq->save();
            }
        }

        if($leadFollow->save()){
            return 'success';
        }


    }

    // public function getHistory(Request $request){
    //     $followUpHistory=CourseEnquiry::where('id','=',$request->enqId)->with('enqueriesabc')->get();
    //     return $followUpHistory;
    // }

public function getHistory(Request $request){
        $followUpHistory=CourseEnquiry::with(['getFollowUp'=> function ($query) {
            $query->orderBy('id','DESC');
        }  ,'getCourseBatch','getCourseName'  => function ($query) {
            $query->select('id', 'course_name');
        }  ])->where('id','=',$request->enqId)->get();
        return $followUpHistory;
    }



public function addConversion(Request $request){


    $request->validate([
        'convertionStatus'=>'required',
    ]);

if($request->convertionStatus == 'Joined'){
    $request->validate([
        'joinedCourse'=>'required',
        'joinedBatch'=>'required',
        'joinedFee'=>'required',
    ]);
}

if($request->convertionStatus == 'Dropped'){
    $request->validate([
        'remarks'=>'required',
    ]);
}

    if($request->id){
        $convert = CourseEnquiry::find($request->id);
        if( $convert->lead_status=='1'){
            return 'already joined';
            }

            if( $convert->lead_status=='2'){
                return 'already dropped';
                }

         if($request->convertionStatus == 'Joined'){
            $convert->lead_status='1';
            $convert->conversion_remarks=$request->remarks;
            $convert->save();

            $joined=new JoinedStudent();
            $joined->enquired_id=$request->id;
            $joined->student_name=$convert->enquirer_name;
            $joined->student_email=$convert->enquirer_email;
            $joined->student_mobile=$convert->enquirer_mobile;
            $joined->student_dob=$convert->enquirer_dob;
            $joined->student_district=$convert->enquirer_district;
            $joined->student_state=$convert->enquirer_state;
            $joined->student_street=$convert->enquirer_street;
            $joined->student_pin=$convert->enquirer_pin;
            $joined->student_education=$convert->enquirer_education;

            $joined->joined_course=$request->joinedCourse;
            $joined->joined_batch=$request->joinedBatch;
            $joined->joined_course_fee=$request->joinedFee;
            $joined->joined_date=$request->joinedDate;

            $joined->save();
        }

        if($request->convertionStatus == 'Dropped'){
            $convert->lead_status='2';
            $convert->conversion_remarks=$request->remarks;
            $convert->save();
        }




            if($convert->save() ){
            return 'success';
            }






    }

}




}
