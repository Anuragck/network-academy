<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseBatch;
use App\Models\Course;

class CourseBatchController extends Controller
{
    public function addBatch(Request $request)
    {

        $request->validate([



            "course_id"  => 'required',
            "batch_starting_date"  => 'required',
            "batch_time"  => 'required',
            "batch_end_time"  => 'required',
        ]);

if($request->id){

    $batch =CourseBatch::find($request->id);

}else


        $batch = new CourseBatch;

        $batch->course_id = $request->course_id;
        $batch->batch_starting_date = $request->batch_starting_date;

        $batch->batch_time = $request->batch_time.':'.$request->batch_time_minute.' '.$request->batch_time_am_pm;

        $batch->batch_end_time = $request->batch_end_time.':'.$request->batch_end_time_minute.' '.$request->batch_end_time_am_pm;



        $batch->save();
    }


public function getBatches(Request $request){



    $batches=  CourseBatch::with('course')->orderBy('id', 'DESC');


    if($request->course_name){

        $batches->where('course_id',$request->course_name);
    }

 return $batches->paginate(5);



}



public function getBatchCourses(){

    return Course::orderBy('id', 'DESC')->get();


}





}
