<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinedStudent extends Model
{
    use HasFactory;
    protected $table="joined_students";


    public function getCourseNames(){
        return $this->belongsTo(Course::class,'joined_course','id');
        }
        public function getCourseBatches(){
            return $this->belongsTo(CourseBatch::class,'joined_batch','id');
            }

 public function getPaymentHistories(){
            return $this->hasMany(CourseFeePayment::class,'student_id','enquired_id');
            }
}
