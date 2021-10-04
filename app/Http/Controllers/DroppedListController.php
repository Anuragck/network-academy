<?php

namespace App\Http\Controllers;

use App\Models\CourseEnquiry;
use Illuminate\Http\Request;

class DroppedListController extends Controller
{
    public function getDropped(){
        $droppedData= CourseEnquiry::with(['getCourseName'  => function ($query) {
            $query->select('id', 'course_name');
        } ,'getCourseBatch'])          ->where('lead_status', 2)->get();


        return $droppedData;
    }
}
