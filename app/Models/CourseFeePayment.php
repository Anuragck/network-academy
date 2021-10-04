<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFeePayment extends Model
{
    use HasFactory;
    protected $table="course_fee_payments";

    // public function getCourseName(){
    //     return $this->belongsTo(Course::class,'joined_course','id');
    //     }

        // public function getJoinedDetails(){
        //     return $this->belongsTo(JoinedStudent::class,'student_id','enquired_id');
        //     }
}
