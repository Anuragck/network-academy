<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LeadFollowUpEntry;

class CourseEnquiry extends Model
{
    use HasFactory;
    protected $table="course_enquiries";

public function getFollowUp(){
return $this->hasMany(LeadFollowUpEntry::class,'enquirer_id','id');
}

public function getCourseName(){
    return $this->belongsTo(Course::class,'enquirer_preferred_course','id');
    }
    public function getCourseBatch(){
        return $this->belongsTo(CourseBatch::class,'enquirer_preferred_course_time','id');
        }

}
