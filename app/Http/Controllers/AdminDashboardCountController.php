<?php

namespace App\Http\Controllers;

use App\Models\CourseEnquiry;
use App\Models\JoinedStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardCountController extends Controller
{
    public function getCountData(){

        $today = Carbon::now()->format('Y-m-d', 'UTC');


        $totalEnquiry = CourseEnquiry::all();
        $allEnquires=$totalEnquiry->count();

        $totalJoined = JoinedStudent::all();
        $allJoined=$totalJoined->count();

        $totalDropped = CourseEnquiry::all()->where('lead_status','2');
        $allDropped=$totalDropped->count();

        $totalPending = CourseEnquiry::all()->where('lead_status','0');
        $allPending=$totalPending->count();

        $todayEnquiry = CourseEnquiry::all()->where('created_at',$today);
        $todayEnq=$todayEnquiry->count();

        $todayJoined = JoinedStudent::all()->where('created_at',$today);
        $allTodayJoined=$todayJoined->count();

        return [

            'total_enquires'=>$allEnquires,
            'total_joined'=>$allJoined,
            'total_dropped'=>$allDropped,
            'total_pending'=>$allPending,

            'today_enquires'=>$todayEnq,
            'today_joined'=>$allTodayJoined,

        ];


}
}
